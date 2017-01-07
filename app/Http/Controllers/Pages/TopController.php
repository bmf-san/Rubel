<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopController extends Controller
{
	/**
	 * Show a top page
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function getIndex()
    {
        return view('pages.top');
    }
}
