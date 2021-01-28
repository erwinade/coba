<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<?php 
    include 'head.php';
    include 'conn.php' ;
?>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Loading</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="img/soendev.png" alt="homepage" class="dark-logo" width="230px" />
                        </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                       <?php include 'infodevice.php'?>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'menu.php' ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
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
                                        $sql	= 'select * from sensor where sens_type="internal"';
                                        $query1	= mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_array($query1))
                                        {
                                            $no++;
                                            $id = $no;
                                            $description = $row['sens_name'];
                                            $type = $row['sens_type'];
                                            $sens_value = $row['sens_value'];
                                            $status = $row['status_sensor'];
                                    ?>
                                    <tbody class="rack-table">
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td><?php echo $type; ?></td>
                                            <td><?php echo $sens_value; ?></td>
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
                                    <tbody class="rack-table">
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
                                    <tbody class="rack-table">
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
                                    <tbody class="rack-table">
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
                                            <option value="relay">internal</option> 
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
                                        <input type="text" name="status_sensor" id="status_sensor" class="form-control" />  
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
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2019 Admin Wrap Admin by themedesigner.in
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="../assets/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="../assets/node_modules/raphael/raphael.min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/node_modules/d3/d3.min.js"></script>
    <script src="../assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Popup message jquery -->
    <script src="../assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/styleswitcher/jQuery.style.switcher.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-rnYU0fwyR3qe_qTj5_fGYOQp8IVuldk&callback=initMap"></script>

    <script>  
        $(document).ready(function(){  
            $('#add').click(function(){  
                $('#insert').val("Insert");  
                $('#insert_form')[0].reset();  
            });  
            $(document).on('click', '.edit_data', function(){  
                var employee_id = $(this).attr("id");  
                $.ajax({  
                        url:"fetch.php",  
                        method:"POST",  
                        data:{employee_id:employee_id},  
                        dataType:"json",  
                        success:function(data){  
                            $('#sens_name').val(data.sens_name);  
                            $('#sens_type').val(data.sens_type);  
                            $('#threshold_min').val(data.threshold_min);  
                            $('#sens_value').val(data.sens_value); 
                            $('#threshold_max').val(data.threshold_max);   
                            $('#status_sensor').val(data.status_sensor);
                            $('#employee_id').val(data.id);  
                            $('#insert').val("Update");  
                            $('#add_data_Modal').modal('show');  
                        }  
                });  
            });  
            $('#insert_form').on("submit", function(event){  
                event.preventDefault();  
                if($('#sens_name').val() == "")  
                {  
                        alert("Name is required");  
                }  
                else if($('#sens_type').val() == '')  
                {  
                        alert("Type Sensor is required");  
                }  
                else if($('#threshold_min').val() == '')  
                {  
                        alert("Threshold_min is required");  
                }  
                else if($('#threshold_max').val() == '')  
                {  
                        alert("Threshold_max is required");  
                }  
                else  
                {  
                        $.ajax({  
                            url:"insert.php",  
                            method:"POST",  
                            data:$('#insert_form').serialize(),  
                            beforeSend:function(){  
                                $('#insert').val("Inserting");  
                            },  
                            success:function(data){  
                                $('#insert_form')[0].reset();  
                                $('#add_data_Modal').modal('hide');  
                                $('#employee_table').html(data);  
                            }  
                        });  
                }  
            });  
            $(document).on('click', '.view_data', function(){  
                var employee_id = $(this).attr("id");  
                if(employee_id != '')  
                {  
                        $.ajax({  
                            url:"select.php",  
                            method:"POST",  
                            data:{employee_id:employee_id},  
                            success:function(data){  
                                $('#employee_detail').html(data);  
                                $('#dataModal').modal('show');  
                            }  
                        });  
                }            
            });  
        });  
    </script>
</body>

</html>