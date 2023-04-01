<?php
// src/Helper/TimeHelper.php

namespace App\Helper;

class TimeHelper
{
    public static function addTime($time1, $time2)
    {
        $time1_array = explode(':', $time1);
        $time2_array = explode(':', $time2);
    
        $hours = (int)$time1_array[0] + (int)$time2_array[0];
        $minutes = (int)$time1_array[1] + (int)$time2_array[1];
    
        $hours += floor($minutes / 60);
        $minutes = $minutes % 60;
    
        return sprintf('%02d:%02d', $hours, $minutes);
    }
}