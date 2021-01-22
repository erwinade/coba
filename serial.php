<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors','1');
include 'PhpSerial.php';
$data=$_GET["data"];
 function microtime_float()
 {
     list($usec, $sec) = explode(" ", microtime());
     return ((float) $usec + (float) $sec);
 }
$serial = new PhpSerial;
$serial->deviceSet("/dev/ttyAMA0");
$serial->confBaudRate(38400);
$serial->confParity("none");
$serial->confCharacterLength(8);
$serial->confStopBits(1);
$serial->confFlowControl("none");
$serial->deviceOpen();
// //kirim data ke arduino
$serial->sendMessage("@".$data."#");
$read = '';
$theResult ='';
$start = microtime_float();

 while ( ($read == '') && (microtime_float() <= $start + 0.5) ) {
     $read = $serial->readPort();
     if ($read != '') {
         $theResult .= $read;
         $read = '';
     }
 }
$serial->deviceClose();
	if($theResult!=''){
		if($data=="L1N")
			$_SESSION['ok']="Setting Lampu 1 ON Success";
		else if($data=="L2N")
			$_SESSION['ok']="Setting Lampu 2 ON Success";
		else if($data=="L1F")
			$_SESSION['ok']="Setting Lampu 1 OFF Success";
		else if($data=="L2F")
			$_SESSION['ok']="Setting Lampu 2 OFF Success";
			}
	else{
		if($data=="L1N")
			$_SESSION['error']="Setting Lampu 1 ON Fail";
		else if($data=="L2N")
			$_SESSION['error']="Setting Lampu 2 ON Fail";
		else if($data=="L1F")
			$_SESSION['error']="Setting Lampu 1 OFF Fail";
		else if($data=="L2F")
			$_SESSION['error']="Setting Lampu 2 OFF Fail";
			}
echo $theResult;
?>