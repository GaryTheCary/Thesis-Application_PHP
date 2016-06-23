<?php

namespace DEVAPP\Http\Requests;

use DEVAPP\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class NewMessageToUserRequest extends Request
{
    protected $rules = [
        'user' => 'required',
        'title' => 'required',
        'body' => 'required',
    ];

    protected $message = [

        'user.required' => 'Please provide a valid user',
        'title.required' => 'Please provide a valid topic',
        'body.required' => 'Your content could not be empty'
    ];

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = $this->rules;

        return $rules;
    }

    public function messages()
    {
        $messages = $this->message;

        return $messages;
    }

    public function all()
    {
        $input = parent::all();

        $designer = Auth::user();
        $output = [

            '_token' => $input['_token'],
            'user' => $input['user'],
            'title' => $input['title'],
            'body' => $input['body'],
            'designer' => $designer->name
        ];
        return $output;
    }

}
