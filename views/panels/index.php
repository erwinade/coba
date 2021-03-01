<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Panel Info</h3>
        </div>
    </div>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" >
                            <thead>
                                <tr>
                                    <th colspan = "4" style="text-align:center" bgcolor="#00BFFF">PLN</th>
                                    <th colspan = "4" style="text-align:center" bgcolor="#00BFFF">GENSET</th>
                                </tr>
                            </thead>
                            <tbody class="rack-table">
                                <tr>
                                    <td rowspan="4" align="center" width="100"><img src="../../img/pln.png" width="200px" ></td>
                                    <td> Status PLN</td>
                                    <td colspan = "2" align="center"> ON</td>
                                    <td rowspan="4" align="center" width="100"><img src="../../img/genset.png" width="200px"></td>
                                    <td> Status GENSET</td>
                                    <td colspan = "2" align="center"> OFF</td>
                                    
                                </tr>
                                <tr>
                                    <td> Tegangan</td>
                                    <td> 230</td>
                                    <td width="10"> V</td>
                                    <td> Tegangan</td>
                                    <td> 0</td>
                                    <td width="100"> V</td>
                                </tr>
                                <tr>
                                    <td> Arus</td>
                                    <td> 100</td>
                                    <td width="100"> A</td>
                                    <td> Arus</td>
                                    <td> 0</td>
                                    <td width="100"> A</td>
                                </tr>
                                <tr>
                                    <td> Daya</td>
                                    <td> 555</td>
                                    <td width="100"> Watt</td>
                                    <td> Daya</td>
                                    <td> 0</td>
                                    <td width="100"> Watt</td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
    </div>
    <?php 
            $panel_cur = "";
            $i1 = "";
            $i2 = "";
            $i3 = "";
            $i4 = "";
            $location_cur = "";
            $v1 = "";
            $v2 = "";
            $v3 = "";
            $v4 = "";
            $p1 = "";
            $p2 = "";
            $p3 = "";
            $p4 = "";


            $sql = "SELECT *FROM tb_panel WHERE panel_type = 'current' and id_panel = '1'";
            $result = mysqli_query($conn,$sql);
            while($am = mysqli_fetch_array($result)){
            $panel_cur = $am['panel_name'];
            $location_cur = $am['location'];
            $i1 = $am['l1'];
            $i2 = $am['l2'];
            $i3 = $am['l3'];
            $i4 = $am['l4'];
            }
            $sql1 = "SELECT *FROM tb_panel WHERE panel_type = 'voltage' and id_panel = '1'";
            $result1 = mysqli_query($conn,$sql1);
            while($volt = mysqli_fetch_array($result1)){
            $panel_vol = $volt['panel_name'];
            $location_vol = $volt['location'];
            $v1 = $volt['l1'];
            $v2 = $volt['l2'];
            $v3 = $volt['l3'];
            $v4 = $volt['l4'];
            }
            $sql2 = "SELECT *FROM tb_panel WHERE panel_type = 'power' and id_panel = '1'";
            $result2 = mysqli_query($conn,$sql2);
            while($pow = mysqli_fetch_array($result2)){
            $panel_pow = $pow['panel_name'];
            $location_pow = $pow['location'];
            $p1 = $pow['l1'];
            $p2 = $pow['l2'];
            $p3 = $pow['l3'];
            $p4 = $pow['l4'];
            }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th bgcolor="#00BFFF">Electrical</th>
                                <th bgcolor="#00BFFF">Tag Name</th>
                                <th bgcolor="#00BFFF">Description</th>
                                <th bgcolor="#00BFFF">Location</th>
                                <th bgcolor="#00BFFF">R</th>
                                <th bgcolor="#00BFFF">S</th>
                                <th bgcolor="#00BFFF">T</th>
                                <th bgcolor="#00BFFF">AVG/Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--  tabel panel tampil Current-->
                            <tr>
                                <td bgcolor="#00BFFF">Current</td>
                                <td><?php echo $panel_cur;?></td>
                                <td>Current 3 Phase</td>
                                <td><?php echo $location_cur;?></td>
                                <td><?php echo $i1;?></td>
                                <td><?php echo $i2;?></td>
                                <td><?php echo $i3;?></td>
                                <td><?php echo $i4;?></td>
                            </tr>
                            <tr>
                                <td bgcolor="#00BFFF">Voltage</td>
                                <td><?php echo $panel_cur;?></td>
                                <td>Voltage 3 Phase</td>
                                <td><?php echo $location_cur;?></td>
                                <td><?php echo $v1;?></td>
                                <td><?php echo $v2;?></td>
                                <td><?php echo $v3;?></td>
                                <td><?php echo $v4;?></td>
                            </tr>
                            <tr>
                                <td bgcolor="#00BFFF">Power</td>
                                <td><?php echo $panel_cur;?></td>
                                <td>Power 3 Phase</td>
                                <td><?php echo $location_cur;?></td>
                                <td><?php echo $p1;?></td>
                                <td><?php echo $p2;?></td>
                                <td><?php echo $p3;?></td>
                                <td><?php echo $p4;?></td>
                            </tr>
                            <tr>
                                <td bgcolor="#DAA520">Kwh</td>
                                <td colspan="7" bgcolor="#F5F5DC" align="center">123456.678</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
    </div>
</div>