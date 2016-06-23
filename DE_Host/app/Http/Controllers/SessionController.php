<?php

namespace DEVAPP\Http\Controllers;

use Illuminate\Http\Request;

use DEVAPP\Http\Requests;
use DEVAPP\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function login()
    {
        return view('test.login');
    }

    public function postlogin(Request $request)
    {
        //  TODO: This is to add a login function -> Auth
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
        if(Auth::attempt($this->getCredentials($request)))
        {
            flash('you are now signed in');
            return redirect('test/dashboard');
        }

        flash('could not sign you in');
        return redirect('test/login');

    }

    public function logout()
    {
        Auth::logout();
        flash('you have now been sign out');
        return redirect()->intended('test/login');
    }

    protected function getCredentials(Request $request)
    {
        return [

            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'verified' => true
        ];
    }
}
