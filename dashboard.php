<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
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
                                        $sql	= 'select * from system_info';
                                        $query1	= mysqli_query($conn,$sql);
                                        while($internal = mysqli_fetch_array($query1))
                                        {
                                            $id = $internal['id'];
                                            $description = $internal['device_name'];
                                            $type = $internal['sens_type'];
                                            $sens_value = $internal['value'];
                                            $status = $internal['status_sensor'];
                                    ?>
                                    <tbody class="rack-table">
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td><?php echo $type; ?></td>
                                            <td><?php echo $sens_value; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href></td>
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
                                    $sql	= 'select * from sensor';
                                    $query	= mysqli_query($conn,$sql);
                                    while($data = mysqli_fetch_array($query))
                                    {
                                        $comm = $data['comm'];
                                        $description = $data['sens_name'];
                                        $type = $data['sens_type'];
                                        $sens_value = $data['value'];
                                        $status = $data['status_sensor'];
                                    ?>
                                    <tbody class="rack-table">
                                        <tr>
                                            <td><?php echo $comm; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td><?php echo $type; ?></td>
                                            <td><?php echo $sens_value; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
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
                                        $sql	= 'select * from sensor_in';
                                        $query2	= mysqli_query($conn,$sql);
                                        while($input = mysqli_fetch_array($query2))
                                        {
                                            $id = $input['id'];
                                            $description = $input['sens_name'];
                                            $type = $input['sens_type'];
                                            $status = $input['status_sensor'];
                                    ?>
                                    <tbody class="rack-table">
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td><?php echo $type; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td style="text-align:center"><a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
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
                                        $sql	= 'select * from relay';
                                        $query3	= mysqli_query($conn,$sql);
                                        while($out = mysqli_fetch_array($query3))
                                        {
                                            $id = $out['id'];
                                            $description = $out['sens_name'];
                                            $type = $out['sens_type'];
                                            $sens_value = $out['value'];
                                            $status = $out['status_sensor'];
                                    ?>
                                    <tbody class="rack-table">
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td><?php echo $type; ?></td>
                                            <td><?php echo $sens_value; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
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

<script type="text/javascript">
    
    
    // loadMaps(data2);

    
        
        var map = new google.maps.Map(document.getElementById('gmaps-markers'), {
            zoom: 12,
            center: new google.maps.LatLng(-6.121435, 106.774124),
            mapTypeId: google.maps.MapTypeId.HYBRID
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        var iconp = {
            url: 'img/server.png',
            scaledSize: new google.maps.Size(70, 70),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(0, 0)
        };

        console.log(locations);
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i].loc[1], locations[i].loc[2]),
                map: map,
                icon: iconp,
                animation: google.maps.Animation.BOUNCE,
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                var contentString = '<div id="content">' +
                    '<h3 id="firstHeading" class="firstHeading">' + locations[i].loc[0] + '</h3>' +
                    '<div id="bodyContent">' +
                    '<table class="table" style="border: none">' +
                    '<tr>' +
                    '<th>Suhu</th>' +
                    '<th>Lembab</th>' +
                    '<th>Tim Ups</th>' +
                    '<th>Power Available</th>' +
                    '<th>Solar</th>' +
                    '<th>Status</th>' +
                    '</tr>' +
                    '</table>'
                '</div>' +
                '</div>';
                return function() {
                    infowindow.setContent(contentString);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
    
</script>
</body>

</html>