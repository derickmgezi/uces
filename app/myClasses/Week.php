<?php

class Week {
    public static function findCurrentWeek($date){
        $current_year       = date('Y');
        $year_initiation    = date('Y',strtotime($date));
        
        $current_week    = date("W");
        $initiated_on    = date('W',strtotime($date));
        
        $week_difference = 0;
        if($year_initiation == $current_year){
            $week_difference = ($current_week - $initiated_on)+1;
        }else{
            $week_difference = (52-$initiated_on)+$current_week;
        }
          
        if($week_difference > 16){
            return 16;
        }else{
            return $week_difference;
        }
    }
}