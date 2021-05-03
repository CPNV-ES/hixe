<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class MultiHikesPost  extends FormRequest
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
            'name'              =>      'required|max:100',
            'meetingLocation'   =>      'required|max:100',
            //'meetingDate'       =>      'required|date|date_format:d.m.Y',
            //'hikeDate'          =>      'required|date|date_format:d.m.Y|after_or_equal:meetingDate',
            //'start'             =>      'required|date|date_format:H:i',
            //'finish'            =>      'required|date|date_format:H:i',
            'min'               =>      'numeric',
            'max'               =>      'numeric',
            'denivele'          =>      'required|numeric' ,
            'difficulty'        =>      'required|numeric',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Le champ nom de la course est obligatoire',
            'meetingLocation.required' => 'Le champ nom du lieu de rendez-vous est obligatoire',
            'meetingDate.required' => 'Le champ date du rendez-vous est obligatoire',
            'meetingDate.date_format' => 'Écrivez la date du rendez-vous au format jour/mois/année',
            'hikeDate.required' => 'Le champ date de fin est obligatoire',
            'hikeDate.date_format' => 'Écrivez la date au format mois/jour/année',
            'hikeDate.after_or_equal' => 'La date de fin doit être après la date du rendez-vous',
            'start.required' => 'Le champ heure du rendez-vous est obligatoire',
            'start.date_format' => 'Écrivez l\'heure du rendez-vous au format jour/mois/année',
            'finish.required' => 'Le champ heure de fin est obligatoire',
            'finish.date_format' => 'Écrivez l\'heure de fin au format mois/jour/année',
            'min.numeric' => 'Dans le champ minimum écrivez uniquement des chiffres',
            'max.numeric' => 'Dans le champ minimum écrivez uniquement des chiffres',
            'denivele.required' => 'Le champ denivelé est obligatoire',
            'denivele.numeric' => 'Dans le champ denivelé écrivez uniquement des chiffres',
            'difficulty.required' => 'Le champ denivelé est obligatoire',
            'difficulty.numeric' => 'Dans le champ difficulty écrivez uniquement des chiffres',
        ];
    }
}
