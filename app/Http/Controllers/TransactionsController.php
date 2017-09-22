<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\DB;

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

	public function getOutletTotals()
    {
        $outlet = $_GET['outlet'];
        //$transactions = Transaction::where('outlet_id',$outlet)->orderBy('date','asc')->get();
       $totals = DB::table('transactions')
            ->where('outlet_id',$outlet)
           ->select(DB::raw('DATE(date) as date'), DB::raw('sum(spent) as total'))
           ->groupBy(DB::raw('Date(date)') )
           ->orderBy('date')
            ->get();


       return $totals;
    }

    public function getOutletTakings()
    {

    }

}
