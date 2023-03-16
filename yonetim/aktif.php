<?php
session_start();
if(isset($_SESSION["yonetici"]))
{
	include("../baglanti.php");
	$id=$_GET["id"];
	$guncelle=@mysqli_query($baglanti,"UPDATE urun SET gorunum=1 WHERE urun_id=$id");
	if($guncelle)header("location:index.php");
}
else
{
	header("location:giris.php");
}
?>