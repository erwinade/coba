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
$mail->MsgHTML("Testing...");
if($mail->Send()) header("location:setting.php");
else echo "Failed to sending message";
?>