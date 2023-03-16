<?php
session_start();
if(isset($_SESSION["uye"]))
{
	include("baglanti.php");
	$uye_id=$_GET["uye_id"];
	$ad=$_POST["ad"];
	$soyad=$_POST["soyad"];
	$tel=$_POST["tel"];
	$email=$_POST["email"];
	$adres=$_POST["adres"];
	$bhesap=$_POST["bhesapno"];
	
	$guncelle=@mysql_query("UPDATE uye SET ad='$ad',soyad='$soyad',tel='$tel',email='$email',adres='$adres',bankahesapno='$bhesap' WHERE uyeid=$uye_id");
	if($guncelle) header("location:index.php?url=hesapayar");
}
else
{
	header("location:index.php");
}
?>