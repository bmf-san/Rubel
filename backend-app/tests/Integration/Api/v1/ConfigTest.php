<?php
namespace Tests\Integration\Api\v1;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Config;

class ConfigTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * STATUS_CODE_OK
     *
     * @var int
     */
    const STATUS_CODE_OK = 200;

    public function testIndex()
    {
        $response = $this->json('GET', route('api.configs.index'));

        $response->assertStatus(self::STATUS_CODE_OK);
    }

    public function testUpdate()
    {
        $data = [
            'title' => 'HereIsTitle',
            'sub_title' => 'HereIsSubTItle'
        ];

        $response = $this->json('PATCH', route('api.configs.update'), $data, $this->getHeaders());

        $response->assertStatus(self::STATUS_CODE_OK);
    }
}
