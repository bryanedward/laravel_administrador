<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarFormulario extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        // autorizacion 
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
            'name' => 'required',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|confirmed',
            'roles' => 'required'
        ];
    }
}
