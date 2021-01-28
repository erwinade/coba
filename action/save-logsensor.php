<?php

include "../conn.php";

if(!isset($_GET['id_sens'])){
    echo "EROR, SIlahkan Input ID Sensor";
    return;
}

$sens_value = $_GET['sens_value'];
$id_sens = $_GET['id_sens'];


$sql	= "select * from sensor where id='$id_sens'";
$query	= mysqli_query($conn,$sql);
while($data = mysqli_fetch_array($query))
{
    $threshold_min = $data['threshold_min'];
    $threshold_max = $data['threshold_max'];
    $sens_name = $data['sens_name'];
    $sens_type = $data['sens_type'];

    echo $threshold_min;
    echo $threshold_max;
    echo "<br>";

    if($sens_value <= $threshold_max && $sens_value >= $threshold_min)
    {
      $status_sensor="Normal";
      echo $status_sensor;
    }

    if($sens_value >= $threshold_max || $sens_value <= $threshold_min)
    {
      $status_sensor="Alarm";
      echo "<br>";
      echo $status_sensor;
      $sql = "INSERT INTO alarm_logs (id_sens, sens_name, sens_value, sens_type, status_sensor)
      VALUES ('$id_sens', '$sens_name', '$sens_value', '$sens_type', '$status_sensor')";

      if ($conn->query($sql) === TRUE) {
        echo "Berhasil Menambah Alarm Log\n";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
}
echo "<br>";


  // update sensor table by id 

  $sql = "UPDATE sensor SET sens_value=$sens_value, sens_type='$sens_type' WHERE id=$id_sens";

  if ($conn->query($sql) === TRUE) {
    echo "Berhasil Mengupdate Sensor </br>";
  } else {
    echo "Error updating record: " . $conn->error;
  }



  //add sensor to sensor_log table

  $sql = "INSERT INTO sensor_log (id_sens, sens_value, sens_type)
  VALUES ($id_sens, $sens_value, '$sens_type')";

  if ($conn->query($sql) === TRUE) {
    echo "Berhasil Menambah sensor </br>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }


  /////////////////////////////////////////////////////
  $sql = "UPDATE sensor SET status_sensor='$status_sensor' WHERE id=$id_sens";

  if ($conn->query($sql) === TRUE) {
    echo "Berhasil Mengupdate Status Sensor </br>";
  } else {
    echo "Error updating record: " . $conn->error;
  }

$conn->close();