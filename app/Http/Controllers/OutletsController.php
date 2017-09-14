<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;

class OutletsController extends Controller
{
	//Function for returning outlets
	public function index() 
	{
		$outlets = Outlet::all();
		return $outlets; //Returns JSON
		//return view('outlets.index', compact('outlets'));
	}
	
	//Find an outlet by name, as these will likely be selected from a menu or tick box
    public function show(Outlet $outlet)
    {
		$outlet = Outlet::find($name);
		return $outlet;
	}
}
