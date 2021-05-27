<?php

namespace App;

use DateTime;

class HikeCSV
{
    // variable containing the values ​​of the hikes load
    public $name;
    public $meetingLocation;
    public $meetingDate;
    public $hikeDate;
    public $start;
    public $finish;
    public $min;
    public $max;
    public $denivele;
    public $difficulty;
    public $info;

    // variable containing the error values
    public $nameError;
    public $meetingLocationError;
    public $meetingDateError;
    public $hikeDateError;
    public $startError;
    public $finishError;
    public $minError;
    public $maxError;
    public $deniveleError;
    public $difficultyError;
    public $infoError;


    function __construct($name, $meetingLocation, $meetingDate, $hikeDate, $start, $finish, $min, $max, $denivele, $difficulty, $info)
    {
        $this->name = $name;
        $this->meetingLocation = $meetingLocation;
        $this->meetingDate = $meetingDate;
        $this->hikeDate = $hikeDate;
        $this->start = $start;
        $this->finish = $finish;
        $this->min = $min;
        $this->max = $max;
        $this->denivele = $denivele;
        $this->difficulty = $difficulty;
        $this->info = $info;
    }

    static function loadHike($file)
    {
        if (($handle = fopen($file, 'r')) !== FALSE){
            while (($datas = fgetcsv($handle, 1000, ';' )) !== FALSE) {
                $arrayHikes[] = new HikeCSV(
                    $datas[0],
                    $datas[1],
                    $datas[2],
                    $datas[3],
                    $datas[4],
                    $datas[5],
                    $datas[6],
                    $datas[7],
                    $datas[8],
                    $datas[9],
                    $datas[10]
                );
            }
            fclose($handle);
        }
        return $arrayHikes;
    }

    static function validationMultiHikes($hikes){
        function validateDate($date, $format = 'Y-m-d H:i')
        {
            $d = DateTime::createFromFormat($format, $date);
            return $d && $d->format($format) == $date;
        }

        $validatedHike = array();
        foreach ($hikes as $hike){

            if(empty($hike->name)){
                $hike->nameError = "Le champ nom de la course est obligatoire";
            } elseif( strlen($hike->name) > 60){
                $hike->nameError = "le champ nom de la course écrivez au max 60 caractères";
            }

            if(empty($hike->meetingLocation)){
                $hike->meetingLocationError = "Le champ lieu de rendez-vous est obligatoire";
            } elseif( strlen($hike->meetingLocation) > 60){
                $hike->meetingLocationError = "Dans le champ lieu de rendez-vous écrivez au max 60 caractères";
            }
                    
            if(empty($hike->meetingDate)){
                $hike->meetingDateError = "Le champ début du rendez-vous (date) est obligatoire";
            } elseif(!validateDate($hike->meetingDate, 'Y-m-d')){
                $hike->meetingDateError = "Le champ début du rendez-vous (date) doit être sous ce format Y-m-d";
            }
                    
            if(empty($hike->hikeDate)){
                $hike->hikeDateError = "Le champ fin du rendez-vous (date) est obligatoire";
            } elseif(!validateDate($hike->hikeDate, 'Y-m-d')){
                $hike->hikeDateError = "Le champ fin du rendez-vous (date) doit être sous ce format Y-m-d";
            }
                    
            if(empty($hike->start)){
                $hike->startError = "Le champ débuz du rendez-vous (temps) est obligatoire";
            } elseif(!validateDate($hike->start, 'H:i')){
                $hike->startError = "Le champ début du rendez-vous (heure) doit être sous ce format HH:mm";
            }
                    
            if(empty($hike->finish)){
                $hike->finishError = "Le champ fin du rendez-vous (temps) est obligatoire";
            } elseif(!validateDate($hike->finish, 'H:i')){
                $hike->finishError = "Le champ fin du rendez-vous (heure) doit être sous ce format HH:mm";
            }
                    
            if(!is_numeric($hike->min)){
                $hike->minError = "Le champ minimum de personne doit comporter uniquement des chiffres";
            } 
                    
            if(!is_numeric($hike->max)){
                $hike->maxError = "Le champ maximum de personne doit comporter uniquement des chiffres";
            } 
                    
            if(empty($hike->denivele)){
                $hike->deniveleError = "Le champ dénivelé est obligatoire";
            }elseif(is_numeric("denivele")){
                $hike->deniveleError = "Le champ dénivelé doit comporter uniquement des chiffres";
            } 
                    
            if(empty($hike->difficulty)){
                $hike->difficultyError = "Le champ difficulté est obligatoire";
            }elseif(is_numeric("difficulty")){
                $hike->difficultyError = "Le champ difficulté doit comporter uniquement des chiffres";
            } 

            $validatedHike[] = $hike;
        }
        return $validatedHike;
    }
}