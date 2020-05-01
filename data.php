<?php
include('db.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//header("Content-Type: application/json; charset=UTF-8");

//$query = "INSERT INTO `sayilar` (`id`, `sayi`) VALUES (NULL, '1')";

$dbh = new PDO('mysql:host=localhost;dbname=uzma9833_test', 'uzma9833_test', 'w&9P@EZt');
$sure_baslangici = microtime(true);
/*
for ($i = 1; $i <= 20000; $i++) {
   $dbh->query("INSERT INTO `a` (`id`, `sayi`) VALUES (NULL, $i )");
}
*/

foreach($dbh->query('SELECT sayi from b') as $row) {
        echo '<!--' . $row['sayi'] . "-->";
    }
    $dbh = null;
?>

<html>
	<head>

	</head>

	<body id="">


<?php
$sure_bitimi = microtime(true);
$sure = $sure_bitimi - $sure_baslangici;
echo '<div style="float:left;display:block;font-size:24px;color:red;">';
echo "<br>Bekleme süresi: $sure saniye.\n";

//PHP kodlarına ayrılan belleğin miktarını bayt cinsinden döndürür.
echo 'Hafıza kullanımı: ',round(memory_get_peak_usage()/1048576, 2), 'MB';

echo '</div>';




//echo 'B: Bekleme süresi 32.527951002121 saniye.Hafıza kullanımı: 0.42MB';
//echo 'A: Bekleme süresi: 4.7425818443298 saniye.Hafıza kullanımı: 0.42MB';




/*
foreach($dbh->query('SELECT * from sayilar') as $row) {
        print_r($row);
    }
    $dbh = null;
*/










/*
$dizi = [];
$dizi['hayvan'] = "köpek";
$dizi['sayi'] = "1";
$dizi['renk'] = "mavi";

$dizi['insan'][0]['isim'] = "salih";
$dizi['insan'][0]['soyisim'] = "önder";
$dizi['insan'][1]['isim'] = "ismail";
$dizi['insan'][1]['soyisim'] = "önder2";
 echo json_encode($dizi);
*/

?>
</body>
</html>

