<?php

namespace Tests\Feature\Web;

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
    public function submitSuccessTest()
    {
        $this->loadMailMock();

        $this->post(route('web.contacts.submit'), [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'message' => 'Hello World',
        ])->assertRedirect('contacts/thanks');
    }

    /**
     * @test
     */
    public function submitFailedTest()
    {
        $this->loadMailMock();

        $this->post(route('web.contacts.submit'), [
            'name' => '',
            'email' => '',
            'message' => '',
        ])->assertRedirect('contacts');
    }

    /**
     * @test
     */
    public function testThanksIfHasSession()
    {
        // TODO
    }

    /**
     * @test
     */
    public function testThanksIfHasNotSession()
    {
        // TODO
    }

    /**
     * Load mail mock
     *
     * @return void
     */
    private function loadMailMock()
    {
        Mail::ShouldReceive('send')
                      ->once()
                      ->andReturn(true);

        Mail::ShouldReceive('send')
                      ->once()
                      ->andReturn(true);
    }
}
