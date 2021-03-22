<?php

namespace App;


class HikeCSV
{
    static function loadHike($file)
    {
        if (($handle = fopen($file, 'r')) !== FALSE){
            $arrayFromCSV = [];

            while (($datas = fgetcsv($handle, 1000, ';')) !== FALSE) {
                $arrayFromCSV[] = $datas;
            }
            fclose($handle);
        }
        return $arrayFromCSV;
    }

    //changer le nom de $arrayFromCSV
    //envoyer $hikes dans la view
    //créer la function IsValidate
    //La mettre en place dans la view et dans le controller

    public function isValidate()
    {
        //code pour valider les différente ligne
    }
}
