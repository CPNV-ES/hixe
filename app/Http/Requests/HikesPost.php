<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class HikesPost extends FormRequest
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
            'hikeName'      => 'required|min:3',
        ];
    }

    public function messages(){
        return [
            'hikeName.required' => 'Le Nom est obligatoire',
        ];
    }
}
