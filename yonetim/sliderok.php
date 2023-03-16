<?php

session_start();

if(isset($_SESSION["yonetici"]))

{

	include("../baglanti.php");

	$yol	=	"../slide/";

	$baslik	=	$_POST["baslik"];

	$resim	=	$_FILES["resim"]["name"];

	$yukle	=	move_uploaded_file($_FILES["resim"]["tmp_name"],$yol.$resim);

	if($yukle)

	{

		$kaydet=@mysqli_query($baglanti,"INSERT INTO slide values(NULL,'$baslik','','$resim')");

		if($kaydet) header("location:slider-duzenle.html");

	}

}

else

{

	header("location:giris.html");

}



?>