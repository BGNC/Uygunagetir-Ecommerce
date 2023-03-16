<?php
session_start();
if(isset($_SESSION["yonetici"]))
{
	include("../baglanti.php");
	$indirim_orani	=	$_POST["indirim_orani"];
	$bas_tarih		=	$_POST["bas_tarih"];
	$bit_tarih		=	$_POST["bit_tarih"];
	$tarih=date("Y-m-d");
	if($bas_tarih>=$tarih && $bit_tarih>=$tarih )
	{
		$guncelle		=	@mysql_query("UPDATE deger SET indirim_orani=$indirim_orani,bas_tarih='$bas_tarih',bit_tarih='$bit_tarih' WHERE deger_id>0 ",$baglanti);
	if($guncelle)header("location:indirim-tum-urunler.html");	
	}
	else
	{
		echo "TARİH DEĞERLERİNİ DÜZGÜN GİRİNİZ";
	}
	
	
}
else
{
	header("location:giris.html");
}

?>