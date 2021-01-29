<!DOCTYPE html>
<html lang="en">

<?php 
    include 'head.php' ;
    include 'conn.php' ;
?>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
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
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <?php include 'infodevice.php'?>
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

                                    <label for="fname">Subnetmask &nbsp;&nbsp;:</label>
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
                    
                    //fwrite($myfile, $txt);
                    //fclose($myfile);
                    //echo $txt;
                ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-primary mb-4" a href="aksi.php">Reboot</button>
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
  
</body>

</html>
