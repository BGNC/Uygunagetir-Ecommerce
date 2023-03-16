<?php

session_start();

if(isset($_SESSION["yonetici"]))

{

	include("../baglanti.php");

	$satis_id=$_GET["satis_id"];

	$durum=$_GET["durum"];

	$guncelle=@mysqli_query($baglanti,"UPDATE satis SET kargo_durum=$durum WHERE satis_id=$satis_id");

	if($guncelle) header("location:siparisler.html");

}

else

{

	header("location:giris.html");

}



?>