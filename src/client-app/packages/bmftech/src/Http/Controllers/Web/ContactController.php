<?php

namespace BmfTech\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use BmfTech\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('bmftech::contact.index');
    }
}
