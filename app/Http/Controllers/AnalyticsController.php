<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlets = app('App\Http\Controllers\OutletsController')->index();
		$customers = app('App\Http\Controllers\CustomersController')->index();
		$transactions = app('App\Http\Controllers\TransactionsController')->index();
        return view('analytics', compact('outlets', 'customers', 'transactions'));
    }
}
