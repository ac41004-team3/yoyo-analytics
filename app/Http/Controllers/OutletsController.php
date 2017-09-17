<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;
use Carbon\Carbon;

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
		return $outlet;
	}

	public function chart(Outlet $outlet)
	{
		//POST, takes: Chart type singular, outlets array, optional tribes null to array, time period -> GO!
		/*$from = Carbon::now();
		error_log($from);*/
		/*error_log($outlet->transactions);
		foreach ($outlet->transactions as $transaction)
		{
			$transaction->date = substr($transaction->date,0,10);
		}
		return view('outlets.chart', compact('outlet'));*/

	}
}
