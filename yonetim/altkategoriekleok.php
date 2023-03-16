<?php
session_start();
if(isset($_SESSION["yonetici"]))
{
	include("../baglanti.php");
	$kid	=	$_POST["kategori_id"];
	$kadi	=	$_POST["kategoriadi"];
	$kaydet	=	@mysql_query("INSERT INTO altkategori values(NULL,$kid,'$kadi')",$baglanti);
	if($kaydet) header("location:altkategori-ekle.html");
	
}
else
{
	header("location:giris.html");
}

?>