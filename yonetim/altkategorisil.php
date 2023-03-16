<?php
session_start();
if($_SESSION["yonetici"])
{
	include("../baglanti.php");
	$kid=$_GET["kategori_id"];
	$sil=mysql_query("DELETE FROM altkategori WHERE altkategori_id=$kid",$baglanti);
	if($sil) header("location:altkategori-ekle.html");	
}
else
{
	header("location:giris.html");
}


?>