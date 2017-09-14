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


class UserController extends Controller
{

    public function getData()
    {
        $data = User::all()
            ->take(Input::get('jtPageSize'))
            ->skip(Input::get('jtStartIndex'));

        $users = User::all();
        return $users;
//        return Response::json($users);

//        return Response(array(
//
//        'Result' => 'OK',
//            'TotalRecordCount' => $users->count(),
//            'Records' => $users->get()->toArray()
//        ));
    }

    public function update()
    {

    }

    public function delete()
    {

    }


}