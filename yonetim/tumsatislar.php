<?php
if(isset($_SESSION["yonetici"]))
{
?>
<div style=" background-color:#fff; width:1050px; margin:50px auto; padding:50px 0px; border-radius:5px;">
<table id="tablo" align="center">
	<tr>
    	<th>Tarih</th>
        <th>Satıcı</th>
        <th>Müşteri Adı Soyadı</th>
        <th>Ürün Adı</th>
        <th>Ürün Fiyatı</th>
        <th>Adet</th>
        <th>Toplam Fiyat</th>
        
    </tr>
    <tbody>
    <?php
	$sql="SELECT satis.tarih,uye.ad,uye.soyad,urun.urun_adi,satis.urun_fiyat,satis.urun_adet,satis.toplam_fiyat,urun.urun_id FROM satis,uye,urun WHERE satis.kargo_durum=1 AND satis.alan_id=uye.uyeid AND satis.urun_id=urun.urun_id ORDER BY satis.satis_id ASC";
	$sqlsorgu=@mysql_query($sql,$baglanti);
	while($satislar=@mysql_fetch_array($sqlsorgu))
	{
		
		$urun_id=$satislar[7];
		
		
		
		$sqlsatis="SELECT uye.kadi FROM uye,urun WHERE urun.urun_id=$urun_id AND urun.satici_id=uye.uyeid";
		$satissorgu=mysql_query($sqlsatis,$baglanti);
		$s=mysql_fetch_array($satissorgu);
		$satici_adi=$s[0];
		
		echo "<tr>";
		echo "<td width='180'>".$satislar[0]."</td>";
		echo "<td width='150'>".$satici_adi."</td>";
		echo "<td width='180'>".$satislar[1]." ".$satislar[2]."</td>";
		echo "<td width='170'>".$satislar[3]."</td>";
		echo "<td width='120'>".number_format($satislar[4],2,",",".")." TL</td>";
		echo "<td width='60'>".$satislar[5]."</td>";
		echo "<td  width='120'>".number_format($satislar[6],2,",",".")." TL</td>";
		echo "</tr>";
		
	}
	
	?>
    </tbody>
</table>


</div>
<?php
}
else
{
	header("location:giris.php");
}