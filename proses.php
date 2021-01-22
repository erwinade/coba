<?php
$ip = $_POST['ip'];
$submask = $_POST['submask'];
$gateway = $_POST['gateway'];

echo "
<table width=400 border=1 align=center>
<tr>
 <td colspan=3 align=center> .: Static IP :.</td>
</tr>

<tr>
 <td>IP</td>
 <td>:</td>
 <td>".$ip."</td>
</tr>

<tr>
 <td>Submask</td>
 <td>:</td>
 <td>".$submask."</td>
</tr>

<tr>
 <td>Gateway</td>
 <td>:</td>
 <td>".$gateway."</td>
</tr>
</table>";
?>
