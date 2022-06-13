<?php

namespace App\Helper;

class DateTimeHelper
{
    // Find a randomDate between $start_date and $end_date
    public static function randomDateTillNow($start_date): string
    {
        // Convert to timetamps
        $min = strtotime($start_date);
        $max = strtotime( date('Y-m-d') );

        // Generate random number using above bounds
        $val = rand($min, $max);

        // Convert back to desired date format
        return date('Y-m-d', $val);
    }
}