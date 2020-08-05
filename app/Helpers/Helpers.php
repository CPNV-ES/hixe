<?php


namespace App\Helpers;

use Carbon\Carbon;

class Helpers
{
    /**
     * Return a date formatted in relation with another: just the time if both dates are the same day, date and time otherwise
     * @param $d1
     * @param $d2
     * @return string
     */
    public static function formatRelativeDate($d1, $d2)
    {
        $date1 = Carbon::createFromFormat("Y-m-d H:i:s",$d1); // Used createFromFormat because of strange results obtained using the parse method
        $date2 = Carbon::createFromFormat("Y-m-d H:i:s",$d2);
        if ($date1->day == $date2->day) {
            return $date2->format('à H:i');
        } else {
            return "le ".$date2->format('d.M à H:i');
        }
    }
}
