<?php

namespace App;

use DateTime;
use Illuminate\Support\Facades\Validator;

class HikeCSV
{
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
            //|| ","
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

    // mettre sous regex la condition de séparation
    // faire une validation
    // view si valeur null mettre red sinon green
    // voir comment faire un bon flash msg avec matthieu
}