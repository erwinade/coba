<?php

include "../conn.php";

if(!isset($_GET['id_sensor'])){
    echo "EROR, SIlahkan Input ID Sensor";
    return;
}

$val = $_GET['value'];
$sensor_status = $_GET['status_sensor'];
$id_sensor = $_GET['id_sensor'];

// update sensor table by id 

$sql = "UPDATE sensor SET value=$val, status_sensor='$sensor_status' WHERE id=$id_sensor";

if ($conn->query($sql) === TRUE) {
  echo "Berhasil Mengupdate Sensor </br>";
} else {
  echo "Error updating record: " . $conn->error;
}



//add sensor to sensor_log table

$sql = "INSERT INTO sensor_log (sensor_id, value, status_sensor)
VALUES ($id_sensor, $val, '$sensor_status')";

if ($conn->query($sql) === TRUE) {
  echo "Berhasil Menambah sensor log\n";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();