<?php

namespace App\Http\Controllers\Web;

use \Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View;
     */
    public function index(): View
    {
        return view('profile.index');
    }
}
