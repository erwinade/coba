<?php
//header("Refresh:5");
include 'conn.php';
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
$serial->sendMessage("relay");
$serial->deviceClose();
$relay = (explode(",",$theResult));

$relay1 =  floatval($relay[0]);
$sql = "UPDATE sensor SET sens_value='$relay1' WHERE id=17";
  if ($conn->query($sql) === TRUE) {
    //echo "Berhasil Mengupdate Status Sensor </br>";
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
$relay2 =  floatval($relay[1]);
$sql = "UPDATE sensor SET sens_value='$relay2' WHERE id=18";
if ($conn->query($sql) === TRUE) {
	//echo "Berhasil Mengupdate Status Sensor </br>";
} else {
	echo "Error updating record: " . $conn->error;
}

$relay3 =  floatval($relay[2]);
$sql = "UPDATE sensor SET sens_value='$relay3' WHERE id=19";
  if ($conn->query($sql) === TRUE) {
    //echo "Berhasil Mengupdate Status Sensor </br>";
  } else {
    echo "Error updating record: " . $conn->error;
  }

$relay4 =  floatval($relay[3]);
$sql = "UPDATE sensor SET sens_value='$relay4' WHERE id=20";
if ($conn->query($sql) === TRUE) {
	//echo "Berhasil Mengupdate Status Sensor </br>";
} else {
	echo "Error updating record: " . $conn->error;
}

$relay5 =  floatval($relay[4]);
$sql = "UPDATE sensor SET sens_value='$relay5' WHERE id=21";
  if ($conn->query($sql) === TRUE) {
    //echo "Berhasil Mengupdate Status Sensor </br>";
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
$relay6 =  floatval($relay[5]);
$sql6 = "UPDATE sensor SET sens_value='$relay6' WHERE id=22";
if ($conn->query($sql6) === TRUE) {
	//echo "Berhasil Mengupdate Status Sensor </br>";
} else {
	echo "Error updating record: " . $conn->error;
}
$conn->close();
?>