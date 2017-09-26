<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionsController extends Controller
{
    public function index()
	{
		$transactions = Transaction::all();
		return $transactions;
		//return view('transactions.index', compact('transactions'));
		//return view('outlets.index', compact('outlets'));
	}
	
    public function show(Transaction $transaction)
    {
		$transaction = Transaction::find($id);
		return $transaction;
	}
}
