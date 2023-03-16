<?php
session_start();
if($_SESSION["yonetici"])
{
	include("../baglanti.php");
	$id=$_GET["marka_id"];
	$marka_adi=$_POST["markaadi"];
	$sil=@mysql_query("UPDATE marka SET marka_adi='$marka_adi' WHERE marka_id=$id",$baglanti);
	if($sil) header("location:marka-$id.html");
}
else
{
	 header("location:giris.html");
}

?>