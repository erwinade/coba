<?php if(isset($_GET['progress'])){  ?>
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Reboot</h3>
        </div>
    </div>
    <div class="progress mb-2">
            <div class="progress-bar progress-bar-striped bg-primary progress-bar-animated" id="bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 1%"></div>
    </div>
    <button class="btn btn-success" onclick="jalan()">Jalankan</button>
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<?php } else { ?>

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Reboot</h3>
        </div>
    </div>


    <?php 
        $sql	= 'select * from config_ip';
        $query	= mysqli_query($conn,$sql);
        while($data = mysqli_fetch_array($query))
        {
            $id = $data['id'];
        
            $ip1=192;
            $ip2=168;
            $ip3=0;
            $ip4=99;

            $gt1=192;
            $gt2=168;
            $gt3=0;
            $gt4=1;

            $sub1=255;
            $sub2=255;
            $sub3=255;
            $sub4=0;
        }
    ?>
<!-- end ip read -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <div class="card-header bg-info text-white">IP Static</div></br>
                        <form action="/action_page.php">
                        <label for="fname">Static IP &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" id="a" name="a" size="3" value=<?php echo $ip1;?>>:<input type="text" id="b" name="b" size="3" value=<?php echo $ip2;?>>:<input type="text" id="c" name="c" size="3" value=<?php echo $ip3;?>>:<input type="text" id="d" name="d" size="3" value=<?php echo $ip4;?>><br>
                        
                        <label for="fname">Gateway &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" id="a" name="a" size="3" value=<?php echo $gt1;?>>:<input type="text" id="b" name="b" size="3" value=<?php echo $gt2;?>>:<input type="text" id="c" name="c" size="3" value=<?php echo $gt3;?>>:<input type="text" id="d" name="d" size="3" value=<?php echo $gt4;?>><br>

                        <label for="fname">Subnetmask &nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" id="a" name="a" size="3" value=<?php echo $sub1;?>>:<input type="text" id="b" name="b" size="3" value=<?php echo $sub2;?>>:<input type="text" id="c" name="c" size="3" value=<?php echo $sub3;?>>:<input type="text" id="d" name="d" size="3" value=<?php echo $sub4;?>><br>

                        <label for="fname">DNS IP &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" id="a" name="a" size="3" value=<?php echo $ip1;?>>:<input type="text" id="b" name="b" size="3" value=<?php echo $ip2;?>>:<input type="text" id="c" name="c" size="3" value=<?php echo $ip3;?>>:<input type="text" id="d" name="d" size="3" value=<?php echo $ip4;?>><br>
                        
                        </form>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
    </div>

    <?php
        $myfile = fopen("interfaces", "w") or die("Unable to open file!");
        $txt =  "source-directory /etc/network/interfaces.d\n\n".
                "auto lo\n".
                "iface lo inet loopback\n\n".
                "auto eth0\n".
                "allow-hotplug eth0\n".
                "iface eth0 inet static\n".
                "address ".$ip1.".".$ip2.".".$ip3.".".$ip4."\n".
                "netmask ".$sub1.".".$sub2.".".$sub3.".".$sub4."\n".
                "gateway ".$gt1.".".$gt2.".".$gt3.".".$gt4."\n\n".
                "auto eth0:1\n".
                "allow-hotplug eth0:1\n".
                "iface eth0:1 inet static\n".
                "address 190.108.1.200\n".
                "netmask 255.255.255.0\n\n".
                "dns-nameservers ".$ip1.".".$ip2.".".$ip3.".".$ip4."\n";
        fwrite($myfile, $txt);
        fclose($myfile);
        //echo $txt;
    ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="get" action="">
                        <input type="submit" onclick="jalan()" name="reboot" value="Reboot" />
                        <input type="hidden" name="page" value="reboot">
                        <input type="hidden" name="progress" value="reboot">
                        <input type="hidden" id="bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 1%" />
                    </form>
                    </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
    </div>
</div>
<?php } ?>