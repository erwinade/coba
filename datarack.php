<?php 
header("refresh: 5;");
class datarackjakarta{

    public function run()
    {

        $idsuhu1 = 1;
        $idsuhu2 = 2;
        $idsuhuluar = 3;
        $idFan = 4;
        $idCool = 5;
        $idAC = 6;
        $idBatre = 7;
        $idinputvol = 8;
        $idupsload = 9;
        $idUps = 10;
        $idfrontdoor = 11;
        $idbackdoor = 12;
        $idSuppllyAir = 27;
        $idReturnAir = 28;
        $idsuhubawah = 30;
        $idsuhuatas = 29;
        
        /*
        $suhu1 = `snmpget -v1 -c public 192.168.1.252 AIRSYS-BR-MIB-V2::frontTemp.0`;
        $suhu1 = substr($suhu1,-4);
        $suhu1 = floatval($suhu1)/10;
        
        $suhu2 = `snmpget -v1 -c public 192.168.1.252 AIRSYS-BR-MIB-V2::backTemp.0`;
        $suhu2 = substr($suhu2,-4);
        $suhu2 = floatval($suhu2)/10;

        $inputvol = `snmpget -v1 -c public 192.168.1.252 AIRSYS-BR-MIB-V2::ups1InputVoltage.0`;
        $inputvol = substr($inputvol,-5);
        $inputvol = floatval($inputvol)/10;
        
        $upsload = `snmpget -v1 -c public 192.168.1.252 AIRSYS-BR-MIB-V2::ups1LoadPercent.0`;
        $upsload = substr($upsload,47,5);
        $upsload = floatval($upsload)/10;

        $frontdoor = `snmpget -v1 -c public 192.168.1.252 AIRSYS-BR-MIB-V2::frontDoorOpenAlarm`;
        $frontdoor = substr($frontdoor,47,5);

        $backdoor = `snmpget -v1 -c public 192.168.1.252 AIRSYS-BR-MIB-V2::backDoorOpenAlarm`;
        $backdoor = substr($backdoor,47,5);
        //echo $frontdoor;
        */

        $suhu1 = 24;
        $suhu2 = 29;
        $inputvol1 = 230;
        $inputvol2 = 50;
        $upsload = 24;
        $frontdoor = 0;
        $backdoor = 0;
        $suhuluar = 28.90;
        $Fan =0;
        $Cool = 1;
        $AC = 1;
        $Batre1 = 240;
        $Batre2 = 20;
        $SuppllyAir = 19.23;
        $ReturnAir = 26.20;
        $suhuatas = 22;
        $suhubawah = 16;

        $inputvol = $inputvol1."|".$inputvol2;
        $Batre = $Batre1."|".$Batre2;
        
        $array = [
            $idsuhu1=>$suhu1,
            $idsuhu2=>$suhu2,
            $idsuhuluar=>$suhuluar,
            $idFan=>$Fan,
            $idCool=>$Cool,
            $idAC=>$AC,
            $idinputvol=>$inputvol,
            $idBatre=>$Batre,
            $idupsload=>$upsload,
            $idfrontdoor=>$frontdoor,
            $idbackdoor=>$backdoor,
            $idSuppllyAir=>$SuppllyAir,
            $idReturnAir=>$ReturnAir,
            $idsuhuatas=>$suhuatas,
            $idsuhubawah=>$suhubawah
            ];
        
        
        foreach ($array as $key => $value) {
            $data = array(
                'sensor_type_id'=>1,
                'sensor_id' => $key,
                'avg_sensor' => $value,
                'is_new'=>1
            );
            # Create a connection
            $url = 'https://sejatioutdoor.com/sensors';
            $ch = curl_init($url);
            # Form data string
            $postString = http_build_query($data, '', '&');
            # Setting our options
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            # Get the response
            $response = curl_exec($ch);
            curl_close($ch);
            
            echo $response . "</br>";
        }
    }
}

$datarackjakarta = new datarackjakarta();
$datarackjakarta->run();

?>