<?php
    include 'config/db.php';
    include 'conn.php';
    include 'relay.php';

    $db_conn = new db();

?>


<?php include '_partials/head.php'; ?>
<?php include '_partials/header.php'; ?>

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Sensor Info</h3>
            </div>
        </div>
	
    <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">x</a>
        <?php echo $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']);} ?>
                
    <?php if (isset($_SESSION['ok'])) { ?>
        <div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">x</a>
        <?php echo $_SESSION['ok']; ?></div>
    <?php unset($_SESSION['ok']);} ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <label for="">Pilih Sensor</label>
                    <select name="sensor" id="" class="form-control">
                        <?php $db_conn->query('SELECT * FROM sensor where sens_type in ("temp","hum")')->fetchAll(function($sensor) { ?>
                             <option value=""><?php  echo $sensor['sens_name'];  ?></option>
                            
                           <?php });?>
                    </select>
                </div>
            </div>
        </div>
    </div>
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
                    <?php 
                        $sql	= 'select * from sensor where id="23"';
                        $query	= mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($query))
                        {
                            $sens_name1 = $row['sens_name'];
                        }
                        $sql	= 'select * from sensor where id="24"';
                        $query	= mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($query))
                        {
                            $sens_name2 = $row['sens_name'];
                        }
                        $sql	= 'select * from sensor where id="25"';
                        $query	= mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($query))
                        {
                            $sens_name3 = $row['sens_name'];
                        }
                        $sql	= 'select * from sensor where id="26"';
                        $query	= mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($query))
                        {
                            $sens_name4 = $row['sens_name'];
                        }

                    ?>
					<div class="col-12 text-center">
                        <form method="post" action="relay.php">
                            <button type ="submit" class="btn btn-sm btn-success" name="relay1on"><?php echo $sens_name1;?> ON</button>
                            <button type ="submit" class="btn btn-sm btn-danger" name="relay1off"><?php echo $sens_name1;?> OFF</button>
                        
                    </div>
                    <br>
					<div class="col-12 text-center">
                            <button class="btn btn-sm btn-success" name="relay2on"><?php echo $sens_name2;?> ON</button>
                            <button class="btn btn-sm btn-danger" name="relay2off"><?php echo $sens_name2;?> OFF</button>
                        
					</div>
                    <br>
                    <div class="col-12 text-center">
                            <button class="btn btn-sm btn-success" name="relay3on"><?php echo $sens_name3;?> ON</button>
                            <button class="btn btn-sm btn-danger" name="relay3off"><?php echo $sens_name3;?> OFF</button>
                        
                    </div>
                    <br>
					<div class="col-12 text-center">
                            <button class="btn btn-sm btn-success" name="relay4on"><?php echo $sens_name4;?> ON</button>
                            <button class="btn btn-sm btn-danger" name="relay4off"><?php echo $sens_name4;?> OFF</button>
                        </form>
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

    <?php include "_partials/footer.php" ?>
    

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