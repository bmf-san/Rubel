<?php

namespace Tests\Feature\Web\Controllers;;

use Tests\FeatureTestCase;
use Illuminate\Http\Response;
use Illuminate\Mailer\Mailer;
use Mail;

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
    public function testSubmitSuccess()
    {
        Mail::ShouldReceive('send')
                      ->once()
                      ->andReturn(true);

        Mail::ShouldReceive('send')
                      ->once()
                      ->andReturn(true);

        $this->post(route('web.contacts.submit'), [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'message' => 'Hello World',
        ])->assertRedirect('contacts/thanks');
    }

    /**
     * @test
     */
    public function testSubmitFailed()
    {
        $this->post(route('web.contacts.submit'), [
            'name' => '',
            'email' => '',
            'message' => '',
        ])->assertRedirect('/');
    }
}
