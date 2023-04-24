<?php

//funcion para cambiar formato hora
function format_time($time) {
    //Separamos por los dos puntos y creamos un array
    if($time){
        $time_array = explode(':', $time);
        $times = intval($time_array[0]);
        $minuts = intval($time_array[1]);

        $final_time = '';

        if ($times > 0) {
            $final_time .= $times . 'h';
        }

        if ($minuts > 0) {
            $final_time .= ' ' . $minuts . 'm';
        }

        if ($final_time == '') {
            $final_time = '0h';
        }

        return $final_time;
    }else{
        return '';
    }
    
}
//Funcnion para mostrar hora y fecha
function format_date_time($date_hour) {
    if($date_hour){    
        $date_hour_array = explode(' ', $date_hour);
        $date = $date_hour_array[0];
        $hour = $date_hour_array[1];

        $date_array = explode('-', $date);
        $year = $date_array[0];
        $month = $date_array[1];
        $day = $date_array[2];

        $hour_array = explode(':', $hour);
        $hours = $hour_array[0];
        $minuts = $hour_array[1];

        $final_hours = $hours . ':' . $minuts;
        $final_date = $day . '/' . $month . '/' . $year;

        return $final_hours . ' ' . $final_date;
    }else{
        return '';
    }
}


?>


