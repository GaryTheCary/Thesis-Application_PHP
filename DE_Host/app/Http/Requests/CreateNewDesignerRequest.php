<?php

namespace DEVAPP\Http\Requests;

use DEVAPP\Http\Requests\Request;
use Illuminate\Support\Facades\Validator;

class CreateNewDesignerRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected $rules = [

        'firstname' => 'required',
        'lastname' => 'required',
        'username' => 'required',
        'password' => 'required|min:8|max:8',
        'email' => 'required',
        'phonenumber' => 'required',
        'imagefilepath' => 'required'

    ];

    protected $messages = [

        'firstname.required' => 'Please fill in your first name',
        'lastname.required' => 'Your last name is also required',
        'username.required' => 'Your username must be started with two capital letters',
        'password.required' => 'Your password has to be exact 8 characters',
        'email.required' => 'Please provide a valid email address',
        'phonenumber.required' => 'Your phone number is not valid',
        'imagefilepath' => 'Please upload your image file'
    ];


    public function messages()
    {
        $messages = $this->messages;
        return $messages;
    }

    public function rules()
    {
        $rules = $this->rules;
        return $rules;
    }

//    if forbidden set to another page
//    public function forbiddenResponse()
//    {
//        return $this->redirector->to("/");
//    }

}
