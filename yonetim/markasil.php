<?php

session_start();

if($_SESSION["yonetici"])

{

	include("../baglanti.php");

	$id=$_GET["marka_id"];

	$sil=@mysqli_query($baglanti,"DELETE FROM marka WHERE marka_id=$id");

	if($sil) header("location:marka.html");

}

else

{

	 header("location:giris.html");

}



?>