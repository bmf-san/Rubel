<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Http\Response;

class ProfileTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('web.profiles.index'));

        $response->assertStatus(Response::HTTP_OK);
    }
}
