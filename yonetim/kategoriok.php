<?php
session_start();
if(isset($_SESSION["yonetici"]))
{
	
	include("../baglanti.php");
	$kategriad=$_POST["kategori"];
	$kaydet=@mysql_query("INSERT INTO kategori values(NULL,'$kategriad')",$baglanti);
	if($kaydet) header("location:kategori-ekle.html");
	
}
else
{
	header("location:giriş.html");
}


?>