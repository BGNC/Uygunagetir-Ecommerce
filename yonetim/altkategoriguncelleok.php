<?php

session_start();

if(isset($_SESSION["yonetici"]))

{

	include("../baglanti.php");

	$altkid	=	$_GET["altkategori_id"];

	$kategori_id	=	$_POST["kategori_id"];	

	$altkad	=	$_POST["altkategoriadi"];

	$guncelle	=	@mysqli_query($baglanti,"UPDATE altkategori SET kategori_id=$kategori_id,altkategori_adi='$altkad' WHERE altkategori_id=$altkid");

	if($guncelle) header("location:altkategori-$altkid.html");

}

else

{

	header("location:giris.html");

}



?>