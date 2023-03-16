<?php
session_start();
if(isset($_SESSION["yonetici"]))
{
	include("../baglanti.php");
	$kategori_id	=	$_POST["kategori_id"];
	$altkategori_id	=	$_POST["altkategori_id"];
	$indirim_orani	=	$_POST["indirim_orani"];
	$bas_tarih		=	$_POST["bas_tarih"];
	$bit_tarih		=	$_POST["bit_tarih"];
	$tarih=date("Y-m-d");
	
	if($bas_tarih>=$tarih && $bit_tarih>=$tarih )
	{
		$sql="UPDATE deger SET indirim_orani=$indirim_orani,bas_tarih='$bas_tarih',bit_tarih='$bit_tarih' WHERE deger_id > 0 ";
		if($kategori_id!="")
		{
			$sql.="AND kategori_id=$kategori_id ";
		}
		if($altkategori_id!=0)
		{
			$sql.=" AND altkategori_id=$altkategori_id ";
		}
		
		$guncelle		=	@mysql_query($sql,$baglanti);
		if($guncelle) header("location:indirim-kategori.html");
		else{echo $sql;}
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