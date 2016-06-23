<?php

namespace DEVAPP\Http\Controllers;

use DEVAPP\Http\Requests;
use DEVAPP\Http\Requests\CreateNewDesignerRequest;
use DEVAPP\Http\Requests\EmailVerificationRequest;
use DEVAPP\NewDesigner;
use DEVAPP\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
class NewDesignerController extends Controller
{
    public function index(){

        return view('newDesigner.userCreate');
    }

    public function postRegistation(CreateNewDesignerRequest $request){

        $input = $request->all();

        $insert_arr = array('firstname'=>$input['firstname'], 'lastname'=>$input['lastname'],
                            'username'=>$input['username'], 'password'=>$input['password'],
                            'email'=>$input['email'], 'phonenumber'=>$input['phonenumber'],
                            'imagefilepath'=>$input['imagefilepath']);

        $designer = new NewDesigner();

        // Here we insert the $insert_arr to the database

        $variable = [

            "title" => "Register Successed",
            "description" => "Congratulation ! Please Click Here to Login in !",
            "url" => url('/')
        ];


        return view('newDesigner.postRegistation', $variable);

    }

    public function forgetPassword()
    {
        return view('newDesigner.passwordRedirectLayer');
    }

    public function emailVerification(EmailVerificationRequest $request){

        // here we verify the email address through provided email address
        //$input = $request->all();
        // Get $input and send email to the input email address
        // Then return to the result page
        return view('newDesigner.sendPassword');
    }
}
