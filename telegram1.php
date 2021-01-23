<?php
	$url1=$_SERVER['REQUEST_URI'];
	header("Refresh: 5; URL=$url1");

  /////////////////////////SLG//////////////////
  $RakA = "Baik";
  $RakB = "Baik";
  $RServer = "Baik";

  $suhu3=23;
  $lembab3=55;
  $gas3=50;
  $water = 0;

  //--- SNMP Proses---//
  			$gas1 = `snmpget -v1 -c public 192.168.0.215 1.3.6.1.4.1.43`;
  			$gas = substr($gas1,-4);

  			$suhu1 = `snmpget -v1 -c public 192.168.0.215 1.3.6.1.4.1.44`;
  			$suhu = substr($suhu1,-3) ;
$suhu = $suhu * 1 ;
  			$lembab1 = `snmpget -v1 -c public 192.168.0.215 1.3.6.1.4.1.45`;
  			$lembab = substr($lembab1,-3)*1 ;
  // --- ---//
  			$gas2 = `snmpget -v1 -c public 192.168.0.216 1.3.6.1.4.1.43`;
  			$gas2 = substr($gas2,-4);

  			$suhu2 = `snmpget -v1 -c public 192.168.0.216 1.3.6.1.4.1.44`;
  			$suhu2 = substr($suhu2,-3)*1 ;

  			$lembab2 = `snmpget -v1 -c public 192.168.0.216 1.3.6.1.4.1.45`;
  			$lembab2 = substr($lembab2,-3)*1 ;
  // --- ---//
  			$gas3 = `snmpget -v1 -c public 192.168.0.217 1.3.6.1.4.1.43`;
  			$gas3 = substr($gas3,-4);

  			$suhu3 = `snmpget -v1 -c public 192.168.0.217 1.3.6.1.4.1.44`;
  			$suhu3 = substr($suhu3,-3)*1;

  			$lembab3 = `snmpget -v1 -c public 192.168.0.217 1.3.6.1.4.1.45`;
  			$lembab3 = substr($lembab3,-3)*1 ;

			  $water = `snmpget -v1 -c public 192.168.0.222 1.3.6.1.4.1.43`;
          $water = 20 - substr($water,-3);
//////////////////////////ENDSLG///////////////
if ($water < 0) {$water = 5;}
  $minute = date('i');
  $hour 	= date('h');

  $arus1 = 80;
  $arus2 = 28;
  $arus3 = 39;

  // PLN
  $arus1 = `snmpget -v1 -c public 192.168.0.219 1.3.6.1.4.1.45`;
  $arus1 = substr($arus1,-5);
  $arus1 = $arus1 /100;
  //$arus1 - $arus1 - 0.3;
  $dayaaktif = $arus1 * 176;
  $dayaaktif = substr(number_format($dayaaktif, 3, '.', ''), 0, -1);
  $dayatampak = $arus1 * 210;
  $dayatampak = substr(number_format($dayatampak, 3, '.', ''), 0, -1);

  // rak server a
  $arus2 = `snmpget -v1 -c public 192.168.0.220 1.3.6.1.4.1.45`;
  $arus2 = substr($arus2,-5);
  $arus2 = $arus2 / 100;
  $dayaaktif2 = $arus2 * 176;
  $dayaaktif2 = substr(number_format($dayaaktif2, 3, '.', ''), 0, -1);
  $dayatampak2 = $arus2 * 210;
  $dayatampak2 = substr(number_format($dayatampak2, 3, '.', ''), 0, -1);

  // rak server b
  $arus3 = `snmpget -v1 -c public 192.168.0.218 1.3.6.1.4.1.45`;
  $arus3 = substr($arus3,-5);
  $arus3 = $arus3 / 100;
  $dayaaktif3 = $arus3 * 176;
  $dayaaktif3 = substr(number_format($dayaaktif3, 3, '.', ''), 0, -1);
  $dayatampak3 = $arus3 * 210;
  $dayatampak3 = substr(number_format($dayatampak3, 3, '.', ''), 0, -1);
  $ppm = " ppm";
  $rak_server = "Rak Server \n        arus = " . $arus1 . "  A\n        daya aktif = " .$dayaaktif ." watt\n        daya tampak = " .$dayatampak. " watt\n        temperature = " .$suhu. "C \n        humidity = " .$lembab ;
  $rak_storage = "Storage\n       arus = " . $arus2 . " A\n        daya aktif = " .$dayaaktif2 ." watt\n        daya tampak = " .$dayatampak2. " watt\n        temperature = " .$suhu2. " C\n        humidity = " .$lembab2;
  $pln = "PLN\n       arus = " . $arus3 . " A\n        daya aktif = " .$dayaaktif3 ." watt\n        daya tampak = ". $dayatampak3 . " watt";
  $ruang_server = "Ruang Server\n         temperature = " .$suhu3. " C\n        humidity = " .$lembab3. "\n        water = ".$water." cm" ;


  $data = "Nilai Sensor ---->> \n\nRak Server \n        arus = " .
  $arus1 . "  A\n        daya aktif = " .
  $dayaaktif ." watt\n        daya tampak = " .
  $dayatampak. " watt\n        temperature = $suhu C \n        humidity = " .
  $lembab. " % \n Rak Storage\n       arus = " .
  $arus2 . " A\n        daya aktif = " .
  $dayaaktif2 ." watt\n        daya tampak = " .
  $dayatampak2. " watt\n        temperature = " .
  $suhu2. " C\n        humidity = " .
  $lembab2. " %\n PLN\n       arus = " .
  $arus3 . " A \n        daya aktif = " .
  $dayaaktif3 ." watt \n        daya tampak = ".
  $dayatampak3. " watt\n Ruang Server\n         temperature = " .
  $suhu3. " C\n        humidity = " .
  $lembab3. " %\n        water = " .$water." cm";

