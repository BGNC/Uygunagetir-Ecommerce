<div style="min-height:400px; padding:25px 0 25px 0;">
<?php
if(isset($_SESSION["uye"]))
{
	$uyesorgu	=	@mysql_query("SELECT * FROM uye WHERE kadi='".$_SESSION["uye"]."'",$baglanti);
	$uyegetir	=	@mysql_fetch_array($uyesorgu);
	$uyeid		=	$uyegetir[0];
	
	$siparisorgu	=	@mysql_query("SELECT * FROM satis WHERE satici_id=$uyeid AND kargo_durum!=1",$baglanti);
	$siparisvarmi	=	@mysql_num_rows($siparisorgu);
	
	if($siparisvarmi!=0)
	{	
?>

<table id="sepet" align="center">
	<thead>
    	<tr>
        	<td>Tarih</td>
            <td>Müşteri Adı Soyadı</td>
            <td>Ürün Adı</td>
            <td>Ürün Fiyatı</td>
            <td>Adet</td>
            <td>Toplam Fiyat</td>
            <td colspan="2"></td>
        </tr>
    </thead>
	
    <?php
	$siparissql	=	mysql_query("SELECT satis.satis_id,satis.tarih,uye.ad,uye.soyad,urun.urun_adi,satis.urun_fiyat,satis.urun_adet,satis.toplam_fiyat,satis.kargo_durum FROM satis,urun,uye WHERE satis.satici_id=$uyeid AND satis.kargo_durum!=1 AND satis.urun_id=urun.urun_id AND satis.alan_id=uye.uyeid",$baglanti);
	
	while($siparisler=mysql_fetch_array($siparissql))
	{
		$durum=$siparisler[8];
		echo "<tr>";
		echo "<td width='150'>".$siparisler[1]."</td>";
		echo "<td width='180'>".$siparisler[2]." ".$siparisler[3]."</td>";
		echo "<td width='200'>".$siparisler[4]."</td>";
		echo "<td width='130'>".number_format($siparisler[5],2,",",".")." TL</td>";
		echo "<td width='60'>".$siparisler[6]."</td>";
		echo "<td width='130'>".number_format($siparisler[7],2,",",".")." TL</td>";
		
		if($durum==2)
		{
			echo "<td width='100'><select style='width:100px;' onchange='$.kargo(".$siparisler[0].",this.value);'>
			<option value=''></option>
			<option value='2' selected >Hazırlanıyor</option>
			<option value='3'>Kargoya Verildi</option>
		    </select>";
		}
		else if($durum==3)
		{
			echo "<td width='100'><select style='width:100px;' onchange='$.kargo(".$siparisler[0].",this.value);'>
			<option value=''></option>
			<option value='2'>Hazırlanıyor</option>
			<option value='3' selected>Kargoya Verildi</option>
		    </select>";
		}
		else
		{
			echo "<td width='100'><select style='width:100px;' onchange='$.kargo(".$siparisler[0].",this.value);'>
			<option value=''></option>
			<option value='2'>Hazırlanıyor</option>
			<option value='3'>Kargoya Verildi</option>
		    </select>";
		}
		
		echo "<td width='50' align='center'><a href='?url=kargokoduver&satis_id=".$siparisler[0]."'><img src='resimler/urun.png' width='20' height='20' border='none'></a></td>";	
		echo "</tr>";	
	}
	
	
	?>
    
    
    
</table>	





<?php
	}
	else
	{
		echo "<div id='sepetbos'>Sipariş Bulunmamaktadır.</div>";
	}
}
else
{
	header("location:index.php");
}
?>
</div>