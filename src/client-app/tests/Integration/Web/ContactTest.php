<?php
namespace Tests\Integration\Web;

use TestCase;
use Illuminate\Http\Response;

class ContactTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('web.root.index'));

        $response->assertStatus(Response::HTTP_OK);
    }
}
