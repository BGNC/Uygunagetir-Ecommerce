<?php
include("baglanti.php");
session_start();
if(isset($_SESSION["uye"]))
{
	
	$satis_id=$_GET["satis_id"];
	$kargoadi=$_POST["kargoadi"];
	$kargokodu=$_POST["kargokodu"];
	
	 $guncelle	=	@mysql_query("UPDATE satis SET kargo_adi='$kargoadi',kargo_durum=1,kargo_kodu='$kargokodu' WHERE satis_id=$satis_id",$baglanti);
	
		if($guncelle)
		{ 
		header("location:index.php");
		}
}
else
{
	echo "hata".$guncelle;
	header("location:index.php");
}


?>