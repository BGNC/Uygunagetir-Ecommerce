<?php
session_start();
if(isset($_SESSION["yonetici"]))
{
	include("../baglanti.php");
	$indirim_orani	=	$_POST["indirim_orani"];
	$bas_tarih		=	$_POST["bas_tarih"];
	$bit_tarih		=	$_POST["bit_tarih"];
	$urun_id		=	$_POST["urun_id"];
	$degerler		=	implode(",",$urun_id);
	$tarih=date("Y-m-d");
	if($bas_tarih>=$tarih && $bit_tarih>=$tarih )
	{
		$guncelle		=	@mysql_query("UPDATE deger SET indirim_orani=$indirim_orani,bas_tarih='$bas_tarih',bit_tarih='$bit_tarih' WHERE urun_id IN($degerler)",$baglanti);
	if($guncelle) header("location:indirim-diger.html");
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