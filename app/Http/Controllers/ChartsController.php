<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chartsController extends Controller
{
    public function index()
	{
		$outlets = app('App\Http\Controllers\OutletsController')->index();
		$customers = app('App\Http\Controllers\CustomersController')->index();
		$transactions = app('App\Http\Controllers\TransactionsController')->index();
		return view('charts.index', compact('outlets', 'customers', 'transactions'));
	}
}
