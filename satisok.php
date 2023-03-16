<?php
session_start();
if(isset($_SESSION["uye"]))
{
	include("baglanti.php");

	$uyesorgu	=	@mysql_query("SELECT * FROM uye WHERE kadi='".$_SESSION["uye"]."'",$baglanti);
	$uyekayit	=	@mysql_fetch_array($uyesorgu);
	$satici_id	=	$uyekayit[0];

	$marka_id	=	$_POST["marka_id"];
	$kategori_id	=	$_POST["kategori_id"];
	$altkategori_id	=	$_POST["altkategori_id"];
	$urunadi	=	$_POST["urunadi"];
	$urunfiyat	=	$_POST["urunfiyati"];
	$stok		=	$_POST["stok"];
	$ozellik	=	$_POST["ozellik"];
	$resim		=	$_FILES["resim"]["name"];
	
	$yol	=	"urunresimleri/";		
	$tarih	=	date("d.m.Y");
	$dizin	=	$_FILES["resim"]["tmp_name"];
	$uzanti	=	substr($resim,-4);
	$yeni_ad	=	$tarih.rand(1000,9999).$uzanti;


	$yukle	=	move_uploaded_file($dizin,$yol.$yeni_ad);
	if($yukle)
	{
		$urunkaydet	=	@mysql_query("INSERT INTO urun values(NULL,$satici_id,$marka_id,$kategori_id,$altkategori_id,'$urunadi','$yeni_ad','$ozellik',$stok,0,1)",$baglanti);

		if($urunkaydet)
		{
			$urun_id	=	mysql_insert_id();
			$sql="INSERT INTO deger(urun_id,kategori_id,altkategori_id,fiyat) values ($urun_id,$kategori_id,$altkategori_id,$urunfiyat)";
			$degerkaydet	=	@mysql_query($sql,$baglanti);
			if($degerkaydet)
			{
				header("location:index.php?url=urunlerim");
			}
			else
			{

				echo $sql;
			}
		}
	}
	else
	{

		echo "basarısız";
	}
	
}
else
{
	header("location:index.php");
}

?>