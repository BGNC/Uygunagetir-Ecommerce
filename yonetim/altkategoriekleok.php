<?php

session_start();

if(isset($_SESSION["yonetici"]))

{

	include("../baglanti.php");

	$kid	=	$_POST["kategori_id"];

	$kadi	=	$_POST["kategoriadi"];

	$kaydet	=	@mysqli_query($baglanti,"INSERT INTO altkategori values(NULL,$kid,'$kadi')");

	if($kaydet) header("location:altkategori-ekle.html");

	

}

else

{

	header("location:giris.html");

}



?>