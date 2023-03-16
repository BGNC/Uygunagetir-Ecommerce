<?php
session_start();
if(isset($_SESSION["uye"]))
{
	include("baglanti.php");
	
	$urun_id	=	$_GET["urun_id"];	
	$adet		=	$_GET["a"];
	$kadi		=	$_SESSION["uye"];
	
	$uyegetir	=	mysql_fetch_array(mysql_query("SELECT * FROM uye WHERE kadi='$kadi'",$baglanti));
	$uye_id		=	$uyegetir[0];
	
	$urungetir	=	@mysql_fetch_array(@mysql_query("SELECT urun.satici_id,deger.fiyat,deger.indirim_orani,deger.bas_tarih,deger.bit_tarih FROM urun,deger WHERE urun.urun_id=$urun_id AND urun.urun_id=deger.urun_id",$baglanti));
	$satici_id	=	$urungetir[0];
	$fiyat		=	$urungetir[1];
	$bas_tarih	=	$urungetir[4];
	$bit_tarih	=	$urungetir[5];
	$i_orani	=	$urungetir[2];
	$b_tarih	=	date("Y-m-d");
	
	
	if($b_tarih<=$bas_tarih && $b_tarih>=$bit_tarih) $fiyat-=$fiyat*$i_orani/100;
	
	$sepeteat	=	mysql_query("INSERT INTO sepet values('NULL',$satici_id,$uye_id,$urun_id,$adet,$fiyat)",$baglanti);
	
}
else{
	 echo 1;
	 }
?>