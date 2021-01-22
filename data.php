<?php
//koneksi ke Mysql
$con = mysql_connect("localhost","root","");
$db = mysql_select_db("weather");
//if($db) echo("OK1");
$last_numrows = $_GET["dlen"];
$tablename = $_GET["table"];
$tgl = $_GET["tgl"];
$flag=0;
//query MySQL
$cekrows=mysql_query("SELECT * FROM $tablename where DATE(tdatetime) = DATE('$tgl')");
$new_numrows = mysql_num_rows($cekrows);
$newlines = $new_numrows-$last_numrows;
if ($new_numrows!=0)                        
{
	if($new_numrows>$last_numrows)
	{
		$result = mysql_query("select * from $tablename where DATE(tdatetime) = DATE('$tgl') order by tdatetime Desc Limit $newlines");
		$dataTemp = array();                            
		$dataHum = array();
		$dataTimeUpdate = array();
		while($row = mysql_fetch_array($result))        
		{
			$dataValueTemp = $row['temperature'] ;             
			$dataValueHum = $row['humidity'] ;    
			$time = strtotime($row['tdatetime'].'GMT+7')*1000;  
			$dataTimeUpdate[]=date('H:i:s',strtotime($row['tdatetime']));
			$dataTemp[] = array($time , $dataValueTemp);
			$dataHum[] = array($time , $dataValueHum);  
		}
		echo json_encode(array($dataTemp,$dataHum,$dataTimeUpdate),JSON_NUMERIC_CHECK);
	}
	else 
	{
		$flag =1;
		echo "1";
	}	
}
if($new_numrows ==0 && $flag ==0)
	echo "0";
	
mysql_close($con);
?>