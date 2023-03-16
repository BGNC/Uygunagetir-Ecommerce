<?php
session_start();
if($_SESSION["yonetici"])
{
	include("../baglanti.php");
	$urunid	=	$_GET["urun_id"];
	$resim	=	mysql_fetch_array(@mysql_query("SELECT * FROM urun WHERE urun_id=$urunid",$baglanti));
	$resimadi	=	$resim[6];
	$resmisil	=	unlink("../urunresimleri/".$resimadi);
	if($resmisil)
	{
		$urunsil	=	@mysql_query("DELETE FROM urun WHERE urun_id=$urunid",$baglanti);
		if($urunsil)
		{
			
			$fiyatsil	=	@mysql_query("DELETE FROM deger WHERE urun_id=$urunid",$baglanti);
			if($fiyatsil)header("location:urun-ekle.html");	
	
		} 
	}
}
else
{
	header("location:giris.html");
}
?>