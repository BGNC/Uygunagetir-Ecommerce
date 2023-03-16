<?php
ob_start();
$baglanti	=	@mysqli_connect("localhost","root","","uygunagetir") or die("Mysql Bağlantısı Kurulamadı");
// $db			=	@mysqli_select_db("uygunagetir",$baglanti) or die("Veritabanı Bağlantısı Kurulamadı");

@mysqli_query("SET NAMES 'utf8'");

$siteayar	=	mysqli_fetch_array(@mysqli_query("select * from ayar",$baglanti));
$site_title	=	$siteayar[1];
$site_description	=	$siteayar[2];
$site_keywords	=	$siteayar[3];	

function seo($deger){

	$eski=array(' ','ı','ç','ö','ü','ğ','ş','İ','Ş','Ç','Ö','Ü','Ğ');
	$yeni=array('-','i','c','o','u','g','s','I','S','C','O','U','G');

	return str_replace($eski, $yeni, $deger);



}	

	
?>