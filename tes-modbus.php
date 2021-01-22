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
<body>
<?php

$sql	= 'select * from tb_modbus';
$query	= mysqli_query($conn,$sql);

while($data = mysqli_fetch_array($query))
	{
		$fungsi = $data['fungsi'];
		$alamt = $data['alamt'];
		$register = $data['register'];
		$ip = $data['ip'];
		$jumlah = $data['jumlah'];

	 	$tarik = exec("/var/www/html/modpoll/linux_arm-eabihf/modpoll -m enc -$fungsi -a $alamt -r $register -c $jumlah -1 192.168.0.203",$output1);
				//$b = exec("/var/www/html/modpoll/linux_arm-eabihf/modpoll -m enc -t3 -a 7 -r 3 -c 1 -1 192.168.0.203",$output2);
				//$c = exec("/var/www/html/modpoll/linux_arm-eabihf/modpoll -b 9600 -p none -m rtu -t3 -a 8 -r 2 -c 1 -1 /dev/ttyUSB0",$output3);

		$md = (substr($output1[10],5,3));
		$md = (floatval($md))/10;

	if( $md=="0")
	{
		$md = "20";
	}

	$sql    = "INSERT INTO tb_modbus ".
                  "SET output = $md ".
                  "where id_sensor = 1";
        $query  = mysqli_query($conn,$sql);
}
?>
</body>
</html>
