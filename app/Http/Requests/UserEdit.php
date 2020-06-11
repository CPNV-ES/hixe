<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class UserEdit extends FormRequest
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
        return [
            "firstname" => 'required|min:3',
            "email" => 'required',
        ];
    }

    public function messages(){
        return [
            'firstname.required' => 'Le Nom est obligatoire',
            'firstname.min' => 'Le Nom doigt avoir au minimum 3 caractères',
            'email.required' => "L'email est obligatoire",
        ];
    }
}
