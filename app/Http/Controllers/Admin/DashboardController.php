<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
	/**
	 * Show a admin dashboard
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		return view('admin.dashboard');
	}
}
