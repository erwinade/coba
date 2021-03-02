<!DOCTYPE html>
<html>
<head>
<link rel="dns-prefetch" href="//fonts.googleapis.com" />
<link rel="dns-prefetch" href="//fonts.gstatic.com" />
<link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Open Sans:400,500,600,700&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans:400,500,600,700&display=swap" media="print" onload="this.media='all'">
</head>
<body data-rsssl=1>
	<style type="text/css"> body{ font-family: sans-serif; } table{ margin: 20px auto; border-collapse: collapse; } table th, table td{ border: 1px solid #3c3c3c; padding: 3px 8px; } a{ background: blue; color: #fff; padding: 8px 10px; text-decoration: none; border-radius: 2px; } </style>

<?php
require_once('../../config/db.php');


$db_conn = new db();

if(isset($_POST['dates'])){
    $dates = explode('-',$_POST['dates']);
$tgl = date("Y-m-d h:i:s");

function HeaderingExcel($filename) {
    ob_end_clean();
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$filename" );
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    header("Pragma: public");
}

HeaderingExcel('DataSensor '.$tgl.'.xls');

$date1 = date_create($dates[0]);
$date2 = date_create($dates[1]);

$startDate = date_format($date1,"Y-m-d h:i:s");
$endDate = date_format($date2,"Y-m-d h:i:s");

   $logs = $db_conn->query('SELECT sensor_log.created_at, sensor.sens_name, sensor_log.sens_value, sensor_log.sens_type FROM sensor_log join sensor on sensor.id = sensor_log.id_sens where sensor_log.created_at >= "'.$startDate.'" and sensor_log.created_at <= "'.$endDate.'"')->fetchAll();

?>

	<table border="1">
        <tr>
            <td colspan="5" align="center">Data Sensor</td>
        </tr>
		<tr>
			<td>No</td>
            <td>Nama</td>
			<td>Value</td>
			<td>Type</td>
			<td>Tanggal</td>
		</tr>
        <?php foreach ($logs as $key => $log) { ?>
        <tr>
            <td><?php echo $key + 1; ?></td>
            <td width="200"><?php echo $log['sens_name']; ?></td>
            <td width="200"><?php echo $log['sens_value']; ?></td>
            <td width="200"><?php echo $log['sens_type']; ?></td>
            <td width="200"><?php echo $log['created_at']; ?></td>
        </tr>
        <?php } ?>
	</table>

<?php } ?>
</body>
</html>