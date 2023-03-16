<?php
session_start();
if(isset($_SESSION["yonetici"]))
{
	include("../baglanti.php");
	$altkid	=	$_GET["altkategori_id"];
	$kategori_id	=	$_POST["kategori_id"];	
	$altkad	=	$_POST["altkategoriadi"];
	$guncelle	=	@mysql_query("UPDATE altkategori SET kategori_id=$kategori_id,altkategori_adi='$altkad' WHERE altkategori_id=$altkid",$baglanti);
	if($guncelle) header("location:altkategori-$altkid.html");
}
else
{
	header("location:giris.html");
}

?>