<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'required',
            'login'=>'required',
            'password'=>'required',
            'imagePath'=>'required'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'Ce champs est obligatoire',
            'last_name.required' => 'Ce champs est obligatoire',
            'email.required'=>'Ce champs est obligatoire',
            'login.required'=>'Ce champs est obligatoire',
            'password.required'=>'Ce champs est obligatoire',
            'imagePath.required'=>'Ce champs est obligatoire'
            
        ];
    }
}
