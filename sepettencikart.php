<?php
session_start();
if($_SESSION["uye"])
{
	include("baglanti.php");
	$id=$_GET["id"];
	$sil=@mysqli_query($baglanti,"DELETE FROM sepet WHERE sepet_id=$id");
	if($sil) header("location:index.php?url=sepet");
}


?>