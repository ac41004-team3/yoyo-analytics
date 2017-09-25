<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
    public function index()
	{
		$customers = Customer::all();
		return $customers;
		//return view('transactions.index', compact('transactions'));
		//return view('customers.index', compact('customers'));
	}

    public function show(Customer $customer)
    {
		return $customer;
        //return view('customers.show', compact('show'));
	}
}
