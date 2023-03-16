<?php

include("baglanti.php");

$kadi = $_POST["kadi"];
$sifre = md5($_POST["sifre"]);

if ($kadi == "" || $sifre == "") {
    header("location:giris.html");
} else {
    $sql = mysqli_query($baglanti, "SELECT * FROM uye WHERE kadi='$kadi' AND sifre='$sifre' AND rutbe=2");
    $varmi = mysqli_num_rows($sql);
    if ($varmi != 0) {
        session_start();
        $_SESSION["uye"] = $kadi;
        header("location:sepet.html");
    } else {
        header("location:giris.html");
    }
}


?>