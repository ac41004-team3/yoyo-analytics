<?php
/**
 * Created by PhpStorm.
 * User: Brodie
 * Date: 14/09/2017
 * Time: 12:01
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function getData()
    {


        $users = User::all();
        return view('admin')->with(compact('users'));
    }

    public function activateUser(Request $request)
    {
        $id = $request->input('activate');
        $user= User::find($id);

        $user->is_active = 1;
        $user->save();

        return $this->getData();
    }

    public function update(Request $request)
    {
        $id = $request->input('userid');
        $is_active = $request->input('is_active');
       // dd($is_active);

        $user= User::find($id);
        if($is_active ==="on") {
            $user->is_active = 1;
        }
        else
        {
        $user->is_active = 0;
        }
        $user->save();

        return $this->getData();
    }


    public function delete()
    {

    }


}