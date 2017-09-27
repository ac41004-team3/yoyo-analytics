<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Outlet;
use App\Transaction;

class AnalyticsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlets = Outlet::all();
        $customers = Customer::all();
        $transactions = Transaction::all();
        return view('analytics', compact('outlets', 'customers', 'transactions'));
    }
}
