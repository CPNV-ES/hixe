<?php

namespace App;

use DateTime;

class HikeCSV
{
    static function loadHike($file)
    {
        if (($handle = fopen($file, 'r')) !== FALSE){
            $arrayHikes = [];

            //|| ";"
            while (($datas = fgetcsv($handle, 1000, ',' )) !== FALSE) {
                $arrayHikes[] = $datas;
            }
            fclose($handle);
        }
        return $arrayHikes;
    }

    //créer la function dateIsValid
    //La mettre en place dans la view et dans le controller if it's == background greeen else != red 
    // mettre sous regex la condition de séparation
    // voir comment faire un bon flash msg

    public function dateIsValid($date, $format = 'Y-m-d')
    {
        $dt = DateTime::createFromFormat($format, $date);
        return $dt && $dt->format($format) === $date;
    }
}
