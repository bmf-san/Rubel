<?php

namespace BmfTech\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Mail\Mailer;
use BmfTech\Http\Controllers\Controller;
use BmfTech\Http\Requests\Web\ContactRequest;

class ContactController extends Controller
{
    /**
     * Mailer
     *
     * @var Mailer
     */
    private $mail;

    /**
     * ContactController constructor
     *
     * @param Mailer $mail
     */
    public function __construct(Mailer $mail)
    {
        $this->mail = $mail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('bmftech::contact.index');
    }

    public function submit(ContactRequest $request)
    {
        // Send mail to admin

        // Sent mail to user
    }
}
