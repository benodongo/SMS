<?php
/**
 * Created by PhpStorm.
 * User: benson
 * Date: 5/4/2018
 * Time: 5:31 AM
 */


$message=$_POST['message'];
$to=$_POST['to'];


$newmsg=str_replace(" ", "%20", $message);

$smsurl = "http://sms.celcomafrica.com/sendsms.jsp?user=demoaccount&password=demo18&mobiles=".$to."&sms=".$newmsg;
urlencode($smsurl);
$returned=URLopen($smsurl);



function URLopen($url)
{
    // Fake the browser type
    ini_set('user_agent','MSIE 4\.0b2;');

    $dh = fopen("$url",'r');
    $result = fread($dh,8192);
    return $result;
    fclose($dh);


}

//API

//cc6a4455f417ef7e6b1f2c46c8657f27ac7814ae544b6abacc2c90333f46d308
