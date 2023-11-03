<?php

function takeusers()
{
    if (getenv('HTTP_CLIENT_IP'))               $ipaddress1 = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))    $ipaddress1 = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))        $ipaddress1 = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))      $ipaddress1 = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))          $ipaddress1 = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))             $ipaddress1 = getenv('REMOTE_ADDR');
    else                                        $ipaddress1 = 'IP1 tidak dikenali';



    if (isset($_SERVER['HTTP_CLIENT_IP']))              $ipaddress2 = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))   $ipaddress2 = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))       $ipaddress2 = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))     $ipaddress2 = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))         $ipaddress2 = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))            $ipaddress2 = $_SERVER['REMOTE_ADDR'];
    else                                                $ipaddress2 = 'IP2 tidak dikenali';



    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))        $browser = 'Netscape';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))    $browser = 'Firefox';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))     $browser = 'Chrome';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))      $browser = 'Opera';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))       $browser = 'Internet Explorer';
    else                                                        $browser = 'Other';


    return $ipaddress1 . '*|*' . $ipaddress2 . '*|*' . $browser;
}
