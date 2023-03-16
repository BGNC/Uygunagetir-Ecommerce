<div style=" min-height:400px; width:800px; padding:25px 0 25px 0; margin:0 auto;">
<?php
if(isset($_SESSION["uye"]))
{
	$uyesorgu	=	mysql_query("SELECT * FROM uye WHERE kadi='".$_SESSION["uye"]."'",$baglanti);
	$uyegetir	=	mysql_fetch_array($uyesorgu);
	$uyeid		=	$uyegetir[0];
	
	$urunsorgu	=	mysql_query("SELECT * FROM urun WHERE satici_id=$uyeid and gorunum=1",$baglanti);
	$urunvarmi	=	mysql_num_rows($urunsorgu);
	
	if($urunvarmi!=0){		
?>
<table id="sepet" align="center">
	<thead>
	<tr>
    	<td>SN</td>
        <td>Ürün Adı</td>
        <td>Fiyat</td>
        <td>Stok</td>
        <td colspan="2"></td>
    </tr>
    </thead>
    
    <?php
	
	$urunsql	=	@mysql_query("SELECT urun.urun_id,urun.urun_adi,deger.fiyat,urun.urun_stok FROM urun,deger WHERE urun.satici_id=$uyeid AND urun.gorunum=1 AND urun.urun_id=deger.urun_id",$baglanti);
	
	$i=0;
	while($urunler=mysql_fetch_array($urunsql))
	{
		$i++;
		echo "<tr>";
		echo "<td width='70'>".$i."</td>";
		echo "<td width='200'>".$urunler[1]."</td>";
		echo "<td width='150'>".number_format($urunler[2],2,",",".")." TL</td>";
		echo "<td width='70'>".$urunler[3]."</td>";
		echo "<td width='50'><a href='?url=urunguncelle&urun_id=".$urunler[0]."'><img src='resimler/g3.png' width='15' height='15' border='0'></a></td>";
		echo "<td width='50'><a href='pasif.php?id=".$urunler[0]."'><img src='resimler/s.png' width='15' height='15' border='0'></a></td>";
		echo "</tr>";
	}
	
	
	?>
    		

</table>	
	



<?php

	}
	else
	{
		echo "<div id='sepetbos'>Hiç Ürün Bulunmamaktadır.</div>";  
		
	}

}
else
{
	header("location:index.php");
}
?>
</div>