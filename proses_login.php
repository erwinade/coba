<?php
session_start();
include 'conn.php';
$username = $_POST['username'];
$password = $_POST['pass'];

// $query = mysqli_query($connection,"select * from tb_user where username='$username' and password='$password'");
//
// $data = mysqli_fetch_array($query);

if ($username=="admin" && $password=="admin") {
    // kalau username dan password sudah terdaftar di database
    // buat session dengan nama username dengan isi nama user yang login
    $_SESSION['username'] =$username;

    // redirect ke halaman users [menampilkan semua users]
    header('location:dashboard.php');
} else {
    // kalau username ataupun password tidak terdaftar di database
header('location:index.php');
}
?>
