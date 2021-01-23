<?php
session_start();
include 'conn.php';
$username = $_POST['username'];
$password = $_POST['pass'];


$sql	= 'select * from user';
$query	= mysqli_query($conn,$sql);
while($data = mysqli_fetch_array($query))
{
    $user = $data['username'];
    $passwd = $data['passwrd'];


    if ($username==$user && $password==$passwd) {
        // kalau username dan password sudah terdaftar di database
        // buat session dengan nama username dengan isi nama user yang login
        $_SESSION['username'] =$username;

        // redirect ke halaman users [menampilkan semua users]
        header('location:dashboard.php');
    } else {
        // kalau username ataupun password tidak terdaftar di database
    header('location:index.php');
    }
}
?>
