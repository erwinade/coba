<?php
include './conn.php';
?>
<!DOCTYPE html>
<?php include 'head.php'; ?>
<link rel="stylesheet" type="text/css" href="assets/node_modules/daterangepicker/daterangepicker.css" />
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
                    <div class="card-header bg-info mb-3" >
                        <b class="text-white"><i class="fas fa-history"></i> Last Update</strong> </b>
                    </div>
					<div class="row">
					<div class="col-sm-6">
						<div id="card" class="card card-info m-1 border-primary" style="border: 1px solid;border-radius: 3px;">
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
                                <span style="font-size:15px;font-weight:500">Temperature(&deg;C)</span>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
                    <div id="card" class="card card-info m-1 card-border border-primary" style="border: 1px solid;border-radius: 3px;">
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
                                <span style="font-size:15px;font-weight:500">Humidity(%)</span>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
			<div class="raw">
				<div class="card">
                <div class="card-header bg-danger mb-3" >
                        <b class="text-white"><i class="fas fa-wrench"></i> Last Update</strong> </b>
                    </div>
					<div class="row" style="padding-left:5px;">
						<div class="col-lg-6">
							<div class="form-group" style="padding-right:5px;">
								<div class='input-group date' id='datetimepicker1'>
									<input type='text' id='tgl' name="dates" class="form-control" data-date-format="YYYY-MM-DD"/>
									<span class="input-group-addon">
										<span class="fas fa-calender"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<button id="excel" type="button" class="btn btn-sm btn-primary"><span class="fas fa-save"></span>  Export to EXCEL</button>
						</div>
					</div>
					<hr>
					<div class="col-12 text-center">
						<button type="button" class="btn btn-sm btn-success" id="L1N"><span class="fas fa-certificate"></span> Lampu 1 ON</button>
						<button type="button" class="btn btn-sm btn-danger" id="L1F"><span class="fas fa-certificate"></span> Lampu 1 OFF</button>
					</div>
					<br>
					<div class="col-12 text-center">
						<button type="button" class="btn btn-sm btn-success" id="L2N"><span class="fas fa-certificate"></span> Lampu 2 ON</button>
						<button type="button" class="btn btn-sm btn-danger" id="L2F"><span class="fas fa-certificate"></span> Lampu 2 OFF</button>
					</div>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
                <span style="font-size:15px;font-weight:500">Mini Home Automation - RPi2 - Whatsapp</span>
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
    <script src="assets/node_modules/daterangepicker/moment.min.js"></script>
    <script src="assets/node_modules/daterangepicker/daterangepicker.js"></script>


<?php
//data sementara sebelum ada data dari database

// data dari database nnti berupa log sensor berdasarkan tanggal input sensor


    $tempLabel = ["1 Jan", "2 Jan","3 Jan","4 Jan", "5 Jan","6 Jan","7 Jan", "8 Jan","9 Jan","10 Jan", "11 Jan","12 Jan","13 Jan", "14 Jan","15 Jan"];
    $tempData = [60, 70,90, 89,88,87,86,85,84,83,82,81,80,79,78];

    $humLabel = ["1 Jan", "2 Jan","3 Jan","4 Jan", "5 Jan","6 Jan","7 Jan", "8 Jan","9 Jan","10 Jan", "11 Jan","12 Jan","13 Jan", "14 Jan","15 Jan"];
    $humData = [30, 33, 35,36,37,38,39,40,41,42,44,46,67,68,45];
?>

<script>
var ctx = document.getElementById('tempChart');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach ($tempLabel as $label) { echo '"' . $label . '",';}?>],
        datasets: [{
            label: 'Sensor 1',
            data: [<?php foreach ($tempData as $data) { echo $data . ',';}?>],
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
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var hum = document.getElementById('humChart');
var humChart = new Chart(hum, {
    type: 'line',
    data: {
        labels: [<?php foreach ($humLabel as $label) { echo '"' . $label . '",';}?>],
        datasets: [{
            label: "sensor hum 1",
            data: [<?php foreach ($humData as $data) { echo '"' . $data . '",';}?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

$('input[name="dates"]').daterangepicker();
</script>
</body>

</html>