<?php

session_start();

if($_SESSION["yonetici"])

{

	include("../baglanti.php");

	$urunid	=	$_GET["urun_id"];

	$resim	=	mysqli_fetch_array(@mysqli_query($baglanti,"SELECT * FROM urun WHERE urun_id=$urunid"));

	$resimadi	=	$resim[6];

	$resmisil	=	unlink("../urunresimleri/".$resimadi);

	if($resmisil)

	{

		$urunsil	=	@mysqli_query($baglanti,"DELETE FROM urun WHERE urun_id=$urunid");

		if($urunsil)

		{

			

			$fiyatsil	=	@mysqli_query($baglanti,"DELETE FROM deger WHERE urun_id=$urunid");

			if($fiyatsil)header("location:urun-ekle.html");	

	

		} 

	}

}

else

{

	header("location:giris.html");

}

?>