<?php

	include("baglanti.php");
	$kid=$_GET["kategori_id"];
	$metin="<option value='0'></option>";
	$sorgu=mysql_query("SELECT * from altkategori WHERE kategori_id=$kid",$baglanti);
	while($kayit=mysql_fetch_array($sorgu))
	{
		$metin.="<option value=".$kayit[0].">".$kayit[2]."</option>";
	}
	echo $metin;

?>