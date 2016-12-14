<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{

    public function login()
    {
      return view('authentication.login');
    }

    public function postLogin(Request $request)
    {
      Sentinel::authenticate($request->all());

      $slug =Sentinel::getUser()->roles()->first()->slug;

      if($slug == 'admin')
        return redirect('/admin');

      elseif($slug == 'guest')
        return redirect ('/guests');

    }

    public function logout()
    {
      Sentinel::logout();

      return redirect('/login');
    }
}
