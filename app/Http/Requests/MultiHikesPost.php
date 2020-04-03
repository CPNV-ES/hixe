<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultiHikesPost extends FormRequest
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
            'name' => 'required',
            'meetingLocation' => 'required',
            'meetingDate' => 'required',
            'hikeDate' => 'required',
            'start' => 'required',
            'finish' => 'required',
            'difficulty' => 'required',
            'denivele' => 'required'
        ];
    }
}
