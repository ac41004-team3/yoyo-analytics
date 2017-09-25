<?php

namespace App\Http\Controllers;

use App\Outlet;
use Illuminate\Support\Facades\Auth;

class AnalyticsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlets = Auth::user()->outlets()->get();
        $outlets = Outlet::all();

        return view('analytics')->with('outlets', $outlets);
    }
}
