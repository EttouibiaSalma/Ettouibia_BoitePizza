<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'productCode.name' => 'required',
            'clientNum.first_name'=>'required',
            'message' => 'required'
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
            'productCode.name' => 'required',
            'clientNum.first_name'=>'required',
            'message' => 'required'
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
            'clientNum.first_name.required'=>'Veuillez séléctionnez un client',
            'productCode.name.required'=>'Veuillez séléctionnez un produit',
            'message.required'=>'Le champs message est obligatoire'
        ];
    }
}
