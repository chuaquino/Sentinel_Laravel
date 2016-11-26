<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users;

use Sentinel;

class UsersController extends Controller
{
    public function index()
    {
      $users = Sentinel::inRole('guest');


      // $users = Users::all()
      //
      //
      return view('users.index', ['users' => $users]);
    }
}
