<?php

session_start();

if($_SESSION["yonetici"])

{

	include("../baglanti.php");

	$kid=$_GET["kategori_id"];

	$sil=mysqli_query($baglanti,"DELETE FROM altkategori WHERE altkategori_id=$kid");

	if($sil) header("location:altkategori-ekle.html");	

}

else

{

	header("location:giris.html");

}





?>