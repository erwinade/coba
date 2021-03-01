<?php session_start(); 

if(!isset( $_SESSION["userlogin"])){
    header('Location: /views/login.php');
}
?>
<?php 
    include '../conn.php' ;
    include '../config/db.php';
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
    $CurPageURL = $protocol . $_SERVER['HTTP_HOST'];

    $menus = [
        [ 'name'=>'Dashboard','url' => '?page=dashboard','icon'=>'icon-Car-Wheel'],
        [ 'name'=>'Sensor Info','url' => '?page=detail','icon'=>'icon-Pie-Chart'],
        [ 'name'=>'Panel Info','url' => '?page=panel','icon'=>'icon-Double-Circle'],
        [ 'name'=>'Alarm Logs','url' => '?page=alarm','icon'=>'icon-Split-Vertical'],
        [ 'name'=>'Pengaturan','url' => '?page=pengaturan','icon'=>'icon-Prater'],
        [ 'name'=>'Reboot','url' => 'reboot.php','icon'=>'fas fa-unlock'],
        [ 'name'=>'Logout','url' => 'logout.php','icon'=>'fas fa-user'],

    ];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Soendev</title>
    <link href="../assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="../assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <link href="../assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/pages/dashboard1.css" rel="stylesheet">
    <link href="../css/pages/pages.css" rel="stylesheet">
    <link href="../css/colors/default.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/node_modules/daterangepicker/daterangepicker.css" />
</head>

<body class="fix-header fix-sidebar card-no-border">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Loading</p>
        </div>
    </div>
    
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><img src="../img/soendev.png" alt="homepage" class="dark-logo" width="230px" /></a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav my-lg-0">
                       <?php include '../infodevice.php'?>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    <?php foreach ($menus as $m) { ?>
                        <li> <a class="waves-effect" href="<?php echo $m['url']; ?>"><i class="<?php echo $m['icon']; ?>"></i><span class="hide-menu"><?php echo $m['name']; ?></span></a></li>
                    <?php } ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
                </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">

            <?php 

                if(isset($_GET['page']))
                {
                    if($_GET['page'] == 'detail'){
                        include 'sensors/detail.php';
                    }else{
                        include 'sensors/index.php';
                    }
                }else{
                    include 'sensors/index.php';
                }

                
            ?>

            <footer class="footer">
                Copyright 2019 Soendev.com
            </footer>
        </div>
    </div>
    
    <script src="../assets/node_modules/jquery/jquery.min.js"></script>
    <script src="../assets/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
    <script src="../js/waves.js"></script>
    <script src="../js/sidebarmenu.js"></script>
    <script src="../js/custom.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-rnYU0fwyR3qe_qTj5_fGYOQp8IVuldk&callback=initMap"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php 
        if(isset($_GET['page']))
        {
            if($_GET['page'] == 'detail'){
                include 'sensors/detail.php';
            }else{
                echo '<script src="index.js"> </script>';
            }
        }else{
            echo '<script src="index.js"> </script>';
        }
    ?>
</body>

</html>
