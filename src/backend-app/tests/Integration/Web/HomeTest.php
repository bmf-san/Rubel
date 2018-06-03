<?php
namespace Tests\Integration\Web;

use TestCase;
use Symfony\Component\HttpFoundation\Response;

class HomeTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('web.root.index'));

        $response->assertStatus(Response::HTTP_OK);
    }
}
