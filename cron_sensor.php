<?php
include('conn.php');
$sql	= 'select * from modbus';
$query	= mysqli_query($conn,$sql);

while($data = mysqli_fetch_array($query))
	{
		$fungsi = $data['fungsi'];
		$alamt = $data['alamt'];
		$register = $data['register'];
		$ip = $data['ip'];
		$jumlah = $data['jumlah'];


		$temp = exec("/var/www/html/modpoll/linux_arm-eabihf/modpoll -b 9600 -p none -m rtu -$fungsi -a $alamt -r $register -c $jumlah -1 $ip",$output);
		$sens_temp = substr($output[10],5,4);
		$sens_temp = (floatval($sens_temp/10));
		echo $sens_temp;
		echo "<br>";

		$hum = exec("/var/www/html/modpoll/linux_arm-eabihf/modpoll -b 9600 -p none -m rtu -$fungsi -a $alamt -r 3 -c $jumlah -1 $ip",$output1);
		$sens_hum = substr($output1[10],5,4);
		$sens_hum = (floatval($sens_hum/10));
		echo $sens_hum;
		echo "<br>";
	}
?>