/*
BOT PENGANTAR
Materi EBOOK: Membuat Sendiri Bot Telegram dengan PHP
Ebook live http://telegram.banghasan.com/
oleh: bang Hasan HS
id telegram: @hasanudinhs
email      : banghasan@gmail.com
twitter    : @hasanudinhs
disampaikan pertama kali di: Grup IDT
dibuat: Juni 2016, Ramadhan 1437 H
nama file : PertamaBot.php
change log:
revisi 1 [15 Juli 2016] :
+ menambahkan komentar beberapa line
+ menambahkan kode webhook dalam mode comment
Pesan: baca dengan teliti, penjelasan ada di baris komentar yang disisipkan.
Bot tidak akan berjalan, jika tidak diamati coding ini sampai akhir.
*/
//isikan token dan nama botmu yang di dapat dari bapak bot :
$TOKEN      = "966913181:AAGVeHffWOINJ1F4jJex2irD1JYj8h6VP0Q";
$usernamebot= "kemendagri"; // sesuaikan besar kecilnya, bermanfaat nanti jika bot dimasukkan grup.
// aktifkan ini jika perlu debugging
$debug = false;

// fungsi untuk mengirim/meminta/memerintahkan sesuatu ke bot
function request_url($method)
{
    global $TOKEN;
    return "https://api.telegram.org/bot" . $TOKEN . "/". $method;
}

// fungsi untuk meminta pesan
// bagian ebook di sesi Meminta Pesan, polling: getUpdates

// fungsi untuk mebalas pesan,
// bagian ebook Mengirim Pesan menggunakan Metode sendMessage
function send_reply($chatid, $msgid, $text)
{
    global $debug;
    $data = array(
        'chat_id' => $chatid,
        'text'  => $text,
        'reply_to_message_id' => $msgid   // <---- biar ada reply nya balasannya, opsional, bisa dihapus baris ini
    );
    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents(request_url('sendMessage'), false, $context);
    if ($debug)
        print_r($result);
}

