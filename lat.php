<?php
	include('./conn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="5">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Web Input</title>
</head>
<body bgcolor="#85C1E9">

<?php
$sql	= 'select * from tb_sensor';
$query	= mysqli_query($conn,$sql);
?>

<h2><strong><p align="center">Data Sensor Monitoring Sistem</p></strong></h2>

<table width="1300" border="1" cellpadding="0" cellspacing="0" align="center">
            <thead>
                <tr>
		    <td width="30" height="29" align="center" valign="middle" bgcolor="#00FFFF">No.</td>
                    <td width="50" height="29" align="center" valign="middle" bgcolor="#00FFFF">Id</td>
                    <td width="150" height="29" align="center" valign="middle" bgcolor="#00FFFF">Nama Sensor</td>
                    <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF">Protokol</td>
                    <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF">Versi</td>
                    <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF">Rocomunity</td>
                    <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF">IP Device</td>
                    <td width="160" height="29" align="center" valign="middle" bgcolor="#00FFFF">MIB Name</td>
                    <td width="90" height="29" align="center" valign="middle" bgcolor="#00FFFF">Hasil</td>
                    <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF"><a href="tambah.php">Tambah</td>
                </tr>
            </thead>
	<?php 
		while($data = mysqli_fetch_array($query))
		{
			 // $rumus = $data['protokol'] . " -" . $data['versi'] . " -c " . $data['rocomunity'] . " " . $data['ip'] . " " . $data['mib_name'];
    
		    	$protokol = $data['protokol'];
		    	$versi = $data['versi'];
		    	$recomunity = $data['rocomunity'];
		    	$ip = $data['ip'];
		    	$mib = $data['mib_name'];
		    
		    	//$rumus1 =exec("$protokol -m $versi -t3 -a $recomunity -r $mib -c 1 -1 $ip",$output);
                        $rumus1 = exec("modpoll -m enc -t3 -a 7 -r 2 -c 1 -1 192.168.0.203",$output);
				//$rumus1 = exec("'" . $rumus . "'");
				
				//print_r($output);
		    
			$hasil = $output[10];
			$posisi = strpos($rumus1,": ");
			$posisi = intval($posisi+2);
			$snmp = substr($hasil,-3)/10; //,$posisi,strlen($rumus1));
	?>
            	<tr>
		    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['id']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['id_sensor']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['name_sensor']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['protokol']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['versi']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['rocomunity']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['ip']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['mib_name']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $snmp; ?></td>
		    <td p align="center" bgcolor="#FFFFFF">
		        <a href="edit.php?ni=<?php echo $data['nis'];?>" title="Edit siswa ini"> || edit || </a>
			<a href="delete.php?ni=<?php echo $data['nis'];?>" onclick="return confirm('Yakin mau di hapus?');">|| hapus ||</a></td>
            	</tr>
<?php  } ?>
</table>

</body>
</html>