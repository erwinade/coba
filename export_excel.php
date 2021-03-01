<?php
$db_conn2 = new db();
if(isset($_POST['dates'])){
    $dates = explode('-',$_POST['dates']);
    
   $logs = $db_conn2->query('SELECT * FROM sensor_log')->fetchArray();

}
?>