<?php
session_start();
if(isset($_SESSION["yonetici"]))
{
	include("../baglanti.php");
	$id=$_GET["id"];
	$slidegetir=@mysql_query("SELECT * FROM slide WHERE id=$id",$baglanti);
	$kayit=@mysql_fetch_array($slidegetir);
	$resim=$kayit[3];
	$sil=unlink("../slide/".$resim);
	if($sil)
	{
		$sil2=@mysql_query("DELETE FROM slide WHERE id=$id",$baglanti);
		if($sil2) header("location:slider-duzenle.html");
	}
}
else
{
	header("location:giris.html");
}


?>