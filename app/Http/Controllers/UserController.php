<?php
/**
 * Created by PhpStorm.
 * User: Brodie
 * Date: 14/09/2017
 * Time: 12:01
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{

    public function getData()
    {
//        $data = User::all()

//$users = User::select('id','name','email','is_admin','is_active')->get();
//        $users = User::all();
//        return $users;
//        return Response::json($users);

//        return Response(array(
//
//        'Result' => 'OK',
//            'TotalRecordCount' => $users->count(),
//            'Records' => $users->get()->toArray()
//        ));

        $users = \App\User::all();
        return view('admin')->with(compact('users'));
    }

    public function update()
    {

    }

    public function delete()
    {

    }


}