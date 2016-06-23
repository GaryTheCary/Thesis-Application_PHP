<?php

namespace DEVAPP\Http\Requests;

use DEVAPP\Http\Requests\Request;
use DEVAPP\User;
use Illuminate\Support\Facades\Redirect;

class EmailVerificationRequest extends Request
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
        'email' => 'required'
    ];

    protected $messages = [

        'email.required' => 'Your Email Address is not Valid, Please Check ! '
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
}
