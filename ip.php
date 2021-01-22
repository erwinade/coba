<html>
<head>
	<title>.: Form Identitas :.</title>
</head>

<body>
<form action="proses.php" method="post" name="form1">
	<table align="center" border="1" style="width: 300px;">
<tr>
	<td colspan="3"><div align="center">
<strong>CONFIGURE IP STATIC</strong></div>
	</td>
</tr>

<tr>
	<td width="250">Static IP</td>
	<td width="5">:</td>
	<td width="980"><input name="ip" type="text" /></td>
</tr>

<tr>
        <td>Submask</td>
        <td>:</td>
        <td><input name="submask" type="text" /></td>
</tr>

<tr>
        <td>Gateway</td>
        <td>:</td>
        <td><input name="gateway" type="text" /></td>
</tr>

<tr>
	<td colspan="3"><div align="right">
	 <input name="tombol_simpan" type="submit" value="SIMPAN" />
	</div>
	</td>
</tr>

</table>
</form>
<?php
$cmd =`ifconfig`;
$posisi = strpos($cmd,"255.255.255.0");

$ip1 = substr($cmd,72,13);
$ip2 = substr($cmd,566,13);
$netmask = substr($cmd,95,13);

echo $ip1."</br>";
echo $ip2."</br>";
echo $netmask;

$set = `nano /etc/network/interfaces`;
echo "</br></br>";
echo $set;
?>
</body>
<html>
