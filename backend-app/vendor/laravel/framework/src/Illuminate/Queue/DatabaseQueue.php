<?php

namespace Illuminate\Queue;

use DateTime;
use Carbon\Carbon;
use Illuminate\Database\Connection;
use Illuminate\Queue\Jobs\DatabaseJob;
use Illuminate\Contracts\Queue\Queue as QueueContract;

class DatabaseQueue extends Queue implements QueueContract
{
    /**
     * The database connection instance.
     *
     * @var \Illuminate\Database\Connection
     */
    protected $database;

    /**
     * The database table that holds the jobs.
     *
     * @var string
     */
    protected $table;

    /**
     * The name of the default queue.
     *
     * @var string
     */
    protected $default;

    /**
     * The expiration time of a job.
     *
     * @var int|null
     */
    protected $expire = 60;

    /**
     * Create a new database queue instance.
     *
     * @param  \Illuminate\Database\Connection  $database
     * @param  string  $table
     * @param  string  $default
     * @param  int  $expire
     * @return void
     */
    public function __construct(Connection $database, $table, $default = 'default', $expire = 60)
    {
        $this->table = $table;
        $this->expire = $expire;
        $this->default = $default;
        $this->database = $database;
    }

    /**
     * Get the size of the queue.
     *
     * @param  string  $queue
     * @return int
     */
    public function size($queue = null)
    {
        return $this->database->table($this->table)
                    ->where('queue', $this->getQueue($queue))
                    ->count();
    }

    /**
     * Push a new job onto the queue.
     *
     * @param  string  $job
     * @param  mixed   $data
     * @param  string  $queue
     * @return mixed
     */
    public function push($job, $data = '', $queue = null)
    {
        return $this->pushToDatabase(0, $queue, $this->createPayload($job, $data));
    }

    /**
     * Push a raw payload onto the queue.
     *
     * @param  string  $payload
     * @param  string  $queue
     * @param  array   $options
     * @return mixed
     */
    public function pushRaw($payload, $queue = null, array $options = [])
    {
        return $this->pushToDatabase(0, $queue, $payload);
    }

    /**
     * Push a new job onto the queue after a delay.
     *
     * @param  \DateTime|int  $delay
     * @param  string  $job
     * @param  mixed   $data
     * @param  string  $queue
     * @return void
     */
    public function later($delay, $job, $data = '', $queue = null)
    {
        return $this->pushToDatabase($delay, $queue, $this->createPayload($job, $data));
    }

    /**
     * Push an array of jobs onto the queue.
     *
     * @param  array   $jobs
     * @param  mixed   $data
     * @param  string  $queue
     * @return mixed
     */
    public function bulk($jobs, $data = '', $queue = null)
    {
        $queue = $this->getQueue($queue);

        $availableAt = $this->getAvailableAt(0);

        $records = array_map(function ($job) use ($queue, $data, $availableAt) {
            return $this->buildDatabaseRecord(
                $queue, $this->createPayload($job, $data), $availableAt
            );
        }, (array) $jobs);

        return $this->database->table($this->table)->insert($records);
    }

    /**
     * Release a reserved job back onto the queue.
     *
     * @param  string  $queue
     * @param  \StdClass  $job
     * @param  int  $delay
     * @return mixed
     */
    public function release($queue, $job, $delay)
    {
        return $this->pushToDatabase($delay, $queue, $job->payload, $job->attempts);
    }

    /**
     * Push a raw payload to the database with a given delay.
     *
     * @param  \DateTime|int  $delay
     * @param  string|null  $queue
     * @param  string  $payload
     * @param  int  $attempts
     * @return mixed
     */
    protected function pushToDatabase($delay, $queue, $payload, $attempts = 0)
    {
        $attributes = $this->buildDatabaseRecord(
            $this->getQueue($queue), $payload, $this->getAvailableAt($delay), $attempts
        );

        return $this->database->table($this->table)->insertGetId($attributes);
    }

    /**
     * Pop the next job off of the queue.
     *
     * @param  string  $queue
     * @return \Illuminate\Contracts\Queue\Job|null
     */
    public function pop($queue = null)
    {
        $queue = $this->getQueue($queue);

        $this->database->beginTransaction();

        if ($job = $this->getNextAvailableJob($queue)) {
            $job = $this->markJobAsReserved($job);

            $this->database->commit();

            return new DatabaseJob(
                $this->container, $this, $job, $queue
            );
        }

        $this->database->commit();
    }

    /**
     * Get the next available job for the queue.
     *
     * @param  string|null  $queue
     * @return \StdClass|null
     */
    protected function getNextAvailableJob($queue)
    {
        $job = $this->database->table($this->table)
                    ->lockForUpdate()
                    ->where('queue', $this->getQueue($queue))
                    ->where(function ($query) {
                        $this->isAvailable($query);
                        $this->isReservedButExpired($query);
                    })
                    ->orderBy('id', 'asc')
                    ->first();

        return $job ? (object) $job : null;
    }

    /**
     * Modify the query to check for available jobs.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return void
     */
    protected function isAvailable($query)
    {
        $query->where(function ($query) {
            $query->whereNull('reserved_at');
            $query->where('available_at', '<=', $this->getTime());
        });
    }

    /**
     * Modify the query to check for jobs that are reserved but have expired.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return void
     */
    protected function isReservedButExpired($query)
    {
        $expiration = Carbon::now()->subSeconds($this->expire)->getTimestamp();

        $query->orWhere(function ($query) use ($expiration) {
            $query->where('reserved_at', '<=', $expiration);
        });
    }

    /**
     * Mark the given job ID as reserved.
     *
     * @param \stdClass $job
     * @return \stdClass
     */
    protected function markJobAsReserved($job)
    {
        $job->attempts = $job->attempts + 1;
        $job->reserved_at = $this->getTime();

        $this->database->table($this->table)->where('id', $job->id)->update([
            'reserved_at' => $job->reserved_at,
            'attempts' => $job->attempts,
        ]);

        return $job;
    }

    /**
     * Delete a reserved job from the queue.
     *
     * @param  string  $queue
     * @param  string  $id
     * @return void
     */
    public function deleteReserved($queue, $id)
    {
        $this->database->beginTransaction();

        if ($this->database->table($this->table)->lockForUpdate()->find($id)) {
            $this->database->table($this->table)->where('id', $id)->delete();
        }

        $this->database->commit();
    }

    /**
     * Get the "available at" UNIX timestamp.
     *
     * @param  \DateTime|int  $delay
     * @return int
     */
    protected function getAvailableAt($delay)
    {
        $availableAt = $delay instanceof DateTime ? $delay : Carbon::now()->addSeconds($delay);

        return $availableAt->getTimestamp();
    }

    /**
     * Create an array to insert for the given job.
     *
     * @param  string|null  $queue
     * @param  string  $payload
     * @param  int  $availableAt
     * @param  int  $attempts
     * @return array
     */
    protected function buildDatabaseRecord($queue, $payload, $availableAt, $attempts = 0)
    {
        return [
            'queue' => $queue,
            'attempts' => $attempts,
            'reserved_at' => null,
            'available_at' => $availableAt,
            'created_at' => $this->getTime(),
            'payload' => $payload,
        ];
    }

    /**
     * Get the queue or return the default.
     *
     * @param  string|null  $queue
     * @return string
     */
    protected function getQueue($queue)
    {
        return $queue ?: $this->default;
    }

    /**
     * Get the underlying database instance.
     *
     * @return \Illuminate\Database\Connection
     */
    public function getDatabase()
    {
        return $this->database;
    }
}
