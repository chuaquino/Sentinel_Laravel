<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

class LoginController extends Controller
{

    public function login()
    {
      return view('authentication.login');
    }

    public function postLogin(Request $request)
    {
      try{
          if(Sentinel::authenticate($request->all())){
            $slug =Sentinel::getUser()->roles()->first()->slug;
              if($slug == 'admin')
                return redirect('/admin');

              elseif($slug == 'guest')
                return redirect ('/guests');
          } else {
            return redirect()->back()->with(['error' => 'Incorrect log in credentials.']);
          }
      } catch (ThrottlingException $e) {
          $delay = $e->getDelay();

          return redirect()->back()->with(['error' => "It looks like you are entering incorrect log in credentials. Try again after $delay seconds."]);        
      }

    }

    public function logout()
    {
      Sentinel::logout();

      return redirect('/login');
    }
}
