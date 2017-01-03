<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
	public function getIndex()
	{
		return view('admin.dashboard');
	}
}
