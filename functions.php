<?php

require_once 'config/connexion.php';

//Dates Relatives
function time2str($date_to_convert)
{
    if(!ctype_digit($date_to_convert))
        $date_to_convert = strtotime($date_to_convert);

    $diff = time() - $date_to_convert;
    if($diff == 0)
        return 'now';
    elseif($diff > 0)
    {
        $day_diff = floor($diff / 86400);
        if($day_diff == 0)
        {
            if($diff < 60) return 'Maintenant';
            if($diff < 120) return 'Il y a 1 minute';
            if($diff < 3600) return 'Il y a ' . floor($diff / 60) . ' minutes';
            if($diff < 7200) return 'Il y a 1 heure';
            if($diff < 86400) return 'Il y a ' . floor($diff / 3600) . ' heures';
        }
        if($day_diff == 1) return 'Hier';
        if($day_diff < 7) return 'Il y a ' . $day_diff . ' jours';
        if($day_diff < 31) return 'Il y a ' . ceil($day_diff / 7) . ' semaines';
        if($day_diff < 60) return 'Le mois passé';
        return date('F Y', $date_to_convert);
    }
    else
    {
        $diff = abs($diff);
        $day_diff = floor($diff / 86400);
        if($day_diff == 0)
        {
            if($diff < 120) return 'Dans une minute';
            if($diff < 3600) return 'Dans ' . floor($diff / 60) . ' minutes';
            if($diff < 7200) return 'Dans une heure';
            if($diff < 86400) return 'Dans ' . floor($diff / 3600) . ' heures';
        }
        if($day_diff == 1) return 'Demain';
        if($day_diff < 4) return date('l', $date_to_convert);
        if($day_diff < 7 + (7 - date('w'))) return 'la semaine prochaine';
        if(ceil($day_diff / 7) < 4) return 'in ' . ceil($day_diff / 7) . ' semaines';
        if(date('n', $date_to_convert) == date('n') + 1) return 'le mois prochain';
        return date('F Y', $date_to_convert);
    }
}


