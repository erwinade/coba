<?php
 if($_SERVER['REQUEST_URI'] == '/views/sensors/index.php' || $_SERVER['REQUEST_URI'] == '/views/sensors/' ){
    header('Location: /views/login.php');
 }
?>

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Info box -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <div class="card-header bg-info text-white">Internal Sensors</div>
                    <table class="table table-striped" >
                    <thead>
                            <tr>
                                <th width="5">No</th>
                                <th width="420">Description</th>
                                <th>Type</th>
                                <th>Value</th>
                                <th>Status</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <?php 
                            $no = 0;
                            $sql	= 'select * from sensor where sens_type in("internal/temp","internal/storage","internal/voltage")';
                            $query1	= mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($query1))
                            {
                                $no++;
                                $id = $no;
                                $id_sens = $row['id'];
                                $sens_name = $row['sens_name'];
                                $sens_type = $row['sens_type'];
                                $type = $row['sens_type'];
                                $sens_value = $row['sens_value'];
                                $status = $row['status_sensor'];
                                $threshold_min = $row['threshold_min'];
                                $threshold_max = $row['threshold_max'];
                                if($sens_value <= $threshold_max && $sens_value >= $threshold_min)
                                {
                                    $status_sensor="Normal";
                                }

                                if($sens_value >= $threshold_max || $sens_value <= $threshold_min)
                                {
                                    $status_sensor="Alarm";
                                    //echo "<br>";
                                    //echo $status_sensor;
                                    $sql = "INSERT INTO alarm_logs (id_sens, sens_name, sens_value, sens_type, status_sensor)
                                    VALUES ('$id_sens', '$sens_name', '$sens_value', '$sens_type', '$status_sensor')";

                                    if ($conn->query($sql) === TRUE) {
                                        //echo "Berhasil Menambah Alarm Log\n";
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                }
                                $sql = "UPDATE sensor SET status_sensor='$status_sensor' WHERE id=$id_sens";

                                    if ($conn->query($sql) === TRUE) {
                                        //echo "Berhasil Mengupdate Sensor </br>";
                                    } else {
                                        echo "Error updating record: " . $conn->error;
                                    }

                                    if ($row['sens_type'] == "internal/temp")
                                    {
                                            $satuan = "C";
                                    }
                                    if ($row['sens_type'] == "internal/storage")
                                    {
                                            $satuan = "%";
                                    }
                                    if ($row['sens_type'] == "internal/voltage")
                                    {
                                            $satuan = "V";
                                    }
                        ?>
                        <tbody class="rack-table">
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $sens_name; ?></td>
                                <td><?php echo $type; ?></td>
                                <td><?php echo $sens_value; ?>&nbsp;<?php echo $satuan;?></td>
                                <td><?php echo $status; ?></td>
                                <td style="text-align:center"><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" />&nbsp;&nbsp;<input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" />
                            </tr>
                        </tbody>     
                        <?php
                            }
                        ?> 
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- tabel Sensor -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <div class="card-header bg-info text-white">Sensors</div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="8">Comm</th>
                                <th width="420">Description</th>
                                <th >Type</th>
                                <th>Value</th>
                                <th>Status</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                    <?php 
                        $no = 0;
                        $sql	= 'select * from sensor where sens_type in("temp","hum")';
                        $query	= mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($query))
                        {
                            $no++;
                            $comm = $no;
                            $description = $row['sens_name'];
                            $type = $row['sens_type'];
                            $sens_value = $row['sens_value'];
                            $status = $row['status_sensor'];
                            if ($row['sens_type'] == "temp")
                            {
                                    $satuan = "C";
                            }
                            if ($row['sens_type'] == "hum")
                            {
                                    $satuan = "%";
                            }
                        ?>
                        <tbody class="rack-table2">
                            <tr>
                                <td><?php echo $comm; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $type; ?></td>
                                <td><?php echo $sens_value; ?>&nbsp;<?php echo $satuan; ?></td>
                                <td><?php echo $status; ?></td>
                                <td style="text-align:center"><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" />&nbsp;&nbsp;<input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" />&nbsp;&nbsp;<a href ="">Delete</a href></td>
                            </tr>
                            
                        </tbody>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <div class="card-header bg-info text-white">Digital In Sensors</div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="8">Comm</th>
                                <th width="420">Description</th>
                                <th >Type</th>
                                <th>Status</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <?php 
                            $no = 0;
                            $sql	= 'select * from sensor where sens_type ="input"';
                            $query	= mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($query))
                            {
                                $no++;
                                $id = $no;
                                $description = $row['sens_name'];
                                $type = $row['sens_type'];
                                $status = $row['status_sensor'];
                        ?>
                        <tbody class="rack-table3">
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $type; ?></td>
                                <td><?php echo $status; ?></td>
                                <td style="text-align:center"><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" />&nbsp;&nbsp;<a href ="">Delete</a href></td>
                            </tr>
                        </tbody>
                        <?php
                            }
                        ?>
                    </table>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <div class="card-header bg-info text-white">Digital Relay</div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="8">Comm</th>
                                <th width="420">Description</th>
                                <th >Type</th>
                                <th>Value</th>
                                <th>Status</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <?php 
                            $no = 0;
                            $sql	= 'select * from sensor where sens_type="relay"';
                            $query	= mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($query))
                            {
                                $no++;
                                $id = $no;
                                $description = $row['sens_name'];
                                $type = $row['sens_type'];
                                $sens_value = $row['sens_value'];
                                $status = $row['status_sensor'];
                        ?>
                        <tbody class="rack-table4">
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $type; ?></td>
                                <td><?php echo $sens_value; ?></td>
                                <td><?php echo $status; ?></td>
                                <td style="text-align:center"><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" />&nbsp;&nbsp;<input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" />&nbsp;&nbsp;<a href ="">Delete</a href></td>
                            </tr>
                        </tbody>
                        <?php   
                            }
                        ?>
                    </table>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
    </div>

    <div id="dataModal" class="modal fade">  
        <div class="modal-dialog">  
            <div class="modal-content">  
                    <div class="modal-header">  
                        <h4 class="modal-title">Sensor Details</h4> 
                        <button type="button" class="close" data-dismiss="modal">&times;</button>   
                    </div>  
                    <div class="modal-body" id="employee_detail">  <!-- untuk menmpilkan -->
                    </div>  
                    <div class="modal-footer">  
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                    </div>  
            </div>  
        </div>  
    </div>  
    <div id="add_data_Modal" class="modal fade">  
        <div class="modal-dialog">  
            <div class="modal-content">  
                    <div class="modal-header">  
                        <h4 class="modal-title">Detail Sensor Monsis-8 THD</h4>  
                        <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    </div>  
                    <div class="modal-body">  
                        <form method="post" id="insert_form"> 
                            <label>Description</label>  
                            <input type="text" name="sens_name" id="sens_name" class="form-control" />  
                            <br />  
                            <label>Type Sensor</label>  
                            <select name="sens_type" id="sens_type" class="form-control">  
                                <option value="temp">temp</option>  
                                <option value="hum">hum</option>  
                                <option value="input">input</option>  
                                <option value="relay">relay</option>  
                                <option value="internal/temp">internal/temp</option> 
                                <option value="internal/storage">internal/storage</option> 
                                <option value="internal/voltage">internal/voltage</option> 
                            </select>  
                            <br /> 
                            <label>Threshold Min</label>  
                            <input type="text" name="threshold_min" id="threshold_min" class="form-control"></input>  
                            <br />  
                            <label>Value</label>  
                            <input type="text" name="sens_value" id="sens_value" class="form-control" />  
                            <br />  
                            <label>Threshold Max</label>  
                            <input type="text" name="threshold_max" id="threshold_max" class="form-control" />  
                            <br />  
                            <label>Status Sensor</label>  
                            <input type="text" name="1" id="status_sensor" class="form-control" />  
                            <br />
                            <input type="hidden" name="employee_id" id="employee_id" /> 
                            <br /> 
                            <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                        </form>  
                    </div>  
                    <div class="modal-footer">  
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                    </div>  
            </div>  
        </div>  
    </div>  
</div>
    