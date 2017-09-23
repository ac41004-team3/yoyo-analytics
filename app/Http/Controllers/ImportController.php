<?php

namespace App\Http\Controllers;

use App\Events\FileUploaded;
use App\Import;
use App\Transaction;
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
        return view('admin.import.index');
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
            'data.*' => 'mimes:csv|max:10240',
        ];

        $request->validate($rules);

        $file = $request->file('data')->store('import');

        event(new FileUploaded($file));
        return response(200);
    }

    public function revert(Request $request)
    {
        $import = Import::findOrFail($request->input('id'));
        $import->transactions()->each(function ($transaction) {
            return $transaction->delete();
        });
        return 200;
    }
}
