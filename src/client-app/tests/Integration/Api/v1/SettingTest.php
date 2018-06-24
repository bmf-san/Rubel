<?php
namespace Tests\Integration\Api\v1;

use TestCase;
use Illuminate\Http\Response;
use Rubel\Models\Setting;

class SettingTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->json('GET', route('api.settings.index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testUpdate()
    {
        $this->runDefaultAdmin();

        $settingName = Setting::first()->name;

        $data = [
            $settingName => 'setting_value',
        ];

        $response = $this->json('PATCH', route('api.settings.update'), $data, $this->getDefaultHeaders());

        $response->assertStatus(Response::HTTP_OK);
    }
}
