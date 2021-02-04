<?php
	include('../conn.php');
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
$sql	= 'select * from snmp';
$query	= mysqli_query($conn,$sql);
?>

<h2><strong><p align="center">Data Sensor Monitoring Sistem</p></strong></h2>

<table width="1300" border="1" cellpadding="0" cellspacing="0" align="center">
            <thead>
                <tr>
		    <td width="30" height="29" align="center" valign="middle" bgcolor="#00FFFF">No.</td>
                    <td width="50" height="29" align="center" valign="middle" bgcolor="#00FFFF">Id</td>
                    <td width="150" height="29" align="center" valign="middle" bgcolor="#00FFFF">Nama Sensor</td>
		    <td width="160" height="29" align="center" valign="middle" bgcolor="#00FFFF">Function</td>
                    <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF">Address</td>
                    <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF">Register</td>
                    <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF">Offset</td>
                    <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF">IP Device</td>
                    <td width="90" height="29" align="center" valign="middle" bgcolor="#00FFFF">Hasil</td>
                    <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF"><a href="tambah_modbus.php">Tambah</td>
                </tr>
            </thead>
	<?php 
		while($data = mysqli_fetch_array($query))
		{
			$fungsi = $data['fungsi'];
			$alamt = $data['alamt'];
			$register = $data['register'];
			$ip = $data['ip'];
			$jumlah = $data['jumlah'];

			 	$tarik = exec("/var/www/html/modpoll/linux_arm-eabihf/modpoll -m enc -$fungsi -a $alamt -r $register -c $jumlah -1 192.168.0.203",$output1);

				$md = (substr($output1[10],5,3))/10;
	?>
            	<tr>
		    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['id']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['id_sensor']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['name_sensor']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['fungsi']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['alamt']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['register']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['jumlah']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['ip']; ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $md; ?></td>
		    <td p align="center" bgcolor="#FFFFFF">
		        <a href="edit.php?ni=<?php echo $data['nis'];?>" title="Edit siswa ini"> || edit || </a>
			<a href="delete.php?ni=<?php echo $data['nis'];?>" onclick="return confirm('Yakin mau di hapus?');">|| hapus ||</a></td>
            	</tr>
<?php  } ?>
</table>

</body>
</html>
