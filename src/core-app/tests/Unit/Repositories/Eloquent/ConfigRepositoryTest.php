<?php

namespace Tests\Unit\Repositories\Eloquent;

use Tests\UnitTestCase;
use Rubel\Repositories\Eloquent\ConfigRepository;
use Illuminate\Database\Eloquent\Collection;
use Rubel\Models\Config;

class ConfigRepositoryTest extends UnitTestCase
{
    /**
     * ConfigRepository
     *
     * @var ConfigRepository
     */
    private $configRepository;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->configRepository = $this->app->make(ConfigRepository::class);
    }

    /**
     * @test
     */
    public function testFindAllTest()
    {
        $total = 5;
        factory(Config::class, $total)->create();

        $config = $this->configRepository->findAll();

        $this->assertThat($config, $this->isInstanceOf(Collection::class));
        $this->assertThat($config->count(), $this->identicalTo($total));
    }

    /**
     * @test
     */
    public function testUpdate()
    {
        $attributes = [
            'config_name_test_a' => 'new_config_value_test_a',
            'config_name_test_b' => 'new_config_value_test_b',
        ];
        factory(Config::class)->create([
            'name' => 'config_name_test_a',
            'value' => 'config_value_test_a',
        ]);
        factory(Config::class)->create([
            'name' => 'config_name_test_b',
            'value' => 'config_value_test_b',
        ]);

        $config = $this->configRepository->update($attributes);

        $this->assertThat($config, $this->isInstanceOf(Collection::class));
        $this->assertEquals($config->pluck('value')->toArray(), array_values($attributes));
    }
}
