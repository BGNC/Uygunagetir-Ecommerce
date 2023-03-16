<?php

	include("../baglanti.php");
	$kadi	=	$_POST["kadi"];
	$sifre	=	md5($_POST["sifre"]);

	if($kadi=="" || $sifre=="")
	{

		header("location:giris.html");
	}
	else
	{
		$sql="SELECT * FROM uye WHERE kadi='$kadi' AND sifre='$sifre' AND rutbe=1";
		$sorgu=mysqli_query($baglanti,$sql);
		$varmi=mysqli_num_rows($sorgu);
		echo $varmi;
		if($varmi!=0)

		{
			session_start();
			$_SESSION["yonetici"]=$kadi;
			header("location:anasayfa.html");
		}
		else
		{
			header("location:giris.html");
		}

	}

?>