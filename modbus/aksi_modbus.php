<?php
include('./conn.php');
if(isset($_POST['tambahmodbus'])){ //['ttambah'] merupakan name dari button di form tambah
	$id_sensor	    = $_POST['id_sensor'];
	$name_sensor	= $_POST['name_sensor'];
	$fungsi	        = $_POST['fungsi'];
	$alamt		    = $_POST['alamt'];
	$register	    = $_POST['register'];
	$jumlah		    = $_POST['jumlah'];
    $ip	            = $_POST['ip'];
    
    // echo $id_sensor;
    // echo "</br>";
    // echo $name_sensor;
    // echo "</br>";
    // echo $fungsi;
    // echo "</br>";
    // echo $alamt;
    // echo "</br>";
    // echo $register;
    // echo "</br>";
    // echo $jumlah;
    // echo "</br>";
    // echo $ip;
    // echo "</br>";echo "</br>";
	
	$sql	= "INSERT INTO tb_modbus (id_sensor,name_sensor,fungsi,alamt,register,jumlah,ip) VALUES ('$id_sensor','$name_sensor','$fungsi','$alamt','$register','$jumlah','$ip')";
    $query	= mysqli_query($conn,$sql);
    
	if($query){
        header('location: modbus.php'); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
$conn->close();
?>
