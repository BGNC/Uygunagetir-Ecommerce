<?php
include("baglanti.php");
$kadi = @$_POST["kadi"];
$sifre = md5($_POST["sifre"]);
$adi = @$_POST["adi"];
$soyadi = @$_POST["soyadi"];
$tel = @$_POST["tel"];
$adres = @$_POST["adres"];
$email = @$_POST["email"];
//$hesapno	=	@$_POST["bhesapno"];

$sql = @mysqli_query($baglanti, "SELECT * FROM uye WHERE kadi='$kadi'");
$varmi = @mysqli_num_rows($sql);
if ($varmi != 0) {
    header("location:giris.html");
} else {
    $kaydet = @mysqli_query($baglanti, "INSERT INTO uye values(NULL,'$kadi','$sifre','$adi','$soyadi','$tel','$email','$adres','',2)");
    if ($kaydet) header("location:giris.html");
    else header("location:giris.html");
}
?>