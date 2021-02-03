<?php
include "classes/class.phpmailer.php";
include './conn.php';

$sql	= 'select * from email where id = "1"';
$query	= mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($query))
{
    $email_name = $row['email_name'];
    $email_user = $row['email_user'];
    $pswd = $row['password'];
    $smtp = $row['smtp'];
}
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl'; 
$mail->Host = $smtp; //host masing2 provider email
$mail->SMTPDebug = 2;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = $email_user; //user email
$mail->Password = $pswd; //password email 
$mail->SetFrom($email_user,"Kepala Utama"); //set email pengirim
$mail->Subject = "Alert MONSiS-8 THD"; //subyek email
$mail->AddAddress("soendev@gmail.com","nama email tujuan");  //tujuan email
$mail->MsgHTML("Testing...");
if($mail->Send()) echo "Message has been sent";
else echo "Failed to sending message";
?>