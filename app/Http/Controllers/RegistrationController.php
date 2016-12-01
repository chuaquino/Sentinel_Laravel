<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class RegistrationController extends Controller
{

  public function register()
  {
    return view('authentication.register');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'first_name' => 'required|min:2|max:255',
      'last_name' => 'required|min:2|max:255',
      'email' => 'required|email|min:6|max:255|unique:users',
      'password' => 'required|min:6|confirmed',
      'roomNum' => 'min:3|confirmed',
      'checkIn' => 'date|confirmed',
      'checkOut' => 'date|confirmed',
    ]);

    $user = Sentinel::registerAndActivate($request->all());

    $role = Sentinel::findRoleBySlug('guest');

    $role->users()->attach($user);

    return redirect()->route('admin.index')->with('alert-success','Guest added and saved!');
  }

}
