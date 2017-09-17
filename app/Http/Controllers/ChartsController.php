<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chartsController extends Controller
{
    public function index()
	{
		return view('charts.index');
	}
}
