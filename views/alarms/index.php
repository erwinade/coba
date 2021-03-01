<div class="container-fluid">                
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Alarm Info</h3>
            </div>
        </div>
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="card-header bg-info text-white">Alarm Logs</div>
                        <table class="table table-striped" >
                        <thead>
                                <tr>
                                    <th width="5">No</th>
                                    <th width="420">Description</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>Status</th>
                                    <th>Timestamp</th>
                                </tr>
                            </thead>
                            <?php 
                                $no=0;
                                $sql	= 'SELECT *FROM alarm_logs ORDER BY created_at DESC';
                                $query	= mysqli_query($conn,$sql);
                                while($data = mysqli_fetch_array($query))
                                {
                                    $no++;
                                    $id = $no;
                                    $description = $data['sens_name'];
                                    $type = $data['sens_type'];
                                    $sens_value = $data['sens_value'];
                                    $status = $data['status_sensor'];
                                    $timestamp = $data['created_at'];
                            ?>
                            <tbody class="rack-table">
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $description; ?></td>
                                    <td><?php echo $type; ?></td>
                                    <td><?php echo $sens_value; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td><?php echo $timestamp; ?></td>
                                </tr>
                            </tbody>     
                            <?php
                                }
                            ?> 
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>