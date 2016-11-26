<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users;

use Sentinel;

class GuestController extends Controller
{
  public function todaysMenu()
  {
    // $users = Sentinel::inRole('guest');


    // $users = Users::all()
    //
    //
    // return view('users.index', ['users' => $users]);

    return view('guests/todays-menu');
  }
}
