<?php

namespace Rubel\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Rubel\Repositories\Contracts\ConfigRepositoryContract;
use Rubel\Models\Config;

class ConfigRepository implements ConfigRepositoryContract
{
    /**
     * Config
     *
     * @var Config
     */
    private $configModel;

    /**
     * ConfigRepository constructor
     *
     * @param Config $configModel
     */
    public function __construct(Config $configModel)
    {
        $this->configModel = $configModel;
    }

    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll(): Collection
    {
        return $this->configModel->orderBy('created_at', 'desc')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param string $name
     * @return Config
     */
    public function findByName(string $name): Config
    {
        return $this->configModel->where('name', $name)->firstOrFail();
    }

    /**
     * Update the specified resouce in storage.
     *
     * @param  array $attributes
     * @return Collection
     */
    public function update(array $attributes): Collection
    {
        foreach ($attributes as $key => $value) {
            $config = $this->configModel->where('name', $key)->firstOrFail();

            $config->update([
                'value' => $value
            ]);
        }

        return $this->configModel->whereIn('name', array_keys($attributes))->get();
    }
}
