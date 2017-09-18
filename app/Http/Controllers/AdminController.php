<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index')->with('users', User::all());
    }

    public function store(Request $request)
    {
        return view('admin.index')->with('users', User::all());
    }
}
