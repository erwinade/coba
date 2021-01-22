<?php
include('./conn.php');
if(isset($_POST['ttambah'])){ //['ttambah'] merupakan name dari button di form tambah
	$id_sensor	= $_POST['id_sensor'];
	$name_sensor	= $_POST['name_sensor'];
	$protokol	= $_POST['protokol'];
	$versi		= $_POST['versi'];
	$rocomunity	= $_POST['rocomunity'];
	$ip		= $_POST['ip'];
	$mib_name	= $_POST['mib_name'];
	
	$sql	= "INSERT INTO tb_sensor ".
		  "(id_sensor,name_sensor,protokol,versi,rocomunity,ip,mib_name) VALUES ".
		  "('$id_sensor','$name_sensor','$protokol','$versi','$rocomunity','$ip','$mib_name')";
	$query	= mysqli_query($conn,$sql);
	
	if($query){
		header('location: index.php'); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
$conn->close();

	
?>
