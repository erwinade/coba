<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<?php include 'head.php' ?>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Soendev Admin</p>
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
                                    <tbody class="rack-table">
                                        <tr>
                                            <td>1</td>
                                            <td>Internal Temperature</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Internal Humidity</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Input Voltage</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href></td>
                                        </tr>
                                    </tbody>      
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

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
                                    <tbody class="rack-table">
                                        <tr>
                                            <td>1</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td align="center">
                                                                    <button class="btn btn-warning edit" data-id="" data-token="">Edit</button>
                                                                    <button class="btn btn-danger delete" data-id="" data-token="">Hapus</button>
                                                                    <a href="" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                    </tbody>
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
                                            <th>Value</th>
                                            <th>Status</th>
                                            <th style="text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="rack-table">
                                        <tr>
                                            <td>1</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                    </tbody>
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
                                    <tbody class="rack-table">
                                        <tr>
                                            <td>1</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>None</td>
                                            <td>Temp/Hum</td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center"><a href ="">View</a href>&nbsp;&nbsp;<a href ="">Edit</a href>&nbsp;&nbsp;<a href ="">Delete</a href></td>
                                        </tr>
                                    </tbody>
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
    <script src="assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="assets/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
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
    <script src="assets/node_modules/raphael/raphael.min.js"></script>
    <script src="assets/node_modules/morrisjs/morris.min.js"></script>
    <!--c3 JavaScript -->
    <script src="assets/node_modules/d3/d3.min.js"></script>
    <script src="assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Popup message jquery -->
    <script src="assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/styleswitcher/jQuery.style.switcher.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-rnYU0fwyR3qe_qTj5_fGYOQp8IVuldk&callback=initMap"></script>

<script type="text/javascript">
    
    
    // loadMaps(data2);

    function initMap() {
        var  data2 = [{"location":"Jakarta,-6.121435,106.774124","temperature":25,"voltage":203.9,"humidity":50,"flow":18,"current":1.3,"status":0,"id":1},{"location":"Tangerang,-6.178306,106.631889","temperature":26.2,"voltage":23,"humidity":60,"flow":19.23,"current":34,"status":0,"id":2}];
        var locations = [];
        $.each(data2, function( index, value ) {
            locations.push({
                loc : value.location.split(','), 
                id : value.id, 
                temperature : value.temperature, 
                humidity : value.humidity, 
                flow : value.flow,
                voltage : value.voltage,
                current : value.current,
                status : value.status === 1 ? 'Online' : 'Offline',
                badge : value.status === 1 ? 'badge-success' : 'badge-danger',
            });
        }); 
        
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