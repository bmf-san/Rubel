<?php

namespace BmfTech\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\RedirectResponse;
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

    /**
     * Submit a email
     *
     * @param  ContactRequest $request
     * @return RedirectResponse
     */
    public function submit(ContactRequest $request): RedirectResponse
    {
        $userName = $request->name;
        $userEmail = $request->email;
        $userMessage = $request->message;

        try {
            $this->sendEmailToUser($userName, $userEmail, $userMessage);
            $this->sendEmailToAdmin($userName, $userEmail, $userMessage);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return redirect()->to(route('web.contacts.thanks'));
    }

    /**
     * Send email to user
     *
     * @param string $userName
     * @param string $userEmail
     * @param string $userMessage
     */
    public function sendEmailToUser($userName, $userEmail, $userMessage): void
    {
        $this->mail->send([], [], function ($message) use ($userName, $userEmail, $userMessage) {
            $route = route('web.root.index');
            $templateForUser = <<<EOF
Thank you for your message!

Name:{$userName}
Email:{$userEmail}

Message:
{$userMessage}


{ $route }
EOF;

            $message->to($userEmail)
             ->from(config('admin.email'), config('admin.name'))
             ->subject('Thank you for your message. bmf-tech.com')
             ->setBody($templateForUser, 'text/plain');
        });
    }

    /**
     * Send email to admin
     *
     * @param string $userName
     * @param string $userEmail
     * @param string $userMessage
     */
    public function sendEmailToAdmin($userName, $userEmail, $userMessage): void
    {
        $this->mail->send([], [], function ($message) use ($userName, $userEmail, $userMessage) {
            $templateForAdmin = <<<EOF
Received a message!

Name:{$userName}
Email:{$userEmail}

Message:
{$userMessage}
EOF;

            $message->to(config('admin.email'))
             ->from(config('admin.email'), 'Admin')
             ->subject('Received a message! bmf-tech.com')
             ->setBody($templateForAdmin, 'text/plain');
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function thanks(): View
    {
        return view('bmftech::contact.thanks');
    }
}
