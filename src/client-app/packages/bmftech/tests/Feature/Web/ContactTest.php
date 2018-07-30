<?php

namespace Tests\Feature\Web;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;
use Illuminate\Mailer\Mailer;
use Mockery;

class ContactTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function testIndex()
    {
        $this->get(route('web.root.index'))->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function submitSuccessTest()
    {
        $mailer = \Mockery::mock(Illuminate\Mail\Mailer::class);
        $mailer->shouldReceive('to->send')->once();
        $this->app->instance(Illuminate\Mail\Mailer::class, $mailer);

        $this->post(route('web.contacts.submit'), [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'message' => 'Hello World',
        ])->assertStatus(Response::HTTP_OK);
    }
}
