<?php

namespace App\Helpers;

use Carbon\Carbon;



class UniqueID
{

    public static function generateUniqueID()
    {
        // Get the current date and time using Carbon
        $now = Carbon::now();

        // Extract the date and time components
        $day = $now->day;
        $month = $now->month;
        $year = $now->year;
        $hour = $now->hour;
        $minute = $now->minute;
        $second = $now->second;

        // Create a unique ID using the components
        $uniqueId = "{$year}{$month}{$day}{$hour}{$minute}{$second}";

        return $uniqueId;
    }
}
