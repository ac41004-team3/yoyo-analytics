<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Outlet;
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
        $outlets = $_GET['outlets'];
        $totals_array=[];
        foreach($outlets as $value) {
            $outlet_name = Outlet::where('id', $value)->first()->name;

            $totals = DB::table('transactions')
                ->where('outlet_id', $value)
                ->select(DB::raw('DATE(date) as date'), DB::raw('sum(spent) as total'))
                ->groupBy(DB::raw('Date(date)'))
                ->orderBy('date')
                ->get();

            $totals["outlet_name"] = $outlet_name;
            array_push($totals_array,$totals);
        }
       return $totals_array;
    }

    public function getOutletStats()
    {

        $searchoutlets = $_GET['outlets'];
        //dd($searchoutlets);
        $stats_array=[];
        foreach($searchoutlets as $value) {
            $outlet = Outlet::where('id', $value)->first();
//dd($outlet);
            $stats = Transaction::where('outlet_id', $outlet->id)
                ->select(DB::raw('COUNT(id) as transaction_count'), DB::raw('sum(discount) as discount_total'), DB::raw('sum(spent) as total'), DB::raw('count(Distinct customer_id) as customer_count'))
                ->get()
                ->each(function ($outlet_stats) use ($outlet) {
                    $outlet_stats['outlet_name'] = $outlet->name;
                });
            array_push($stats_array,$stats);
        }

        return $stats_array;
    }

}
