<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Outlet;
use Illuminate\Support\Facades\Auth;
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

	public function getOutletPeaks()
    {
        $current_year=date("Y");
        $outlet = $_GET['outlet'];

            $outlet_name = Outlet::where('id',$outlet)->first()->name;

            $hours = DB::table('transactions')
                ->where('outlet_id', $outlet)->whereYear('date','=',$current_year)
                ->select(DB::raw('HOUR(date) as hour'), DB::raw('COUNT(id) as transaction_count'))
                ->groupBy(DB::raw('Hour(date)'))
                ->orderBy('hour')
                ->get();

            $hours["outlet_name"] = $outlet_name;


        $hours["year"]=$current_year;
        return $hours;

    }

	public function getOutletTotals()
    {
        $current_year=date("Y");
        $outlets = $_GET['outlets'];
      //  $outlets=Auth::user()->outlets()->get();
      //  dd($outlets);

        $totals_array=[];
        foreach($outlets as $value) {
            $outlet_name = Outlet::where('id', $value)->first()->name;

            $totals = DB::table('transactions')
                ->where('outlet_id', $value)->whereYear('date','=',$current_year)
                ->select(DB::raw('DATE(date) as date'), DB::raw('sum(spent) as total'))
                ->groupBy(DB::raw('Date(date)'))
                ->orderBy('date')
                ->get();

            $totals["outlet_name"] = $outlet_name;
            array_push($totals_array,$totals);
        }
        $totals_array["year"]=$current_year;
       return $totals_array;
    }

    public function getOutletStats()
    {
        $current_year=date("Y");

      //  dd( $current_year);
        $searchoutlets = $_GET['outlets'];
        //dd($searchoutlets);
        $stats_array=[];
        foreach($searchoutlets as $value) {
            $outlet = Outlet::where('id', $value)->first();
//dd($outlet);
            $stats = Transaction::where('outlet_id', $outlet->id)->whereYear('date','=',$current_year)
                ->select(DB::raw('COUNT(id) as transaction_count'), DB::raw('sum(discount) as discount_total'), DB::raw('sum(spent) as total'), DB::raw('count(Distinct customer_id) as customer_count'))
                ->get()
                ->each(function ($stats) use ($outlet) {
                    $stats['outlet_name'] = $outlet->name;
                });
            array_push($stats_array,$stats);
        }
        //array_push($stats_array,$current_year);
        return $stats_array;
    }

}
