<!DOCTYPE html>
<html lang="en">

<?php 
    include 'head.php';
    include 'conn.php' ;
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
                        <h3 class="text-themecolor">Setting</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="card-header bg-info text-white">Device</div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <form method="post" action="aksi.php">
                                                            <div class="form-group">
                                                                <div>Device Name</div>
                                                                <input type="text" class="form-control" id="Username" required="required" name="device" placeholder="Device Name"/>
                                                            </div>
                                                            <button type="submit" name="dvc" class="btn btn-info">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="card-header bg-info text-white">Password</div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <form method="post" action="aksi.php">
                                                            <div class="form-group">
                                                                <div>Username</div>
                                                                <input type="text" class="form-control" id="Username" required="required" name="username" placeholder="Username"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <input type="password" class="form-control" id="Password" required="required" name="pass" placeholder="Password"/>
                                                            </div>
                                                            <button type="submit" name="pswd" class="btn btn-info">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="card-header bg-info text-white">Email</div>
                                                <div class="row">
                                                    <div class="col-lg-12">

                                                    <?php 
                                                        $sql	= 'select * from email';
                                                        $query5	= mysqli_query($conn,$sql);
                                                        while($internal = mysqli_fetch_array($query5))
                                                        {
                                                            $id = $internal['id'];
                                                            $emailname = $internal['email_name'];
                                                            $email = $internal['email_user'];
                                                            $email_to = $internal['email_to'];
                                                            $smtp = $internal['smtp'];
                                                            $smtps = $internal['smtps'];
                                                            $port = $internal['port'];
                                                            $pswd = $internal['password'];
                                                    ?>
                                                    <form method='post' action='aksi.php'>
                                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                                <tr>
                                                                    <th>Nama</th>
                                                                    <td><input type="text" class="form-control" id="Emailname" required="required" name="emailname" placeholder="<?php echo $emailname; ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email Sender</th>
                                                                    <td><input type="text" class="form-control" id="Email_user" required="required" name="email_user" placeholder="<?php echo $email; ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email Recipient</th>
                                                                    <td><input type="text" class="form-control" id="Email_to" required="required" name="email_to" placeholder="<?php echo $email_to; ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Password</th>
                                                                    <td><input type="password" class="form-control" id="Pswd" required="required" name="pswd" placeholder="***********"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>SMPT</th>
                                                                    <td><input type="text" class="form-control" id="Smtp" required="required" name="smtp" placeholder="<?php echo $smtp; ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Port</th>
                                                                    <td><input type="text" class="form-control" id="Port" required="required" name="port" placeholder="<?php echo $port; ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>SMPTS</th>
                                                                    <td><input type="text" class="form-control" id="Smtps" required="required" name="smtps" placeholder="<?php echo $smtps; ?>"></td>
                                                                </tr>
                                                            </tbody>
                                                            <?php
                                                                }
                                                            ?>
                                                        </table>
                                                        <br>
                                                        <button type="submit" name="email" class="btn btn-info">Submit</button>
                                                    </form>
                                                    <br>
                                                    <button type="submit" onclick="window.location.href='mail.php'" class="btn btn-info">Email Check</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="card-header bg-info text-white">Telegram</div>
                                                <div class="row">
                                                    <div class="col-lg-12">

                                                    <?php 
                                                        $sql	= 'select * from telegram';
                                                        $query5	= mysqli_query($conn,$sql);
                                                        while($internal = mysqli_fetch_array($query5))
                                                        {
                                                            $id = $internal['id'];
                                                            $description = $internal['name'];
                                                            $bot = $internal['bot_id'];
                                                    ?>
                                                    <form method="post" action="aksi.php">
                                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                                <tr>
                                                                    <th>Nama</th>
                                                                    <td><input type="text" class="form-control" id="Telename" required="required" name="telename" placeholder="<?php echo $description; ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Bot_Id</th>
                                                                    <td><input type="text" class="form-control" id="Bot" required="required" name="bot" placeholder="<?php echo $bot; ?>"></td>
                                                                </tr>
                                                            </tbody>
                                                            <?php
                                                                }
                                                            ?>
                                                        </table>
                                                        <br>
                                                        <button type="submit" name="tele" class="btn btn-info">Submit</button>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
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