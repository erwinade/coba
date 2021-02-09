<?php
//header("Refresh:5");
include 'PhpSerial.php';

function microtime_float()
 {
     list($usec, $sec) = explode(" ", microtime());
     return ((float) $usec + (float) $sec);
 }
$serial = new PhpSerial;
$serial->deviceSet("/dev/cu.wchusbserial1420");
$serial->confBaudRate(9600);
$serial->confParity("none");
$serial->confCharacterLength(8);
$serial->confStopBits(1);
$serial->confFlowControl("none");

// Then we need to open it
$serial->deviceOpen();

$read = '';
$theResult ='';
$start = microtime_float();

 while ( ($read == '') && (microtime_float() <= $start + 0.5) ) {
     $read = $serial->readPort(); //ini unutk baca data masuk
     if ($read != '') {
         $theResult .= $read;
         $read = '';
     }
 }

// To write into
$serial->sendMessage("relay");
$serial->deviceClose();
$relay = (explode(",",$theResult));
echo $relay[0];
echo "<br>";
echo $relay[1];
echo "<br>";
echo $relay[2];
echo "<br>";
echo $relay[3];
echo "<br>";
echo $relay[4];
echo "<br>";
echo $relay[5];
echo "<br>";