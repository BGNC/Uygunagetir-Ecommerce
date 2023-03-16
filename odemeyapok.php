<?php

session_start();
include("baglanti.php");

if(isset($_SESSION["uye"]))
{
	$uyesql="SELECT * FROM uye WHERE kadi='".$_SESSION["uye"]."'";
	$uyesorgu=@mysqli_query($uyesql,$baglanti);
	$uyegetir=@mysqli_fetch_array($uyesorgu);
	$uyeid=$uyegetir[0];
	

		$btarih=date("Y-m-d");
		$urunler=$_SESSION["sepet"];
		foreach ($urunler as $urun) {
			
			$urun_id=$urun["urun_id"];
			$urun_adet=$urun["adet"];

			$degersql="SELECT * FROM deger WHERE urun_id=$urun_id";
            $degersorgu=@mysqli_query($baglanti,$degersql);
            $degeroku=@mysqli_fetch_array($degersorgu);
            $vfiyat=$degeroku["fiyat"];

            if($degeroku[6]<=$btarih && $degeroku[7]>=$btarih) $vfiyat-=$vfiyat*$degeroku[5]/100;

            $toplam_fiyat=$urun_adet*$vfiyat;

            $zamandamgasi=time();
			$tarih=date("Y-m-d H-i-s");

            	$satis_sql="INSERT INTO satis values('NULL',1,$uyeid,$urun_id,$urun_adet,$vfiyat,$toplam_fiyat,$zamandamgasi,'$tarih','',0,'')";
				$satis_yap=@mysqli_query($baglanti,$satis_sql);
				if($satis_yap)
				{
					
					$urunguncelle=@mysqli_query($baglanti,"UPDATE urun SET urun_stok=urun_stok-$urun_adet WHERE urun_id=$urun_id");
					if($urunguncelle){
						unset($_SESSION["sepet"]);
						header("location:anasayfa.html");

					}
		}		
}
else
{
	header("location:giris.html");
}
?>