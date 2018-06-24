<?php

namespace Rubel\Repositories\Eloquent\Api;

use Illuminate\Database\Eloquent\Collection;
use Rubel\Repositories\Contracts\Api\SettingRepositoryContract;
use Rubel\Models\Setting;

class SettingRepository implements SettingRepositoryContract
{
    /**
     * Setting
     *
     * @var Setting
     */
    private $settingModel;

    /**
     * SettingRepository constructor
     *
     * @param Setting $settingModel
     */
    public function __construct(Setting $settingModel)
    {
        $this->settingModel = $settingModel;
    }

    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(): Collection
    {
        // TODO Remove a orderBy method after implementation of search api.
        $settings = $this->settingModel->orderBy('created_at', 'desc')->get();

        return $settings;
    }

    /**
     * Update the specified resouce in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function update($request): array
    {
        $this->updateSetting($request);

        return [];
    }

    /**
     * Update setting
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function updateSetting($request)
    {
        $settings = $request->all();

        foreach ($settings as $key => $value) {
            $setting = $this->settingModel->where('name', $key)->firstOrFail();

            $setting->update([
                'value' => $value
            ]);
        }
    }
}
