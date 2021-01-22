<!DOCTYPE html>
<html><head>
  <title>www.TheBreadBoard.ca - Arduino Fast Track - Lesson 4</title>
  <script>
      var Ultrasonic = 0;
      var analog2 = 0;
      var analog3 = 0;
   <?php
   include'gauge.php';
   ?>
	
function GetArduinoInputs()
{
	nocache = "&nocache=" + Math.random() * 1000000;
	var xmlhttp;
 
    	if (window.XMLHttpRequest) 
	{
        	xmlhttp = new XMLHttpRequest();
    	} 
	else 
	{
        	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    	}
    	xmlhttp.onreadystatechange = function() 
	{
        	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        	{
        	    var jsonObj = JSON.parse(xmlhttp.responseText);
        	    Ultrasonic = jsonObj.Ultrasonic;
        	    analog2 = jsonObj.analog2;
        	    analog3 = jsonObj.analog3;
            }
    	}
    	xmlhttp.open("GET", "http://192.168.1.246/ajax_inputs" + nocache, true);
    	xmlhttp.send();
	setTimeout('GetArduinoInputs()',500);
}
</script>
</head><body onload="GetArduinoInputs()">
<h2>Control over Ethernet using the Wiznet and ENC26 modules</h2>
    <table border="1">
        <tr>
            <th>Ultrasonic Range</th>
            <th>A2 Count</th>
            <th>A3 Volts</th>
        </tr>
        <tr>
            <td><canvas id="Ultrasonic0"></canvas></td>
            <td><canvas id="Canvas1"></canvas></td>
            <td><canvas id="Canvas2"></canvas></td>
        </tr>
    </table>
        <!-- <table>
        <tr>
            <td><input type="button" onclick="DoCommand()" value="Get milliseconds" /> = </td>
            <td><div id="myVal"></div></td>
        </tr>
    </table> -->
    <script>
        var gauge1 = new Gauge({
            renderTo: 'Ultrasonic0',
            width: 200,
            height: 200,
            majorTicks: ['0', '10', '20', '30', '40', '50', '60', '70', '80', '90', '100'],
            valueFormat: { int: 2, dec: 0 },
            highlights: [{
                from: 00,
                to: 60,
                color: 'PaleGreen'
            }, {
                from: 60,
                to: 80,
                color: 'Khaki'
            }, {
                from: 80,
                to: 100,
                color: 'LightSalmon'
            }],
            glow: true,
            units: 'inches',
            title: 'Ultrasonic'
        });

        gauge1.onready = function () {
            setInterval(function () {
                gauge1.setValue(Ultrasonic);
            }, 200);
        };

        gauge1.draw();

        var gauge2 = new Gauge({
            renderTo: 'Canvas1',
            width: 200,
            height: 200,
            glow: true,
            units: 'Count',
            title: 'Analog 2',
            valueFormat: { int: 4, dec: 0 },
            maxValue: 1023,
            majorTicks: ['0', '127', '255', '383', '511', '639', '767', '895', '1023'],
            strokeTicks: true,
            highlights: [{
                from: 00,
                to: 255,
                color: 'PaleGreen'
            }, {
                from: 256,
                to: 767,
                color: 'Khaki'
            }, {
                from: 768,
                to: 1023,
                color: 'LightSalmon'
            }],
            animation: {
                delay: 10,
                duration: 300,
                fn: 'bounce'
            }
        });

        gauge2.onready = function () {
            setInterval(function () {
                gauge2.setValue(analog2);
            }, 200);
        };

        gauge2.draw();

        var gauge3 = new Gauge({
            renderTo: 'Canvas2',
            width: 200,
            height: 200,
            maxValue: 1023,
            majorTicks: ['0', '0.5', '1.0', '1.5', '2.0', '2.5', '3.0', '3.5', '4.0', '4.5', '5.0'],
            glow: true,
            units: 'Volts',
            title: 'Analog 3',
            highlights: false,
            glow: false,
            valueFormat: { int: 4, dec: 0 },
            colors: {
                needle: { start: 'lightgreen', end: 'navy' },
                plate: 'lightyellow',
                title: 'green',
                units: 'lightgreen',
                majorTicks: 'darkgreen',
                minorTicks: 'lightgreen',
                numbers: 'darkgreen'
            },
            animation: {
                delay: 10,
                duration: 300,
                fn: 'elastic'
            }
        });

        gauge3.onready = function () {
            setInterval(function () {
                gauge3.setValue(analog3);
            }, 200);
        };
        gauge3.draw();

        function DoCommand() {
            nocache = "&nocache=" + Math.random() * 1000000;
            var xmlhttp;

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var jsonObj = JSON.parse(xmlhttp.responseText);
                    document.getElementById("myVal").innerHTML = jsonObj.value.toString();
                }
            }
            xmlhttp.open("GET", "http://192.168.1.246/test" + nocache, true);
            xmlhttp.send();
        };

