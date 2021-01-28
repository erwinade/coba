<?php  
 //fetch.php  
 include 'conn.php';
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM sensor WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
