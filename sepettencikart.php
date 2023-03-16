<?php
session_start();
if($_SESSION["uye"])
{
	include("baglanti.php");
	$id=$_GET["id"];
	$sil=@mysql_query("DELETE FROM sepet WHERE sepet_id=$id",$baglanti);
	if($sil) header("location:index.php?url=sepet");
}


?>