</script>

  
</body></html>


<?php
                    $sql	= 'select * from tb_modbus';
                    $query	= mysqli_query($conn,$sql);
                    ?>

                    <h2><strong><p align="center">Data Sensor Monitoring Sistem</p></strong></h2>

                    <table width="1300" border="1" cellpadding="0" cellspacing="0" align="center">
                                <thead>
                                    <tr>
                                <td width="30" height="29" align="center" valign="middle" bgcolor="#00FFFF">No.</td>
                                        <td width="50" height="29" align="center" valign="middle" bgcolor="#00FFFF">Id</td>
                                        <td width="150" height="29" align="center" valign="middle" bgcolor="#00FFFF">Nama Sensor</td>
                                <td width="160" height="29" align="center" valign="middle" bgcolor="#00FFFF">Function</td>
                                        <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF">Address</td>
                                        <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF">Register</td>
                                        <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF">Offset</td>
                                        <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF">IP Device</td>
                                        <td width="90" height="29" align="center" valign="middle" bgcolor="#00FFFF">Hasil</td>
                                        <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF"><a href="tambah_modbus.php">Tambah</td>
                                    </tr>
                                </thead>
                        <?php 
                            while($data = mysqli_fetch_array($query))
                            {
                                $fungsi = $data['fungsi'];
                                $alamt = $data['alamt'];
                                $register = $data['register'];
                                $ip = $data['ip'];
                                $jumlah = $data['jumlah'];

                                    $tarik = exec("/var/www/html/modpoll/linux_arm-eabihf/modpoll -m enc -$fungsi -a $alamt -r $register -c $jumlah -1 192.168.0.203",$output1);
                                    //$b = exec("/var/www/html/modpoll/linux_arm-eabihf/modpoll -m enc -t3 -a 7 -r 3 -c 1 -1 192.168.0.203",$output2);
                                    //$c = exec("/var/www/html/modpoll/linux_arm-eabihf/modpoll -b 9600 -p none -m rtu -t3 -a 8 -r 2 -c 1 -1 /dev/ttyUSB0",$output3);

                                    $md = (substr($output1[10],5,3))/10;
                        ?>
                                    <tr>
                                <td p align="center" bgcolor="#FFFFFF"><?php echo $data['id']; ?></td>
                                        <td p align="center" bgcolor="#FFFFFF"><?php echo $data['id_sensor']; ?></td>
                                        <td p align="center" bgcolor="#FFFFFF"><?php echo $data['name_sensor']; ?></td>
                                        <td p align="center" bgcolor="#FFFFFF"><?php echo $data['fungsi']; ?></td>
                                        <td p align="center" bgcolor="#FFFFFF"><?php echo $data['alamt']; ?></td>
                                        <td p align="center" bgcolor="#FFFFFF"><?php echo $data['register']; ?></td>
                                        <td p align="center" bgcolor="#FFFFFF"><?php echo $data['jumlah']; ?></td>
                                        <td p align="center" bgcolor="#FFFFFF"><?php echo $data['ip']; ?></td>
                                        <td p align="center" bgcolor="#FFFFFF"><?php echo $md; ?></td>
                                <td p align="center" bgcolor="#FFFFFF">
                                    <a href="edit.php?ni=<?php echo $data['nis'];?>" title="Edit siswa ini"> || edit || </a>
                                <a href="delete.php?ni=<?php echo $data['nis'];?>" onclick="return confirm('Yakin mau di hapus?');">|| hapus ||</a></td>
                                    </tr>
                    <?php  } ?>
                    </table>
