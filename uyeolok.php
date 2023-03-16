<?php
include("baglanti.php");
$kadi	=	@$_POST["kadi"];
$sifre	=	md5($_POST["sifre"]);
$adi	=	@$_POST["adi"];
$soyadi	=	@$_POST["soyadi"];
$tel	=	@$_POST["tel"];
$adres	=	@$_POST["adres"];
$email	=	@$_POST["email"];
//$hesapno	=	@$_POST["bhesapno"];

$sql	=	@mysql_query("SELECT * FROM uye WHERE kadi='$kadi'",$baglanti);
$varmi	=	@mysql_num_rows($sql);
if($varmi!=0)
{
	header("location:giris.html");
}
else
{
	$kaydet=@mysql_query("INSERT INTO uye values(NULL,'$kadi','$sifre','$adi','$soyadi','$tel','$email','$adres','',2)",$baglanti);
	if($kaydet) header("location:giris.html");
	else header("location:giris.html");
}
?>