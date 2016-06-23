<?php

namespace DEVAPP\Http\Requests;
use DEVAPP\Http\Requests\Request;
use DEVAPP\NewDesigner;
use Illuminate\Support\Facades\Gate;
use DEVAPP\User;

class CreateLoginCheckRequest extends Request
{
    protected $redirect = '/';

    protected $rules = [
        'email' => 'required',
        'password' => 'required|min:8|max:8'
    ];

    protected $messages = [

        'email.required' => 'Please Provide a Valid ID or Email address',
        'password.required' =>  'Your Password is not Valid, Please Check'
    ];

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
    public function rules()
    {
        $rules = $this->rules;
        return $rules;
    }

    public function messages()
    {
        $messages = $this->messages;
        return $messages;
    }
}
