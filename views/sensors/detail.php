<?php 

$db_conn = new db();

$sensor_id = 1;

if(isset($_GET['sensor_id']))
{
    $sensor_id = $_GET['sensor_id'];
}

$sensors = $db_conn->query('SELECT * FROM sensor where sensor_utama_id = "'.$sensor_id.'" order by id')->fetchAll();
?>

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
                <form action="detail.php" id="form-select" method="get">
                <select name="sensor_id" id="select-sensor" class="form-control">
                    <?php $db_conn->query('SELECT * FROM sensor_utama where group_name = "sensors" order by sens_name')->fetchAll(function($sensor) use ($sensor_id) { ?>
                            <option value="<?php  echo $sensor['id'];  ?>" <?php if($sensor_id == $sensor['id']) { echo "selected"; } ?>><?php  echo $sensor['sens_name'];  ?></option>
                        <?php });?>
                </select>
                </form>
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
            <canvas id="tempChart-0" width="400" height="200"></canvas>
        </div>
        </div>
        <div class="raw">
            <div class="card card-info">
                <div class="card-header bg-info" >
                    <h4 class="text-white"><i class="fas fa-signal"></i> Humidity</strong> </h4>
                </div></br>
            <canvas id="tempChart-1" width="400" height="200"></canvas>
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
                <?php foreach ($sensors as $lastsen) { ?>
                <div class="col-sm-6">
                    <div id="card" class="card card-info m-1 border-primary" style="border: 1px solid;border-radius: 3px;">
                        <div class="card-header" style="background-color:#d9edf7;#bce8f1;color:#31708f; border:-1px!important; ">
                            <div class="row">
                                <div class="col-1">
                                    <i class="fa fa-tasks fa-1x"></i>
                                </div>
                                <div class="col-11 text-right">
                                    <span style="font-size:40px;font-weight:500"><?php echo $lastsen['sens_value']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="pull-left" id="updateTemp"><small><?php echo $lastsen['update_at']; ?></small></span></br>
                            <span style="font-size:15px;font-weight:500"><?php if($lastsen['sens_type'] == 'temp'){ echo "Temperature(&deg;C)";}else{ echo "Humidity(%)";} ?></span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                
                <?php } ?>

                </div>
            </div>
        </div>
        <div class="raw">
            <div class="card">
            <div class="card-header bg-danger mb-3" >
                    <b class="text-white"><i class="fas fa-wrench"></i> Setting</strong> </b>
                </div>
                <form action="" method="post">
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
                        <button id="excel" type="submit" class="btn btn-sm btn-primary"><span class="fas fa-save"></span>  Export to EXCEL</button>
                    </div>
                </div>
                </form>
                <hr>
                <?php 
                    $relay = $db_conn->query('SELECT * FROM sensor where sens_type = "relay" order by id')->fetchAll();

                    // $sql	= 'select * from sensor where id="23"';
                    // $query	= mysqli_query($conn,$sql);
                    // while($row = mysqli_fetch_array($query))
                    // {
                    //     $sens_name1 = $row['sens_name'];
                    // }
                    // $sql	= 'select * from sensor where id="24"';
                    // $query	= mysqli_query($conn,$sql);
                    // while($row = mysqli_fetch_array($query))
                    // {
                    //     $sens_name2 = $row['sens_name'];
                    // }
                    // $sql	= 'select * from sensor where id="25"';
                    // $query	= mysqli_query($conn,$sql);
                    // while($row = mysqli_fetch_array($query))
                    // {
                    //     $sens_name3 = $row['sens_name'];
                    // }
                    // $sql	= 'select * from sensor where id="26"';
                    // $query	= mysqli_query($conn,$sql);
                    // while($row = mysqli_fetch_array($query))
                    // {
                    //     $sens_name4 = $row['sens_name'];
                    // }

                ?>
                <form method="post" action="relay.php">

                <?php 
                $no = 1;
                foreach ($relay as $rel) { ?>
                    
                <div class="col-12 text-center">
                        <button type ="submit" class="btn btn-sm btn-success" name="relay<?php echo $no; ?>on"><?php echo $rel['sens_name'];?> ON</button>
                        <button type ="submit" class="btn btn-sm btn-danger" name="relay<?php echo $no; ?>off"><?php echo $rel['sens_name'];?> OFF</button>
                    
                </div>
                <br>
                <?php $no++; } ?>
                <!-- <div class="col-12 text-center">
                        <button class="btn btn-sm btn-success" name="relay2on"><?php //echo $sens_name2;?> ON</button>
                        <button class="btn btn-sm btn-danger" name="relay2off"><?php //echo $sens_name2;?> OFF</button>
                    
                </div>
                <br>
                <div class="col-12 text-center">
                        <button class="btn btn-sm btn-success" name="relay3on"><?php //echo $sens_name3;?> ON</button>
                        <button class="btn btn-sm btn-danger" name="relay3off"><?php //echo $sens_name3;?> OFF</button>
                    
                </div>
                <br>
                <div class="col-12 text-center">
                        <button class="btn btn-sm btn-success" name="relay4on"><?php// echo $sens_name4;?> ON</button>
                        <button class="btn btn-sm btn-danger" name="relay4off"><?php //echo $sens_name4;?> OFF</button>
                </div> -->
                </form>
            </div>
        </div>
    </div>