// fungsi mengolahan pesan, menyiapkan pesan untuk dikirimkan
function create_response($text, $message)
{
    global $usernamebot;
    // inisiasi variable hasil yang mana merupakan hasil olahan pesan
    $hasil = '';
    $fromid = $message["from"]["id"]; // variable penampung id user
    $chatid = $message["chat"]["id"]; // variable penampung id chat
    $pesanid= $message['message_id']; // variable penampung id message
    // variable penampung username nya user
    isset($message["from"]["username"])
        ? $chatuser = $message["from"]["username"]
        : $chatuser = '';

    // variable penampung nama user
    isset($message["from"]["last_name"])
        ? $namakedua = $message["from"]["last_name"]
        : $namakedua = '';
    $namauser = $message["from"]["first_name"]. ' ' .$namakedua;
    // ini saya pergunakan untuk menghapus kelebihan pesan spasi yang dikirim ke bot.
    $textur = preg_replace('/\s\s+/', ' ', $text);
    // memecah pesan dalam 2 blok array, kita ambil yang array pertama saja
    $command = explode(' ',$textur,2); //
   // identifikasi perintah (yakni kata pertama, atau array pertamanya)
    switch ($command[0]) {
        // jika ada pesan /id, bot akan membalas dengan menyebutkan idnya user
        case '/id':
        case '/id'.$usernamebot : //dipakai jika di grup yang haru ditambahkan @usernamebot
            $hasil = "$namauser, ID kamu adalah $fromid";
            break;

        case '/status':
        case '/status'.$usernamebot : //dipakai jika di grup yang haru ditambahkan @usernamebot
            $hasil = $GLOBALS['data'];
            break;

        // jika ada permintaan waktu
        case '/rakserver':
        case '/rakserver'.$usernamebot :
            $hasil  = $GLOBALS['rak_server'];
            break;

        case '/rakstorage':
        case '/rakstorage'.$usernamebot :
            $hasil  = $GLOBALS['rak_storage'];
            break;

        case '/pln':
        case '/pln'.$usernamebot :
            $hasil  = $GLOBALS['pln'];
            break;

        case '/ruangserver':
        case '/ruangserver'.$usernamebot :
            $hasil  = $GLOBALS['ruang_server'];
            break;
        case '/help':
        case '/help'.$usernamebot :
            $hasil  = "selamat datang di Data Center WWF \n terdiri dari 2 sensor pada rak server \n 1 sensor ruang server \n 3 sensor untuk panel listrik \n 1 sensor water level \n untuk mengetahui informasi sensor ketik : \n /rakserver = sensor rak server \n /rakstorage = sensor rak storage \n /pln = sensor kelistrikan \n /ruangserver = sensor ruang server";
            break;
        // balasan default jika pesan tidak di definisikan
        default:
            $hasil = 'maaf command tidak ditemukan, ketik /help.';
            break;
    }
    return $hasil;
}

// jebakan token, klo ga diisi akan mati
// boleh dihapus jika sudah mengerti
if (strlen($TOKEN)<20)
    die("407639767:AAFFiRVJ-b6uWP5PyfC1vytr6h54638cVT0!\n");
// fungsi pesan yang sekaligus mengupdate offset
// biar tidak berulang-ulang pesan yang di dapat
function process_message($message)
{
    $updateid = $message["update_id"];
    $message_data = $message["message"];
    if (isset($message_data["text"])) {
    $chatid = $message_data["chat"]["id"];
        $message_id = $message_data["message_id"];
        $text = $message_data["text"];
        $response = create_response($text, $message_data);
        if (!empty($response))
          send_reply($chatid, $message_id, $response);
    }
    return $updateid;
}

// hapus baris dibawah ini, jika tidak dihapus berarti kamu kurang teliti!
//die("Mohon diteliti ulang codingnya..\nERROR: Hapus baris atau beri komen line ini yak!\n");

// hanya untuk metode poll
// fungsi untuk meminta pesan
// baca di ebooknya, yakni ada pada proses 1

// metode poll
// proses berulang-ulang
// sampai di break secara paksa

function get_updates($offset)
{
    $url = request_url("getUpdates")."?offset=".$offset;
        $resp = file_get_contents($url);
        $result = json_decode($resp, true);
        if ($result["ok"]==1)
            return $result["result"];
        return array();
}

function process_one()
{
    global $debug;
    $update_id  = 0;
    echo "-";

    if (file_exists("last_update_id"))
        $update_id = (int)file_get_contents("last_update_id");

    $updates = get_updates($update_id);
    // jika debug=0 atau debug=false, pesan ini tidak akan dimunculkan
    if ((!empty($updates)) and ($debug) )  {
        echo "\r\n===== isi diterima \r\n";
        print_r($updates);
    }
    foreach ($updates as $message) {
      # code...

        echo '+';
        $update_id = process_message($message);
    }
    // update file id, biar pesan yang diterima tidak berulang
    file_put_contents("last_update_id", $update_id + 1);
}


    process_one();

// metode webhook
// secara normal, hanya bisa digunakan secara bergantian dengan polling
// aktifkan ini jika menggunakan metode webhook
/*
$entityBody = file_get_contents('php://input');
$pesanditerima = json_decode($entityBody, true);
process_message($pesanditerima);
*/
/*
 * -----------------------
 * Grup @botphp
 * Jika ada pertanyaan jangan via PM
 * langsung ke grup saja.
 * ----------------------

* Just ask, not asks for ask..
Sekian.
*/

?>
