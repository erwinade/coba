<?php
$idtable=$_GET['table'];
$tgl=$_GET['tgl'];

  require_once('excel/OLEwriter.php');
  require_once('excel/BIFFwriter.php');
  require_once('excel/Worksheet.php');
  require_once('excel/Workbook.php');
  $con = mysql_connect("localhost","root","wqmp2et");
  $db = mysql_select_db("weather");
  
    function HeaderingExcel($filename) {
      header("Content-type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=$filename" );
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
      header("Pragma: public");
      }
	  // HTTP headers
HeaderingExcel('DataSensor '.$tgl.'.xls');// Creating a workbook
$workbook = new excel("-");
// Creating the first worksheet
$worksheet1 =& $workbook->add_worksheet('Data Sensor');
$worksheet1->freeze_panes(1, 0);
  $worksheet1->set_column(0, 0, 18);
  $worksheet1->set_column(1, 1, 20);
  $worksheet1->set_column(1, 2, 20);

  $worksheet1->write_string(0,0,"Tanggal-Jam");
  $worksheet1->write_string(0,1,"Temperature(degree C)");
  $worksheet1->write_string(0,2,"Humidity (%RH)");
  $qryreport = mysql_query("Select * From $idtable where DATE(tdatetime)=DATE('$tgl')") or die(mysql_error());
  $sqlrows=mysql_num_rows($qryreport);
  $j=0;	
  WHILE ($reportdisp=mysql_fetch_array($qryreport)) { 
	$j=$j+1;              
    $tgljam=$reportdisp['tdatetime'];
    $temp=$reportdisp['temperature'];
    $hum=$reportdisp['humidity'];

	$worksheet1->write_string($j,0,"$tgljam");
	$worksheet1->write_string($j,1,"$temp");
	$worksheet1->write_string($j,2,"$hum");
	}
$workbook->close();
?>