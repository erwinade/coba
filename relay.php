<?php
include 'conn.php';

$id_rly1=23;
$id_rly2=24;
$id_rly3=25;
$id_rly4=26;

if (isset($_POST['relay1on']))
{
    system(" gpio mode 25 out ") ; 
    system(" gpio write 25 1") ; 
    $relay1=1;
    $sql1 = "UPDATE sensor SET sens_value='$relay1' WHERE id='$id_rly1'";
    if ($conn->query($sql1) === TRUE) {
        header('location: detail.php');
      } else {
        echo "Error updating record: " . $conn->error;
      }
    //echo "on";
}
else if (isset($_POST['relay1off']))
{
    system(" gpio mode 25 out ") ; 
    system(" gpio write 25 0") ; 
    $relay1=0;
    $sql1 = "UPDATE sensor SET sens_value='$relay1' WHERE id='$id_rly1'";
    if ($conn->query($sql1) === TRUE) {
        header('location: detail.php');
      } else {
        echo "Error updating record: " . $conn->error;
      }
    //echo "off";
}
if (isset($_POST['relay2on']))
{
    system(" gpio mode 8 out ") ; 
    system(" gpio write 8 1") ; 
    $relay2=1;
    $sql2 = "UPDATE sensor SET sens_value='$relay2' WHERE id='$id_rly2'";
    if ($conn->query($sql2) === TRUE) {
        header('location: detail.php');
      } else {
        echo "Error updating record: " . $conn->error;
      }
    //echo "on";
}
else if (isset($_POST['relay2off']))
{
    system(" gpio mode 8 out ") ; 
    system(" gpio write 8 0") ; 
    $relay2=0;
    $sql2 = "UPDATE sensor SET sens_value='$relay2' WHERE id='$id_rly2'";
    if ($conn->query($sql2) === TRUE) {
        header('location: detail.php');
      } else {
        echo "Error updating record: " . $conn->error;
      }
    //echo "off";
}
if (isset($_POST['relay3on']))
{
    system(" gpio mode 7 out ") ; 
    system(" gpio write 7 1") ; 
    $relay3=1;
    $sql3 = "UPDATE sensor SET sens_value='$relay3' WHERE id='$id_rly3'";
    if ($conn->query($sql3) === TRUE) {
        header('location: detail.php');
      } else {
        echo "Error updating record: " . $conn->error;
      }
    //echo "on";
}
else if (isset($_POST['relay3off']))
{
    system(" gpio mode 7 out ") ; 
    system(" gpio write 7 0") ; 
    $relay3 = 0 ;
    $sql3 = "UPDATE sensor SET sens_value='$relay3' WHERE id='$id_rly3'";
    if ($conn->query($sql3) === TRUE) {
        header('location: detail.php');
      } else {
        echo "Error updating record: " . $conn->error;
      }
    //echo "off";
}
if (isset($_POST['relay4on']))
{
    system(" gpio mode 1 out ") ; 
    system(" gpio write 1 1") ; 
    $relay4=1;
    $sql4 = "UPDATE sensor SET sens_value='$relay4' WHERE id='$id_rly4'";
    if ($conn->query($sql4) === TRUE) {
        header('location: detail.php');
      } else {
        echo "Error updating record: " . $conn->error;
      }
    //echo "on";
}
else if (isset($_POST['relay4off']))
{
    system(" gpio mode 1 out ") ; 
    system(" gpio write 1 0") ; 
    $relay4=0;
    $sql4 = "UPDATE sensor SET sens_value='$relay4' WHERE id='$id_rly4'";
    if ($conn->query($sql4) === TRUE) {
        header('location: detail.php');
      } else {
        echo "Error updating record: " . $conn->error;
      }
    //echo "off";
}

/*$relay1 = system("gpio read 25");
$relay2 = system("gpio read 8");
$relay3 = system("gpio read 7");
$relay4 = system("gpio read 1");*/
//echo "relay 1="; echo $relay1;
//echo "relay 2="; echo $relay2;
//echo "relay 3="; echo $relay3;
//echo "relay 4="; echo $relay4;

//$sql1 = "UPDATE sensor SET sens_value='$relay1' WHERE id='$id_rly1'";


//$sql4 = "UPDATE sensor SET sens_value='$relay4' WHERE id='$id_rly4'";

$conn->close();
?>