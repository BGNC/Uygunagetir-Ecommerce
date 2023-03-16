<?php
session_start();
if($_SESSION["yonetici"])
{
	include("../baglanti.php");
	$kid	=	$_GET["kategori_id"];
	$kadi	=	$_POST["kategoriadi"];
	$guncelle=mysql_query("UPDATE kategori SET kategori_adi='$kadi' WHERE kategori_id=$kid",$baglanti);
	if($guncelle) header("location:kategori-$kid.html");
}


?>