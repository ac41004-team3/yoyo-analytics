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
		//return view('outlets.index', compact('outlets'));
	}
	
    public function show(Customer $customer)
    {
		$customer = Customer::find($customer_id);
		return $customer;
	}
}
