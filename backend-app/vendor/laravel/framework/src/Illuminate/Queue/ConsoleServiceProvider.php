<?php

namespace Illuminate\Queue;

use Illuminate\Support\ServiceProvider;
use Illuminate\Queue\Console\RetryCommand;
use Illuminate\Queue\Console\ListFailedCommand;
use Illuminate\Queue\Console\FlushFailedCommand;
use Illuminate\Queue\Console\ForgetFailedCommand;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.queue.failed', function () {
            return new ListFailedCommand;
        });

        $this->app->singleton('command.queue.retry', function () {
            return new RetryCommand;
        });

        $this->app->singleton('command.queue.forget', function () {
            return new ForgetFailedCommand;
        });

        $this->app->singleton('command.queue.flush', function () {
            return new FlushFailedCommand;
        });

        $this->commands(
            'command.queue.failed', 'command.queue.retry',
            'command.queue.forget', 'command.queue.flush'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'command.queue.failed', 'command.queue.retry',
            'command.queue.forget', 'command.queue.flush',
        ];
    }
}
