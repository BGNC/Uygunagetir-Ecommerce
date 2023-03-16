<?php
				include("baglanti.php");
				session_start();
				$uyesql="SELECT * FROM uye WHERE kadi='".@$_SESSION["uye"]."'";
				$uyesorgu=@mysqli_query($baglanti,$uyesql);
				$uyegetir=@mysqli_fetch_array($uyesorgu);
				$uye_id=$uyegetir[0];
				
				
				$sql="SELECT SUM(urun_adet) FROM sepet WHERE uye_id=$uye_id";
				$sqlsorgu=@mysqli_query($baglanti,$sql);
				$adet=@mysqli_fetch_array($sqlsorgu);
				echo $adet[0];
?>