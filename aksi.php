<?php
include('conn.php');
if(isset($_POST['pswd'])){ //['ttambah'] merupakan name dari button di form tambah
	$Username	= $_POST['username'];
	$Password	= $_POST['pass'];
	
	$sql	= $query="UPDATE user SET username='$Username',passwrd='$Password' where id = 1";
	$query	= mysqli_query($conn,$sql);
	
	if($query){
		header('location: setting.php'); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if(isset($_POST['dvc'])){ //['ttambah'] merupakan name dari button di form tambah
	$device	= $_POST['device'];
	
	$sql	= $query="UPDATE device SET unit='$device' where id = 1";
	$query	= mysqli_query($conn,$sql);
	
	if($query){
		header('location: setting.php'); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
$conn->close();

	
?>
