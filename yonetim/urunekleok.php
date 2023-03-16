<?php

session_start();

if(isset($_SESSION["yonetici"]))

{

	include("../baglanti.php");

	$yol="../urunresimleri/";

	$saticigetir=@mysql_fetch_array(@mysql_query("SELECT * FROM uye WHERE kadi='".$_SESSION["yonetici"]."'",$baglanti));

	$satici_id=$saticigetir[0];

	$marka_id=$_POST["marka_id"];

	$kategori_id=$_POST["kategori_id"];

	$altkategori_id=$_POST["altkategori_id"];

	$urunadi=$_POST["urunadi"];

	$urunfiyati=$_POST["urunfiyati"];

	$stok=$_POST["stok"];

	$ozellik=$_POST["ozellik"];

	$resim=$_FILES["resim"]["name"];

	

	$uzanti=substr($resim,-4);

	$dizin=$_FILES["resim"]["tmp_name"];

	$yeniad=date("d.m.Y").rand(1,10000).$uzanti;

	$yukle=move_uploaded_file($dizin,$yol.$yeniad);

	if($yukle)

	{

		//$kaydet=@mysql_query("INSERT INTO urun values(NULL,$satici_id,$marka_id,$kategori_id,$altkategori_id,'$urunadi','$yeniad','$ozellik',$stok,0,1)",$baglanti);

		 $kaydet=@mysql_query("INSERT INTO urun
		 	values(NULL,'$satici_id','$marka_id','$kategori_id','$altkategori_id','$urunadi','$yeniad','$ozellik','$stok',0,1,0)",$baglanti);

		if($kaydet)

		{
			
			$son_id=mysql_insert_id();

			$degerkaydet=mysql_query("INSERT INTO deger(urun_id,kategori_id,altkategori_id,fiyat)values($son_id,$kategori_id,$altkategori_id,$urunfiyati)",$baglanti);

			header("location:urun-ekle.html");
			

		}

		else

		{

			echo "hata".$altkategori_id;

			

		}


		

	}
	else{echo"hatam";}

}

else

{

	header("location:giris.html");

}





?>