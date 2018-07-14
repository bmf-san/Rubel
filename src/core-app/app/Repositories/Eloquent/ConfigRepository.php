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
        // TODO Remove a orderBy method after implementation of search api.
        $configs = $this->configModel->orderBy('created_at', 'desc')->get();

        return $configs;
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

        return Config::whereIn('name', array_keys($attributes))->get();
    }
}
