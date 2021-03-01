<div class="container-fluid">
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
                                                    $token = $internal['token'];
                                            ?>
                                            <form method="post" action="aksi.php">
                                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <tr>
                                                            <th>Nama</th>
                                                            <td><input type="text" class="form-control" id="Telename" required="required" name="telename" placeholder="<?php echo $description; ?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Token</th>
                                                            <td><input type="text" class="form-control" id="Token" required="required" name="token" placeholder="<?php echo $token; ?>"></td>
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
    </div>