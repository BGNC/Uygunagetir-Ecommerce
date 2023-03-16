<?php
				include("baglanti.php");
				session_start();
				$uyesql="SELECT * FROM uye WHERE kadi='".@$_SESSION["uye"]."'";
				$uyesorgu=@mysql_query($uyesql,$baglanti);
				$uyegetir=@mysql_fetch_array($uyesorgu);
				$uye_id=$uyegetir[0];
				
				
				$sql="SELECT SUM(urun_adet) FROM sepet WHERE uye_id=$uye_id";
				$sqlsorgu=@mysql_query($sql,$baglanti);
				$adet=@mysql_fetch_array($sqlsorgu);
				echo $adet[0];
?>