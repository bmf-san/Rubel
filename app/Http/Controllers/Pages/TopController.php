<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Top Controller
    |--------------------------------------------------------------------------
    */

    public function getIndex()
    {
        return view('pages.top');
    }
}
