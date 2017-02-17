<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Reminder;
use Mail;
use Sentinel;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
      return view('authentication.forgot-password');
    }

    public function postForgotPassword (Request $request)
    {
      $user = User::whereEmail($request->email)->first();

      $sentinelUser = Sentinel::findById($user->id);

      if(count($user) == 0)
        return redirect()->back()->with(['success' => 'Youre new password has been to your email address.']);

      $reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);

      $this->sendEmail($user, $reminder->code);
      return redirect()->back()->with(['success' => 'Youre new password has been to your email address.']);
    }

    private function sendEmail($user, $code)
    {
      Mail::send('emails.forgot-password', [
        'user' => $user,
        'code' => $code
      ], function ($message) use ($user){
            $message->to($user->email);
            $message->subject("[PASSWORD RESET]");
      });
    }
}
