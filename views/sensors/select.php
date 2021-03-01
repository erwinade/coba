<?php  
  include '../../conn.php';
 if(isset($_POST["employee_id"]))  
 {   
      $satuan='';
      $output = '';   
      $query = "SELECT * FROM sensor WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           if ($row['sens_type'] == "temp")
           {
                $satuan = "C";
           }
           if ($row['sens_type'] == "hum")
           {
                $satuan = "%";
           }
           $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["sens_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Type</label></td>  
                     <td width="70%">'.$row["sens_type"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Threshold Min</label></td>  
                     <td width="70%">'.$row["threshold_min"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Threshold Max</label></td>  
                     <td width="70%">'.$row["threshold_max"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Value</label></td>  
                     <td width="70%">'.$row["sens_value"].'&nbsp;'.$satuan.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Status</label></td>  
                     <td width="70%">'.$row["status_sensor"].'</td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>