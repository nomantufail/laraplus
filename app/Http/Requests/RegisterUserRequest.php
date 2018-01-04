<?php

namespace Requests;

use Requests\Request;

class RegisterUserRequest extends Request
{

    public function __construct(){
        parent::__construct();
        $this->antiAuth = true;
        $this->authenticatable = false;
    }
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
        return [
            'username' => 'required',
            'password' => 'required'
        ];
    }
}
