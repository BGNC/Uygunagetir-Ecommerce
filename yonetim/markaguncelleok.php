<?php

session_start();

if($_SESSION["yonetici"])

{

	include("../baglanti.php");

	$id=$_GET["marka_id"];

	$marka_adi=$_POST["markaadi"];

	$sil=@mysqli_query($baglanti,"UPDATE marka SET marka_adi='$marka_adi' WHERE marka_id=$id");

	if($sil) header("location:marka-$id.html");

}

else

{

	 header("location:giris.html");

}



?>