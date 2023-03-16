<?php

session_start();

if($_SESSION["yonetici"])

{

	include("../baglanti.php");

	$kid	=	$_GET["kategori_id"];

	$kadi	=	$_POST["kategoriadi"];

	$guncelle=mysqli_query($baglanti,"UPDATE kategori SET kategori_adi='$kadi' WHERE kategori_id=$kid");

	if($guncelle) header("location:kategori-$kid.html");

}





?>