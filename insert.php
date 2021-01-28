<?php  
 include 'conn.php';
 if(!empty($_POST))  
 {  
     $output = '';  
     $message = '';  
     $sens_name = mysqli_real_escape_string($conn, $_POST["sens_name"]);  
     $sens_type = mysqli_real_escape_string($conn, $_POST["sens_type"]);  
     $threshold_min = mysqli_real_escape_string($conn, $_POST["threshold_min"]);  
     $sens_value = mysqli_real_escape_string($conn, $_POST["sens_value"]);  
     $threshold_max = mysqli_real_escape_string($conn, $_POST["threshold_max"]);  

     
     if($_POST["employee_id"] != '')  
     {  
          $query = "  UPDATE sensor   
          SET sens_name='$sens_name',   
          sens_type='$sens_type',   
          threshold_min='$threshold_min',   
          sens_value = '$sens_value',   
          threshold_max = '$threshold_max'
          WHERE id='".$_POST["employee_id"]."'";  
          // $messthreshold_max = 'Data Updated';  
          if(mysqli_query($conn, $query))  
          { 
               echo json_encode('success');
               return;
          }else{
               echo json_encode('gagal');
          }
     }  
     else  
     {  
          $query = "INSERT INTO sensor(sens_name, sens_type, threshold_min, sens_value, threshold_max)  
          VALUES('$sens_name', '$sens_type', '$threshold_min', '$sens_value', '$threshold_max');  
          ";  
          // $message = 'Data Inserted';  

          if(mysqli_query($conn, $query))  
          { 
               echo json_encode('success');
               return;
          }else{
               echo json_encode('gagal');
          }


          // if(mysqli_query($conn, $query))  
          // {  
          //      $output .= '<label class="text-success">' . $message . '</label>';  
          //      $select_query = "SELECT * FROM sensor ORDER BY id DESC";  
          //      $result = mysqli_query($conn, $select_query);  
          //      $output .= '  
          //           <table class="table table-bordered">  
          //                <tr>  
          //                     <th width="70%">Employee Name</th>  
          //                     <th width="15%">Edit</th>  
          //                     <th width="15%">View</th>  
          //                </tr>  
          //      ';  
          //      while($row = mysqli_fetch_array($result))  
          //      {  
          //           $output .= '  
          //                <tr>  
          //                     <td>' . $row["sens_name"] . '</td>  
          //                     <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
          //                     <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
          //                </tr>  
          //           ';  
          //      }  
          //      $output .= '</table>';  
          // }  
          // $output_all = ['tag_id'=>'.rack-table2','data'=>$output];
          echo json_encode('success');
          return;
     }  

     
}  
?>