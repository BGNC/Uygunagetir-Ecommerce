<?php

session_start();

if(isset($_SESSION["yonetici"]))

{

	include("../baglanti.php");

	$id=$_GET["id"];

	$slidegetir=@mysqli_query($baglanti,"SELECT * FROM slide WHERE id=$id");

	$kayit=@mysqli_fetch_array($slidegetir);

	$resim=$kayit[3];

	$sil=unlink("../slide/".$resim);

	if($sil)

	{

		$sil2=@mysqli_query($baglanti,"DELETE FROM slide WHERE id=$id");

		if($sil2) header("location:slider-duzenle.html");

	}

}

else

{

	header("location:giris.html");

}





?>