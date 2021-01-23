<?php
include './conn.php';
?>
<!DOCTYPE html>
<?php include 'head.php'; ?>
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
        <?php include 'menu.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
<div class="page-wrapper">
<div class="container-fluid">
<div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Sensor Info</h3>
                    </div>
                </div>
	<?php

if (isset($_SESSION['error'])) { ?>
	<div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">x</a>
	<?php echo $_SESSION['error']; ?></div><?php unset($_SESSION['error']);} ?>
	<?php

if (isset($_SESSION['ok'])) { ?>
	<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">x</a>
	<?php echo $_SESSION['ok']; ?></div><?php unset($_SESSION['ok']);} ?>
    <!-- Example row of columns -->
    <div class="row">
		<div class="col-lg-8">
			<div class="raw">
			<div class="card">
				<div class="card-header bg-info" >
				 <h4 class="text-white"><i class="fas fa-signal"></i> Temperature</strong> </h4>
				</div></br>
				<canvas id="tempChart" width="400" height="200"></canvas>
			</div>
			</div>
			<div class="raw">
                <div class="card card-info">
                    <div class="card-header bg-info" >
                        <h4 class="text-white"><i class="fas fa-signal"></i> Humidity</strong> </h4>
                    </div></br>
				<canvas id="humChart" width="400" height="200"></canvas>
                </div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="raw">
				<div class="card card-info">
                    <div class="card-header bg-info" >
                        <b class="text-white"><i class="fas fa-signal"></i> Temperature</strong> </b>
                    </div></br>
					<div class="row">
					<div class="col-sm-6">
						<div id="card" class="card card-info m-1 card-border border-primary">
							<div class="card-header" style="background-color:#d9edf7;#bce8f1;color:#31708f; border:-1px!important; ">
								<div class="row">
									<div class="col-1">
										<i class="fa fa-tasks fa-1x"></i>
									</div>
                                    <div class="col-11 text-right">
										<span style="font-size:40px;font-weight:500">26</span>
									</div>
								</div>
                            </div>
							<div class="card-body">
                            	<span class="pull-left" id="updateTemp">Update: 00:01:01</span></br>
								<span class="pull-left"><strong>Temperature(&deg;C)</strong></span>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
                    <div id="card" class="card card-info m-1 card-border border-primary">
							<div class="card-header" style="background-color:#d9edf7;#bce8f1;color:#31708f; border:-1px!important; ">
								<div class="row">
									<div class="col-1">
										<i class="fa fa-tasks fa-1x"></i>
									</div>
                                    <div class="col-11 text-right">
										<span style="font-size:40px;font-weight:500">26</span>
									</div>
								</div>
                            </div>
							<div class="card-body">
                            	<span class="pull-left" id="updateTemp">Update: 00:01:01</span></br>
								<span class="pull-left"><strong>Humidity(&deg;C)</strong></span>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
			<div class="raw">
				<div class="panel panel-danger">
					<div class="panel-heading" >
						 <strong><i class="glyphicon glyphicon-wrench"></i> Controls</strong>
					</div></br>
					<div class="row" style="padding-left:5px;">
						<div class="col-lg-6">
							<div class="form-group" style="padding-right:5px;">
								<div class='input-group date' id='datetimepicker1'>
									<input type='text' id='tgl' class="form-control" data-date-format="YYYY-MM-DD"/>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<button id="excel" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>  Export to EXCEL</button>
						</div>
					</div>
					<hr>
					<div class="raw" style="padding-left:40px;">
						<button type="button" class="btn btn-success" id="L1N"><span class="glyphicon glyphicon-lamp"></span> Lampu 1 ON</button>
						<button type="button" class="btn btn-danger" id="L1F"><span class="glyphicon glyphicon-lamp"></span> Lampu 1 OFF</button>
					</div>
					<br>
					<div class="raw" style="padding-left:40px;">
						<button type="button" class="btn btn-success" id="L2N"><span class="glyphicon glyphicon-lamp"></span> Lampu 2 ON</button>
						<button type="button" class="btn btn-danger" id="L2F"><span class="glyphicon glyphicon-lamp"></span> Lampu 2 OFF</button>
					</div>
					<br>
				</div>
			</div>
			<div class="raw">
				<div class="col-lg-12">
					<strong>Mini Home Automation - RPi2 - Whatsapp</strong>
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
    <script src="assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="assets/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
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


    <script>
        window.onload = function () {

        var chart1 = new CanvasJS.Chart("tempchart", {
            animationEnabled: true,  
            title:{
                text: ""
            },
            axisY: {
                title: "Units Sold",
                valueFormatString: "#0,,.",
var ctx = document.getElementById('tempChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
                stripLines: [{
                    value: 3366500,
                    label: "Average"
                }]
            },
            data: [{
                yValueFormatString: "#,### Units",
                xValueFormatString: "YYYY",
                type: "spline",
                dataPoints: [
                    {x: new Date(2002, 0), y: 2506000},
                    {x: new Date(2003, 0), y: 2798000},
                    {x: new Date(2004, 0), y: 3386000},
                    {x: new Date(2005, 0), y: 6944000},
                    {x: new Date(2006, 0), y: 6026000},
                    {x: new Date(2007, 0), y: 2394000},
                    {x: new Date(2008, 0), y: 1872000},
                    {x: new Date(2009, 0), y: 2140000},
                    {x: new Date(2010, 0), y: 7289000},
                    {x: new Date(2011, 0), y: 4830000},
                    {x: new Date(2012, 0), y: 2009000},
                    {x: new Date(2013, 0), y: 2840000},
                    {x: new Date(2014, 0), y: 2396000},
                    {x: new Date(2015, 0), y: 1613000},
                    {x: new Date(2016, 0), y: 2821000},
                    {x: new Date(2017, 0), y: 2000000}
                ]
            }]
        });
        chart1.render();
    }
    </script>
        <script>
        window.onload = function () {

        var chart = new CanvasJS.Chart("humchart", {
            animationEnabled: true,  
            title:{
                text: ""
            },
            axisY: {
                title: "Units Sold",
                valueFormatString: "#0,,.",
                suffix: "mn",
                stripLines: [{
                    value: 3366500,
                    label: "Average"
                }]
            },
            data: [{
                yValueFormatString: "#,### Units",
                xValueFormatString: "YYYY",
                type: "spline",
                dataPoints: [
                    {x: new Date(2002, 0), y: 2506000},
                    {x: new Date(2003, 0), y: 2798000},
                    {x: new Date(2004, 0), y: 3386000},
                    {x: new Date(2005, 0), y: 6944000},
                    {x: new Date(2006, 0), y: 6026000},
                    {x: new Date(2007, 0), y: 2394000},
                    {x: new Date(2008, 0), y: 1872000},
                    {x: new Date(2009, 0), y: 2140000},
                    {x: new Date(2010, 0), y: 7289000},
                    {x: new Date(2011, 0), y: 4830000},
                    {x: new Date(2012, 0), y: 2009000},
                    {x: new Date(2013, 0), y: 2840000},
                    {x: new Date(2014, 0), y: 2396000},
                    {x: new Date(2015, 0), y: 1613000},
                    {x: new Date(2016, 0), y: 2821000},
                    {x: new Date(2017, 0), y: 2000000}
                ]
            }]
        });
        chart.render();
    }
    </script>
</body>

</html>