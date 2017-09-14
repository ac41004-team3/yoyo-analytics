<?php
/**
 * Created by PhpStorm.
 * User: Brodie
 * Date: 14/09/2017
 * Time: 12:01
 */

namespace App\Http\Controllers;


use App\User;

class UserController extends Controller
{

    public function getData()
    {
        $users = User::all();

        return $users;
    }

    public function update()
    {

    }

    public function delete()
    {

    }


}