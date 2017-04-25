<?php

namespace App\Repositories\Eloquent\Api;

use App\Repositories\Contracts\Api\ConfigRepositoryContract;
use App\Models\Config;

class ConfigRepository implements ConfigRepositoryContract
{
    private $config_model;

    public function __construct(Config $config_model)
    {
        $this->config_model = $config_model;
    }

    /**
     * Display a listing of the resource
     *
     * @return array $configs
     */
    public function index()
    {
        $configs = $this->config_model->all();

        return $configs;
    }

    /**
     * Update the specified resouce in storage.
     *
     * @param string $name
     * @param object $request
     *
     * @return array
     */
    public function update($request, String $name)
    {
        $config = $this->config_model->where('name', $name)->firstOrFail();

        dd($config);
    }

    /**
     * Update config
     *
     * @param Config $config
     * @param \Illuminate\Http\Request $request
     */
    public function updateConfig(Config $config, $request)
    {
        dd('hoge');
    }
}
