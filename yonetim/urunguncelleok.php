<?php
session_start();
if(isset($_SESSION["yonetici"]))
{
	
	include("../baglanti.php");
	$yol="../urunresimleri/";
	$urun_id=$_GET["urun_id"];
	$marka_id=$_POST["marka_id"];
	$kategori_id=$_POST["kategori_id"];
	$altkategori_id=$_POST["altkategori_id"];
	$urunadi=$_POST["urunadi"];
	$urunfiyati=$_POST["urunfiyati"];
	$stok=$_POST["stok"];
	$ozellik=$_POST["ozellik"];
	$resim=$_FILES["resim"]["name"];
	
	$urunguncelle	=	@mysql_query("UPDATE urun SET marka_id=$marka_id,kategori_id=$kategori_id,altkategori_id=$altkategori_id,urun_adi='$urunadi',urun_stok=$stok,urun_ozellik='$ozellik' WHERE urun_id=$urun_id",$baglanti);
	
	if($urunguncelle)
	{
		
		$fiyatguncelle=mysql_query("UPDATE deger SET kategori_id=$kategori_id,altkategori_id=$altkategori_id,fiyat=$urunfiyati WHERE urun_id=$urun_id",$baglanti);
		if($fiyatguncelle)
		{
			if($resim=="")
			{
				header("location:index.php");
			}
			else
			{
				
				$resimsil	=	mysql_fetch_array(mysql_query("SELECT urun_resmi FROM urun WHERE urun_id=$urun_id",$baglanti));
				$resim_adi	=	$resimsil[0];
				$sil		=	unlink($yol.$resim_adi);
				if($sil)
				{
					$uzanti=substr($resim,-4);
					$dizin=$_FILES["resim"]["tmp_name"];
					$yeniad=date("d.m.Y").rand(1,10000).$uzanti;
					$yukle=move_uploaded_file($dizin,$yol.$yeniad);
					if($yukle)
					{
						$resmiguncelle=@mysql_query("UPDATE urun SET urun_resmi='$yeniad' WHERE urun_id=$urun_id",$baglanti);
						if($resmiguncelle) header("location:urun-$urun_id.html");
					}
				}
			}
		}
		
	}	
}
else
{
	header("location:giris.html");
}
?>