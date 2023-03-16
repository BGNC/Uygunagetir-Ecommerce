<?php

session_start();

if(isset($_SESSION["yonetici"]))

{

	include("../baglanti.php");

	@$kid=$_GET["kategori_id"];

	$sil=mysqli_query($baglanti,"DELETE FROM kategori WHERE kategori_id=$kid");

	if($sil) header("location:kategori-ekle.html");



}

else

{

	header("location:giris.html");

}

?>