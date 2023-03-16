<?php

session_start();

if(isset($_SESSION["yonetici"]))

{

	include("../baglanti.php");

	$markaadi=$_POST["markaadi"];

	$kaydet=@mysqli_query($baglanti,"INSERT INTO marka values(NULL,'$markaadi')");

	if($kaydet) header("location:marka.html");

}

else

{

	header("location:index.html");

}

?>