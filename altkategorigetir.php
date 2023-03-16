<?php

	include("baglanti.php");
	$kid=$_GET["kategori_id"];
	$metin="<option value='0'></option>";
	$sorgu=mysqli_query($baglanti,"SELECT * from altkategori WHERE kategori_id=$kid");
	while($kayit=mysqli_fetch_array($sorgu))
	{
		$metin.="<option value=".$kayit[0].">".$kayit[2]."</option>";
	}
	echo $metin;

?>