<?php

namespace App\Repositories\Eloquent\Api;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\Api\ConfigRepositoryContract;
use App\Models\Config;

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
    public function index(): Collection
    {
        // TODO Remove a orderBy method after implementation of search api.
        $configs = $this->configModel->orderBy('created_at', 'desc')->get();

        return $configs;
    }

    /**
     * Update the specified resouce in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function update($request): array
    {
        $this->updateConfig($request);

        return [];
    }

    /**
     * Update config
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function updateConfig($request)
    {
        $configs = $request->all();

        foreach ($configs as $key => $value) {
            $config = $this->configModel->where('name', $key)->firstOrFail();

            $config->update([
                'value' => $value
            ]);
        }
    }
}
