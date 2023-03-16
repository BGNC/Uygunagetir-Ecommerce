<?php
session_start();
if(isset($_SESSION["uye"]))
{
	include("baglanti.php");
	
	$urun_id	=	$_GET["urun_id"];	
	$adet		=	$_GET["a"];
	$kadi		=	$_SESSION["uye"];
	
	$uyegetir	=	mysqli_fetch_array(mysqli_query($baglanti,"SELECT * FROM uye WHERE kadi='$kadi'"));
	$uye_id		=	$uyegetir[0];
	
	$urungetir	=	@mysqli_fetch_array(@mysqli_query($baglanti,"SELECT urun.satici_id,deger.fiyat,deger.indirim_orani,deger.bas_tarih,deger.bit_tarih FROM urun,deger WHERE urun.urun_id=$urun_id AND urun.urun_id=deger.urun_id"));
	$satici_id	=	$urungetir[0];
	$fiyat		=	$urungetir[1];
	$bas_tarih	=	$urungetir[4];
	$bit_tarih	=	$urungetir[5];
	$i_orani	=	$urungetir[2];
	$b_tarih	=	date("Y-m-d");
	
	
	if($b_tarih<=$bas_tarih && $b_tarih>=$bit_tarih) $fiyat-=$fiyat*$i_orani/100;
	
	$sepeteat	=	mysqli_query($baglanti,"INSERT INTO sepet values('NULL',$satici_id,$uye_id,$urun_id,$adet,$fiyat)");
	
}
else{
	 echo 1;
	 }
?>