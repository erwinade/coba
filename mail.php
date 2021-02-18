<?php
include "classes/class.phpmailer.php";
include './conn.php';

$sql	= 'select * from email where id = "1"';
$query	= mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($query))
{
    $email_name = $row['email_name'];
    $email_user = $row['email_user'];
    $email_to = $row['email_to'];
    $pswd = $row['password'];
    $smtp = $row['smtp'];
    $port = $row['port'];
    $smtps = $row['smtps'];
}
$sql	= 'SELECT *FROM alarm_logs ';
$result	= mysqli_query($conn,$sql);
$msg = "";
if (mysqli_num_rows($result) > 0) {
    // append data of each row to $msg.
    while($row = mysqli_fetch_assoc($result)) {
        $msg .= "Description: " . $row["sens_name"]. " - Type Sensor: " . $row["sens_type"]. " - Value: " . $row["sens_value"] . " - Timestamp: " .$row["created_at"]."<br>";

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
        if($mail->Send()) header("location:setting.php");
        else echo "Failed to sending message";
    }
}


?>