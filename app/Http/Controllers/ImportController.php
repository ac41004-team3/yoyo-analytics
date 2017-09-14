<?php

namespace App\Http\Controllers;

use App\Events\FileUploaded;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('import.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'data' => 'required|mimes:csv',
        ];

//        $request->validate($rules);

        $file = $request->file('data')->store('import');

        event(new FileUploaded($file));

        return view('import.index')->with(compact(['success' => true]));
    }
}
