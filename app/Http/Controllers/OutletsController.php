<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;

class OutletsController extends Controller
{
	// Function for showing returning a specific outlet
	public function index()
	{
		$outlets = Outlet::all();
		return view('outlets.index', compact('outlets'));
	}
	
    /*public function show(Outlet $outlet)
    {
		$outlet = Outlet::find($id);
	}*/
}
