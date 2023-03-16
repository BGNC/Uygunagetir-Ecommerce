<?php

session_start();
include("baglanti.php");

if(isset($_SESSION["uye"]))
{
	$uyesql="SELECT * FROM uye WHERE kadi='".$_SESSION["uye"]."'";
	$uyesorgu=@mysql_query($uyesql,$baglanti);
	$uyegetir=@mysql_fetch_array($uyesorgu);
	$uyeid=$uyegetir[0];
	

		$btarih=date("Y-m-d");
		$urunler=$_SESSION["sepet"];
		foreach ($urunler as $urun) {
			
			$urun_id=$urun["urun_id"];
			$urun_adet=$urun["adet"];

			$degersql="SELECT * FROM deger WHERE urun_id=$urun_id";
            $degersorgu=@mysql_query($degersql,$baglanti);
            $degeroku=@mysql_fetch_array($degersorgu);
            $vfiyat=$degeroku["fiyat"];

            if($degeroku[6]<=$btarih && $degeroku[7]>=$btarih) $vfiyat-=$vfiyat*$degeroku[5]/100;

            $toplam_fiyat=$urun_adet*$vfiyat;

            $zamandamgasi=time();
			$tarih=date("Y-m-d H-i-s");

            	$satis_sql="INSERT INTO satis values('NULL',1,$uyeid,$urun_id,$urun_adet,$vfiyat,$toplam_fiyat,$zamandamgasi,'$tarih','',0,'')";
				$satis_yap=@mysql_query($satis_sql,$baglanti);
				if($satis_yap)
				{
					
					$urunguncelle=@mysql_query("UPDATE urun SET urun_stok=urun_stok-$urun_adet WHERE urun_id=$urun_id",$baglanti);
					if($urunguncelle){
						unset($_SESSION["sepet"]);
						header("location:anasayfa.html");

					} 
					
				}

		}		
}
else
{
	header("location:giris.html");
}
?>