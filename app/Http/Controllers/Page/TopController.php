<?php

namespace App\Http\Controllers\Page;

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
        return view('page.top');
    }
}
