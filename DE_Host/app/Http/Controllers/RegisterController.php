<?php

namespace DEVAPP\Http\Controllers;

use DEVAPP\User;
use Illuminate\Http\Request;

use DEVAPP\Http\Requests;
use DEVAPP\Http\Controllers\Controller;
use DEVAPP\Mailers\AppMailer;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    //
    public function register()
    {
        return view('auth.testRegister');
    }

    public function postRegister(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);

        $user = User::create($request->all());

        $mailer->sendEmailComfirmationTo($user);

        flash("Please confirm your email");

        return redirect()->back();
    }

    public function confirmEmail($email_token)
    {
        $user = User::where('email_token', '=', $email_token)->firstOrFail();
        $user->verified = true;
        $user->email_token = null;
        $user->save();
        flash('You are now confirmed. Please login');
        return redirect()->intended('test/login');
    }
}
