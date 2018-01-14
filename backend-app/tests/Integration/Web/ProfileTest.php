<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;

class ProfileTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $response = $this->get(route('web.profiles.index'));

        $response->assertStatus(Response::HTTP_OK);
    }
}
