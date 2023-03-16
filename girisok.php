<?php

	include("baglanti.php");
	
	$kadi=$_POST["kadi"];
	$sifre=md5($_POST["sifre"]);
	
	if($kadi=="" || $sifre=="")
	{
		header("location:giris.html");
	}
	else
	{
		$sql=mysql_query("SELECT * FROM uye WHERE kadi='$kadi' AND sifre='$sifre' AND rutbe=2",$baglanti);
		$varmi=mysql_num_rows($sql);
		if($varmi!=0)
		{
			session_start();
			$_SESSION["uye"]=$kadi;
			header("location:sepet.html");
		}
		else
		{
			header("location:giris.html");
		}
	}



?>