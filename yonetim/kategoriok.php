<?php

session_start();

if(isset($_SESSION["yonetici"]))

{

	

	include("../baglanti.php");

	$kategriad=$_POST["kategori"];

	$kaydet=@mysqli_query($baglanti,"INSERT INTO kategori values(NULL,'$kategriad')");

	if($kaydet) header("location:kategori-ekle.html");

	

}

else

{

	header("location:giriş.html");

}





?>