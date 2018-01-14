<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;

class ContactTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $response = $this->get(route('web.root.index'));

        $response->assertStatus(Response::HTTP_OK);
    }
}
