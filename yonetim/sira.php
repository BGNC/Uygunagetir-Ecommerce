<?php

require_once("../baglanti.php");

parse_str($_POST["data"],$sira);

$rows = $sira["sira"];

foreach ($rows as $key => $value) {
	
	$duzenle = mysqli_query($baglanti,"UPDATE urun SET sira=$key WHERE urun_id=$value");
}

?>