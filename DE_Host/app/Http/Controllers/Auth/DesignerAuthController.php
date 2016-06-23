<?php

namespace DEVAPP\Http\Controllers\Auth;

use DEVAPP\Http\Requests\CreateNewDesignerRequest;
use Illuminate\Auth\Guard;
use DEVAPP\Http\Controllers\Controller;
use DEVAPP\Http\Requests\CreateLoginCheckRequest;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DEVAPP\User;

class DesignerAuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $user;
    protected $auth;

    public function __construct(Guard $user, Guard $auth)
    {
        $this->user = $user;
        $this->auth = $auth;

    }

    public function getLogin()
    {
        if($this->auth->check()){
            return redirect()->intended('/homepage');
        }else{
            return view('auth.index');
        }
    }

    public function postLogin(CreateLoginCheckRequest $request)
    {
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            return redirect()->intended('homepage');
        }
        else{
            return redirect('/')->withInput($request->all())->withErrors(getErrors());
        }
    }

    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function getRegister()
    {
        return view('newDesigner.userCreate');
    }

    public function postRegister(CreateNewDesignerRequest $request)
    {
        Auth::login($this->create($request->all()), true);

        $variable = [

            "title" => "Register Successed",
            "description" => "Congratulation ! Please Click Here to Login in !",
            "url" => url('/')
        ];


        return view('newDesigner.postRegistation', $variable);
//        return $request->all();
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['firstname'].' '.$data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phonenumber' => $data['phonenumber'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'imagefilepath' => $data['imagefilepath']
        ]);
    }

}
