<?php

session_start();

if(isset($_SESSION["yonetici"]))

{

	include("../baglanti.php");

	

	$sitetit	=	$_POST["sitetitle"];

	$site_desc	=	$_POST["sitedescription"];

	$site_key	=	$_POST["sitekeywords"];

	

	$guncelle=@mysqli_query($baglanti,"UPDATE ayar set sitetitle='$sitetit',sitedescription='$site_desc',sitekeywords='$site_key' where id=1 ");

	if($guncelle)

	{

		header("location:site-ayar.html");

	}

	

}

else

{

	header("location:giris.html");

}





?>