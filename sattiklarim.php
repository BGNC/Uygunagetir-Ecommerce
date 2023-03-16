<div style="padding:50px 0 50px 0; min-height:350px;">

<?php
if(isset($_SESSION["uye"])){

	$uyesorgu	=	@mysql_query("SELECT * FROM uye WHERE kadi='".$_SESSION["uye"]."'",$baglanti);
	$uyegetir	=	@mysql_fetch_array($uyesorgu);
	$uyeid		=	$uyegetir[0];
	
	$satis_sorgu	=	@mysql_query("SELECT * FROM satis WHERE satici_id=$uyeid AND kargo_durum=1",$baglanti);
	$satisvarmi	=	@mysql_num_rows($satis_sorgu);
	
	if($satisvarmi!=0)
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
        </tr>
    </thead>
    <?php
	
	$satissql	=	@mysql_query("SELECT satis.tarih,uye.ad,uye.soyad,urun.urun_adi,satis.urun_fiyat,satis.urun_adet,satis.toplam_fiyat FROM satis,uye,urun WHERE satis.satici_id=$uyeid AND satis.kargo_durum=1 AND satis.urun_id=urun.urun_id AND satis.alan_id=uye.uyeid",$baglanti);
	while($satislar=@mysql_fetch_array($satissql))
	{
		echo "<tr>";
		echo "<td width='150'>".$satislar[0]."</td>";
		echo "<td width='150'>".$satislar[1]." ".$satislar[2]."</td>";
		echo "<td width='180'>".$satislar[3]."</td>";
		echo "<td width='130'>".number_format($satislar[4],2,",",".")." TL</td>";
		echo "<td width='70'>".$satislar[5]."</td>";
		echo "<td width='130'>".number_format($satislar[6],2,",",".")." TL</td>";
		echo "<tr>";
	}
	
	
	?>
    
    

</table>
<?php
	}
	else
	{
		echo "<div id='sepetbos'>Satış Bulunmamaktadır.</div>";  
	}
}
else
{
	header("location:index.php");
}
?>
</div>
