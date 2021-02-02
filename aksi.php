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

if(isset($_POST['email'])){ //['ttambah'] merupakan name dari button di form tambah
	$Username	= $_POST['emailname'];
	$Email 		= $_POST['email_user'];
	$Smtp		= $_POST['smtp'];
	
	$sql	= $query="UPDATE email SET name='$Username', email_user='$Email', smtp='$Smtp' where id = 1";
	$query	= mysqli_query($conn,$sql);
	
	if($query){
		header('location: setting.php'); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if(isset($_POST['tele'])){ //['ttambah'] merupakan name dari button di form tambah
	$telename	= $_POST['telename'];
	$bot	= $_POST['bot'];
	
	$sql	= $query="UPDATE telegram SET name='$telename', bot_id='$bot' where id = 1";
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
