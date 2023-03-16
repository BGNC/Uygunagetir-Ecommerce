<?php
session_start();
if(isset($_SESSION["yonetici"]))
{
	include("../baglanti.php");
	$markaadi=$_POST["markaadi"];
	$kaydet=@mysql_query("INSERT INTO marka values(NULL,'$markaadi')",$baglanti);
	if($kaydet) header("location:marka.html");
}
else
{
	header("location:index.html");
}
?>