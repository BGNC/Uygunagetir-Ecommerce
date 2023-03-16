<?php
session_start();
if(isset($_SESSION["uye"]))
{
	include("baglanti.php");
	$id=$_GET["id"];
	$guncelle=@mysql_query("UPDATE urun SET gorunum=0 WHERE urun_id=$id",$baglanti);
	if($guncelle)header("location:index.php?url=urunlerim");
}
else
{
	header("location:index.php");
}
?>