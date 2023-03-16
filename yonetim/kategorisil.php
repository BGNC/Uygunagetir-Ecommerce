<?php
session_start();
if(isset($_SESSION["yonetici"]))
{
	include("../baglanti.php");
	@$kid=$_GET["kategori_id"];
	$sil=mysql_query("DELETE FROM kategori WHERE kategori_id=$kid",$baglanti);
	if($sil) header("location:kategori-ekle.html");

}
else
{
	header("location:giris.html");
}
?>