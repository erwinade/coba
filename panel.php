<!DOCTYPE html>
<html lang="en">
<?php session_start(); 
    include 'head.php';
    include 'conn.php'; 
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
                        <h3 class="text-themecolor">Panel Info</h3>
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
                                <table class="table table-striped" >
                                        <thead>
                                            <tr>
                                                <th colspan = "4" style="text-align:center" bgcolor="#00BFFF">PLN</th>
                                                <th colspan = "4" style="text-align:center" bgcolor="#00BFFF">GENSET</th>
                                            </tr>
                                        </thead>
                                        <tbody class="rack-table">
                                            <tr>
                                                <td rowspan="4" align="center" width="100"><img src="img/pln.png" width="200px" ></td>
                                                <td> Status PLN</td>
                                                <td colspan = "2" align="center"> ON</td>
                                                <td rowspan="4" align="center" width="100"><img src="img/genset.png" width="200px"></td>
                                                <td> Status GENSET</td>
                                                <td colspan = "2" align="center"> OFF</td>
                                                
                                            </tr>
                                            <tr>
                                                <td> Tegangan</td>
                                                <td> 230</td>
                                                <td width="10"> V</td>
                                                <td> Tegangan</td>
                                                <td> 0</td>
                                                <td width="100"> V</td>
                                            </tr>
                                            <tr>
                                                <td> Arus</td>
                                                <td> 100</td>
                                                <td width="100"> A</td>
                                                <td> Arus</td>
                                                <td> 0</td>
                                                <td width="100"> A</td>
                                            </tr>
                                            <tr>
                                                <td> Daya</td>
                                                <td> 555</td>
                                                <td width="100"> Watt</td>
                                                <td> Daya</td>
                                                <td> 0</td>
                                                <td width="100"> Watt</td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                </div>
                <?php 
                        $sql = "SELECT *FROM tb_panel WHERE panel_type = 'current' and id_panel = '1'";
                        $result = mysqli_query($conn,$sql);
                        while($am = mysqli_fetch_array($result)){
                        $panel_cur = $am['panel_name'];
                        $location_cur = $am['location'];
                        $i1 = $am['l1'];
                        $i2 = $am['l2'];
                        $i3 = $am['l3'];
                        $i4 = $am['l4'];
                        }
                        $sql1 = "SELECT *FROM tb_panel WHERE panel_type = 'voltage' and id_panel = '1'";
                        $result1 = mysqli_query($conn,$sql1);
                        while($volt = mysqli_fetch_array($result1)){
                        $panel_vol = $volt['panel_name'];
                        $location_vol = $volt['location'];
                        $v1 = $volt['l1'];
                        $v2 = $volt['l2'];
                        $v3 = $volt['l3'];
                        $v4 = $volt['l4'];
                        }
                        $sql2 = "SELECT *FROM tb_panel WHERE panel_type = 'power' and id_panel = '1'";
                        $result2 = mysqli_query($conn,$sql2);
                        while($pow = mysqli_fetch_array($result2)){
                        $panel_pow = $pow['panel_name'];
                        $location_pow = $pow['location'];
                        $p1 = $pow['l1'];
                        $p2 = $pow['l2'];
                        $p3 = $pow['l3'];
                        $p4 = $pow['l4'];
                        }
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th bgcolor="#00BFFF">Electrical</th>
                                            <th bgcolor="#00BFFF">Tag Name</th>
                                            <th bgcolor="#00BFFF">Description</th>
                                            <th bgcolor="#00BFFF">Location</th>
                                            <th bgcolor="#00BFFF">R</th>
                                            <th bgcolor="#00BFFF">S</th>
                                            <th bgcolor="#00BFFF">T</th>
                                            <th bgcolor="#00BFFF">AVG/Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--  tabel panel tampil Current-->
                                        <tr>
                                            <td bgcolor="#00BFFF">Current</td>
                                            <td><?php echo $panel_cur;?></td>
                                            <td>Current 3 Phase</td>
                                            <td><?php echo $location_cur;?></td>
                                            <td><?php echo $i1;?></td>
                                            <td><?php echo $i2;?></td>
                                            <td><?php echo $i3;?></td>
                                            <td><?php echo $i4;?></td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#00BFFF">Voltage</td>
                                            <td><?php echo $panel_cur;?></td>
                                            <td>Voltage 3 Phase</td>
                                            <td><?php echo $location_cur;?></td>
                                            <td><?php echo $v1;?></td>
                                            <td><?php echo $v2;?></td>
                                            <td><?php echo $v3;?></td>
                                            <td><?php echo $v4;?></td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#00BFFF">Power</td>
                                            <td><?php echo $panel_cur;?></td>
                                            <td>Power 3 Phase</td>
                                            <td><?php echo $location_cur;?></td>
                                            <td><?php echo $p1;?></td>
                                            <td><?php echo $p2;?></td>
                                            <td><?php echo $p3;?></td>
                                            <td><?php echo $p4;?></td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#DAA520">Kwh</td>
                                            <td colspan="7" bgcolor="#F5F5DC" align="center">123456.678</td>
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
                Copyright 2019 Soendev.com
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