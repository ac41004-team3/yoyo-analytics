<?php

namespace App\Http\Controllers;

use App\Outlet;
use App\Transaction;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{
    public function getOutletPeaks()
    {
        $current_year = date('Y');
        $outlet = $_GET['outlet'];
        $outlet_name = Outlet::where('id', $outlet)->first()->name;

        $hours = DB::table('transactions')
            ->where('outlet_id', $outlet)
            ->select(DB::raw('HOUR(date) as hour'), DB::raw('COUNT(id) as transaction_count'))
            ->groupBy(DB::raw('Hour(date)'))
            ->orderBy('hour')
            ->get();

        $hours['outlet_name'] = $outlet_name;
        $hours['year'] = $current_year;

        return $hours;
    }

    public function getUserOutlets()
    {
        $outlets =Auth::user()->outlets()->get(['id','name']);
        return $outlets;
    }

    public function getOutletTotals()
    {
        $current_year = date('Y');
       // $outlets = $_GET['outlets'];
       $outlets =Auth::user()->outlets()->pluck('id');
      //dd($outlets);
        $totals_array = [];

        foreach ($outlets as $value) {
            $outlet_name = Outlet::where('id', $value)->first()->name;

            $totals = DB::table('transactions')
                ->where('outlet_id', $value)
                ->select(DB::raw('DATE(date) as date'), DB::raw('sum(spent) as total'))
                ->groupBy(DB::raw('Date(date)'))
                ->orderBy('date')
                ->get();

            $totals['outlet_name'] = $outlet_name;
            array_push($totals_array, $totals);
        }
        $totals_array['year'] = $current_year;

        return $totals_array;
    }

    public function getOutletStats()
    {
        $current_year = date('Y');

        //$searchoutlets = $_GET['outlets'];
        $searchoutlets =Auth::user()->outlets()->pluck('id');
        $stats_array = [];
        
        foreach ($searchoutlets as $value) {
            $outlet = Outlet::where('id', $value)->first();
            
            $stats = Transaction::where('outlet_id', $outlet->id)
                ->select(DB::raw('COUNT(id) as transaction_count'), DB::raw('sum(discount) as discount_total'),
                    DB::raw('sum(spent) as total'), DB::raw('count(Distinct customer_id) as customer_count'))
                ->get()
                ->each(function ($stats) use ($outlet) {
                    $stats['outlet_name'] = $outlet->name;
                });
            array_push($stats_array, $stats);
        }

        return $stats_array;
    }




}
