<div style="padding:25px 0px; min-height:380px; min-height:400px; width:950px; margin:0 auto; ">
<?php
if(isset($_SESSION["uye"]))
{
	$uyesql="SELECT * FROM uye WHERE kadi='".$_SESSION["uye"]."'";
	$uyesorgu=@mysql_query($uyesql,$baglanti);
	$uyegetir=@mysql_fetch_array($uyesorgu);
	$uyeid=$uyegetir[0];
?>
<table align="center" id="sepet">
	<thead>
        <tr>
            <td>Tarih</td>
            <td>Ürün Adı</td>
            <td>Ürün Fiyatı</td>
            <td>Adet</td>
            <td>Toplam Fiyatı</td>
            <td>Kargo Durumu</td>
            <td>Kargo Firması</td>
            <td>Kargo Kodu</td>
        </tr>
    </thead>
    <tbody>
    
    <?php
	$satissql="SELECT satis.tarih,urun.urun_adi,satis.urun_fiyat,satis.urun_adet,satis.toplam_fiyat,satis.kargo_adi,satis.kargo_kodu,satis.kargo_durum FROM satis,urun WHERE satis.alan_id=$uyeid AND satis.urun_id=urun.urun_id";
	$satissorgu=mysql_query($satissql,$baglanti);
	while($satisgetir=mysql_fetch_array($satissorgu))
	{
		$durum=$satisgetir[7];
		$metin="";
		echo "<tr>";
		echo "<td width='200'>".$satisgetir[0]."</td>";
		echo "<td width='150'>".$satisgetir[1]."</td>";
		echo "<td width='120'>".number_format($satisgetir[2],2,",",".")." TL</td>";
		echo "<td width='50'>".$satisgetir[3]."</td>";
		echo "<td width='130'>".number_format($satisgetir[4],2,",",".")." TL</td>";
		
		if($durum==2)
			$metin="Hazırlanıyor";
		else if($durum==3)
			$metin="Kargoya Verildi";	
			
		echo "<td width='150'>".$metin."</td>";
		echo "<td width='120'>".$satisgetir[5]."</td>";
		echo "<td width='100'>".$satisgetir[6]."</td>";
		echo "</tr>";
	}
	?>
    
	</tbody>
</table>
<?php
}
else{ 
	header("location:index.php");
}
?>
</div>
