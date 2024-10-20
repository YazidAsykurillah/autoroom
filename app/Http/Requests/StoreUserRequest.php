<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
    public function rules()
    {
        $rules =  [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'code'=>'required|unique:users,code',
            // role validation rules
            'role_name'=> 'required|array|min:1',
            'role_name.*'=> 'required|string|distinct|min:3',
        ];
        return $rules;
    }
}
