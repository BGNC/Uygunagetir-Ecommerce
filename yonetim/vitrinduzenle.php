<?php

session_start();

if(isset($_SESSION["yonetici"]))

{

	include("../baglanti.php");

	$urun_id=$_GET["urun_id"];

	

	$varmi	=	mysqli_fetch_array(@mysqli_query($baglanti,"SELECT vitrin FROM urun WHERE urun_id=$urun_id"));

	$deger	=	$varmi[0];

	if($deger==1)

	{

		@mysqli_query($baglanti,"UPDATE urun SET vitrin=0 WHERE urun_id=$urun_id ORDER BY urun_id ASC LIMIT 1");

	}

	else

	{

		$adet=@mysql_query("SELECT * FROM urun WHERE vitrin=1",$baglanti);

		$adetvarmi=@mysql_num_rows($adet);

		if($adetvarmi>=12)

		{

			echo 1;

		}

		else

		{

			@mysql_query("UPDATE urun SET vitrin=1 WHERE urun_id=$urun_id ORDER BY urun_id ASC LIMIT 1",$baglanti);

		}

		

		

	}	

}

else

{

	header("location:giris.html");

}

?>