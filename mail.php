<?php
include "classes/class.phpmailer.php";
include './conn.php';
include 'config/db.php';
date_default_timezone_set('Asia/Jakarta');
$wktu = date('Y-m-d  H:i:s');

// instance class db 
$db_conn = new db();

// ambil data konfigurasi email 
$emailConf = $db_conn->query('SELECT *FROM email WHERE id = 1')->fetchArray();

$email_name = $emailConf['email_name'];
$email_user = $emailConf['email_user'];
$email_to = $emailConf['email_to'];
$pswd = $emailConf['password'];
$smtp = $emailConf['smtp'];
$port = $emailConf['port'];
$smtps = $emailConf['smtps'];


// ambil sensor normal tapi send_at is not null 
$normalSensor = $db_conn->query('SELECT *FROM sensor WHERE status_sensor = "Normal" AND send_at IS NOT NULL');

// cek jika ada sensor normal tapi send_at is not null 
if($normalSensor->numRows() > 0){
    $updateSensorNormal = $db_conn->query('UPDATE  sensor SET send_at = NULL WHERE status_sensor = "Normal" AND send_at IS NOT NULL');
}

// ambil alarm sensor yg lebih dari 30 menit atau send_at null (alarm baru)
$alarmSensor = $db_conn->query("SELECT * FROM sensor s WHERE (TIMESTAMPDIFF(MINUTE,s.send_at,NOW()) > 30 AND status_sensor = 'Alarm') OR (s.status_sensor = 'Alarm' AND s.send_at IS NULL) ");

// cek jika ada alarm sensor
if($alarmSensor->numRows() > 0){

    // ambil semua sensor yg alarm 
    $alarmSensorAll = $db_conn->query("SELECT * FROM sensor WHERE status_sensor = 'Alarm'");
    $msg = "";

    // looping semua alarm sensor 
    foreach ($alarmSensorAll->fetchAll() as $alarm) {
        $msg .= "Description: " . $alarm["sens_name"] . " - Type Sensor: " . $alarm["sens_type"]. " - Value: " . $alarm["sens_value"] . " - Timestamp: " .$alarm["update_at"]."<br>";
    }

    $mail = new PHPMailer; 
    $mail->IsSMTP();
    $mail->SMTPSecure = $smtps; 
    $mail->Host = $smtp; //host masing2 provider email
    $mail->SMTPDebug = 2;
    $mail->Port = $port;
    $mail->SMTPAuth = true;
    $mail->Username = $email_user; //user email
    $mail->Password = $pswd; //password email 
    $mail->SetFrom($email_user,"Head of IT Engginer"); //set email pengirim
    $mail->Subject = "Alert MONSiS-8 THD"; //subyek email
    $mail->AddAddress($email_to,"Admin MONSiS-8THD");  //tujuan email
    $mail->MsgHTML($msg);
    if($mail->Send()) 
    {
        // update tanggal kirim sensor 
        $updateSensorAlarm = $db_conn->query('UPDATE  sensor SET send_at = "'.$wktu.'" WHERE status_sensor = "Alarm"');
    }
    else echo "Failed to sending message";

}





// $sql	= 'SELECT *FROM email WHERE id = "1"';
// $query	= mysqli_query($conn,$sql);
// while($row = mysqli_fetch_array($query))
// {
//     $email_name = $row['email_name'];
//     $email_user = $row['email_user'];
//     $email_to = $row['email_to'];
//     $pswd = $row['password'];
//     $smtp = $row['smtp'];
//     $port = $row['port'];
//     $smtps = $row['smtps'];
// }
// $sql	= 'SELECT *FROM sensor WHERE status_sensor = "Alarm"';
// $result	= mysqli_query($conn,$sql);
// $msg = "";
// if (mysqli_num_rows($result) > 0) {
//     // append data of each row to $msg.
//     while($row = mysqli_fetch_assoc($result)) {
//         $msg .= "Description: " . $row["sens_name"] . " - Type Sensor: " . $row["sens_type"]. " - Value: " . $row["sens_value"] . " - Timestamp: " .$row["update_at"]."<br>";
//         $id = $row["id"];
//         $send_at = strtotime($row["send_at"]);
//         $wktu_at = strtotime($wktu);
//         $timekeep = $wktu_at - $send_at;
//         echo $timekeep."<br>";
//         echo $send_at;

//     }
//     if ( $timekeep > 1801 )
//     {
//         $mail = new PHPMailer; 
//         $mail->IsSMTP();
//         $mail->SMTPSecure = $smtps; 
//         $mail->Host = $smtp; //host masing2 provider email
//         $mail->SMTPDebug = 2;
//         $mail->Port = $port;
//         $mail->SMTPAuth = true;
//         $mail->Username = $email_user; //user email
//         $mail->Password = $pswd; //password email 
//         $mail->SetFrom($email_user,"Head of IT Engginer"); //set email pengirim
//         $mail->Subject = "Alert MONSiS-8 THD"; //subyek email
//         $mail->AddAddress($email_to,"Admin MONSiS-8THD");  //tujuan email
//         $mail->MsgHTML($msg);
//         if($mail->Send()) 
//         {
//             //echo "<br>". $wktu."<br>";
//             //echo $id;
//             $sql = "UPDATE sensor SET send_at='$wktu' WHERE id='$id'";
//             if ($conn->query($sql) === TRUE) {
//                 //echo "Berhasil Mengupdate Status Sensor </br>";
//             } else {
//                 echo "Error updating record: " . $conn->error;
//             }
//             header("location:setting.php");
//         }
//         else echo "Failed to sending message";
//     }
// }
// else{
//     $sql1 = "UPDATE sensor SET send_at=Null WHERE status_sensor = 'Normal'";
//     if ($conn->query($sql1) === TRUE) {
//         //echo "Berhasil Mengupdate Status Sensor </br>";
//     } else {
//         echo "Error updating record: " . $conn->error;
//     }
//     header('location:setting.php');
// }


?>