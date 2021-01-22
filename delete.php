<?php
include('config/konek.php');
$ni	= $_GET['ni'];

$sql 	= 'delete from siswa where nis="'.$ni.'"';
$query	= mysqli_query($db_link,$sql);
header('location: siswa.php');
?>
