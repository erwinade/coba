<?php 
    date_default_timezone_set('Asia/Jakarta');
    include 'conn.php';

    $sql	= 'select * from device';
    $query	= mysqli_query($conn,$sql);
    while($data = mysqli_fetch_array($query))
    {
        $unit = $data['unit'];
    }
?>
<table >
                            <tr>
                                <td>Unit: <?php echo $unit;?> Model: MONSiS 8-THD</td>
                            </tr>
                            <tr>
                                <td>Up Time: 234 days, 20 hours, 15 minute </td>
                            </tr>
                            <tr>
                                <td>Current Time: <?php echo date('H:i:s  d-M-Y'); ?></td>
                            </tr>
    </table>