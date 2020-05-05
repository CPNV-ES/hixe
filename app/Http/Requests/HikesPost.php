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
            'hikeName'      => 'required',
            'locationRdv'   => 'required',
            'dateRdv'       => 'required',
            'timeRdv'       => 'required',
            'dateHike'      => 'required',
            'startHike'     => 'required',
            'endHike'       => 'required',
            'difficulty'    => 'required',
            'dropAltitude'  => 'required'
        ];
    }

    public function messages(){
        return [
            'hikeName.required' => 'Le Nom est obligatoire',
            'locationRdv.required' => 'Le Lieux de rendez-vous est obligatoire',
            'dateRdv.required' => 'La date de rendez-vous est obligatoire',
            'timeRdv.required'=> "S'electionner une heure",
            'dateHike.required' => 'La date de la course est obligatoire',
            'startHike.required'=> "L'heure de départ est obligatoire",
            'endHike.required' => "L'heure de fin est obligatoire",
            'difficulty.required'=> "Difficulté est obligatoire",
            'dropAltitude.required' => "Le dénivelé est obligatoire",
        ];
    }
}
