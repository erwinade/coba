<?php

$data =`snmpget -v2c -c public 192.168.0.8 1.3.6.1.4.1.44`;
$data = substr($data,5,5);
echo $data;
