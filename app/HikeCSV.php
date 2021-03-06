<?php

namespace App;

use DateTime;

class HikeCSV
{
    // variable containing the values ​​of the hikes load
    public $name;
    public $user;
    public $userId;
    public $meetingLocation;
    public $meetingDate;
    public $hikeDate;
    public $start;
    public $finish;
    public $min;
    public $max;
    public $denivele;
    public $type;
    public $typeId;
    public $difficulty;
    public $info;

    // variable containing the error values
    public $nameError;
    public $userError;
    public $meetingLocationError;
    public $meetingDateError;
    public $hikeDateError;
    public $startError;
    public $finishError;
    public $minError;
    public $maxError;
    public $deniveleError;
    public $typeError;
    public $difficultyError;
    public $infoError;
    public $error = false;


    function __construct($name, $user, $meetingLocation, $meetingDate, $hikeDate, $start, $finish, $min, $max, $denivele, $type, $difficulty, $info)
    {
        $this->name = $name;
        $this->user = $user;
        $this->meetingLocation = $meetingLocation;
        $this->meetingDate = $meetingDate;
        $this->hikeDate = $hikeDate;
        $this->start = $start;
        $this->finish = $finish;
        $this->min = $min;
        $this->max = $max;
        $this->denivele = $denivele;
        $this->type = $type;
        $this->difficulty = $difficulty;
        $this->info = $info;
    }

    static function loadHike($file)
    {
        if (($handle = fopen($file, 'r')) !== FALSE){
            while (($datas = fgetcsv($handle, 1000, ';' )) !== FALSE) {
                if(!isset($datas[0], $datas[1], $datas[2], $datas[3], $datas[4], $datas[5], $datas[6], $datas[7], $datas[8], $datas[9], $datas[10])){
                    return $datas == null;
                }
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
                    $datas[10],
                    $datas[11],
                    $datas[12]
                );
            }
            fclose($handle);
        }
        return $arrayHikes;
    }

    static function validationMultiHikes($hikes, $users, $hike_types){
        function validateDate($date, $format = 'Y-m-d H:i')
        {
            $d = DateTime::createFromFormat($format, $date);
            return $d && $d->format($format) == $date;
        }

        $validatedHike = array();
        foreach ($hikes as $hike){
            if(empty($hike->name)){
                $hike->nameError = "Le champ nom de la course est obligatoire";
                $hike->error = true;
            } elseif( strlen($hike->name) > 20){
                $hike->nameError = "le champ nom de la course écrivez au max 60 caractères";
                $hike->error = true;
            } elseif( $hike->name == "Exemple de course"){
                $hike->nameError = "Supprimez l'example";
                $hike->error = true;
            }

            if(empty($hike->meetingLocation)){
                $hike->meetingLocationError = "Le champ lieu de rendez-vous est obligatoire";
                $hike->error = true;
            } elseif( strlen($hike->meetingLocation) > 20){
                $hike->meetingLocationError = "Dans le champ lieu de rendez-vous écrivez au max 60 caractères";
                $hike->error = true;
            }
                    
            if(empty($hike->meetingDate)){
                $hike->meetingDateError = "Le champ début du rendez-vous (date) est obligatoire";
                $hike->error = true;
            } elseif(!validateDate($hike->meetingDate, 'Y-m-d')){
                $hike->meetingDateError = "Le champ début du rendez-vous (date) doit être sous ce format Y-m-d";
                $hike->error = true;
            }
                    
            if(empty($hike->hikeDate)){
                $hike->hikeDateError = "Le champ fin du rendez-vous (date) est obligatoire";
                $hike->error = true;
            } elseif(!validateDate($hike->hikeDate, 'Y-m-d')){
                $hike->hikeDateError = "Le champ fin du rendez-vous (date) doit être sous ce format Y-m-d";
                $hike->error = true;
            }
                    
            if(empty($hike->start)){
                $hike->startError = "Le champ débuz du rendez-vous (temps) est obligatoire";
                $hike->error = true;
            } elseif(!validateDate($hike->start, 'H:i')){
                $hike->startError = "Le champ début du rendez-vous (heure) doit être sous ce format HH:mm";
                $hike->error = true;
            }
                    
            if(empty($hike->finish)){
                $hike->finishError = "Le champ fin du rendez-vous (temps) est obligatoire";
                $hike->error = true;
            } elseif(!validateDate($hike->finish, 'H:i')){
                $hike->finishError = "Le champ fin du rendez-vous (heure) doit être sous ce format HH:mm";
                $hike->error = true;
            }
                    
            if(!is_numeric($hike->min)){
                $hike->minError = "Le champ minimum de personne doit comporter uniquement des chiffres";
                $hike->error = true;
            } 
                    
            if(!is_numeric($hike->max)){
                $hike->maxError = "Le champ maximum de personne doit comporter uniquement des chiffres";
                $hike->error = true;
            } 
                    
            if(empty($hike->denivele)){
                $hike->deniveleError = "Le champ dénivelé est obligatoire";
                $hike->error = true;
            }elseif(!is_numeric($hike->denivele)){
                $hike->deniveleError = "Le champ dénivelé doit comporter uniquement des chiffres";
                $hike->error = true;
            } 

            if(empty($hike->difficulty)){
                $hike->difficultyError = "Le champ difficulté est obligatoire";
                $hike->error = true;
            }elseif(!is_numeric($hike->difficulty)){
                $hike->difficultyError = "Le champ difficulté doit comporter uniquement des chiffres";
                $hike->error = true;
            } 

            foreach($hike_types as $hike_type => $value){
                if($hike->type == $value->name){
                    $hike->typeId = $value->id;
                }
            }

            if(empty($hike->type)){
                $hike->typeError = "Le champ type est obligatoire";
                $hike->error = true;
            }elseif(empty($hike->typeId)){
                $hike->typeError = "Le type entré n'est pas valide";
                $hike->error = true;
            }

            foreach($users as $user => $value){
                $name_user = "{$value->firstname} {$value->lastname}";
                if($hike->user == $name_user){
                    $hike->userId = $value->id;
                }
            }
            
            if(empty($hike->user)){
                $hike->userError = "Le champ chef est obligatoire";
                $hike->error = true;
            }elseif(empty($hike->userId)){
                $hike->userError = "L'utilisateur entré n'est pas valide";
                $hike->error = true;
            }

            $validatedHike[] = $hike;

        }
        return $validatedHike;
    }
}