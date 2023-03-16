<div class="slider">
<ul>
<?php
	$resim	=	@mysql_query("SELECT * FROM slide ORDER BY id ASC",$baglanti);
	while($resimler=mysql_fetch_array($resim))
	{
		echo "<li><a href='".$resimler[2]."'><img class='sresim' src='slide/".$resimler[2]."'></a></li>";
	}
?>
</ul>
<a onclick="$.geri();"><img src="resimler/sli.png" class="geri" style="border:0;" /></a>
<a onclick="$.ileri();"><img src="resimler/sli2.png" class="ileri" style="border:0;"/></a>
</div>

<center><img src="resimler/1.png" style=" border:none;" /></center>

<div class="vitrin">
	<?php
        $vitrinsql	=	@mysql_query("SELECT urun.urun_id,urun.urun_adi,urun.urun_resmi,deger.fiyat FROM urun,deger WHERE urun.vitrin=1 AND urun.urun_id=deger.urun_id",$baglanti);
        while($vitrinkayitlar=@mysql_fetch_array($vitrinsql))
        {
			$btarih=date("Y-m-d");
			$vfiyat=$vitrinkayitlar[3];
			$degersql="SELECT * FROM deger WHERE urun_id=$vitrinkayitlar[0]";
			$degersorgu=@mysql_query($degersql,$baglanti);
			$degeroku=@mysql_fetch_array($degersorgu);
			
			if($degeroku[6]<=$btarih && $degeroku[7]>=$btarih) $vfiyat-=$vfiyat*$degeroku[5]/100;
			
            echo "<div class='urun'>";
            echo "<img src='urunresimleri/".$vitrinkayitlar[2]."'>";
            echo "<span>".$vitrinkayitlar[1]."</span>";
            echo "<span>".number_format($vfiyat,2,",",".")." TL </span>";
            echo "<a href='?url=urundetay&urun_id=".$vitrinkayitlar[0]."'><div class='incele'>İNCELE</div></a>";
            echo "</div>";
        }
    ?>  
</div>

<center><img src="resimler/indirim.png" style=" border:none;" /></center>
<div class="vitrin">
	<?php
		@$tarih=date("Y-m-d");
        $indirimsql	=	@mysql_query("SELECT urun.urun_id,urun.urun_adi,urun.urun_resmi,deger.indirim_orani FROM urun,deger WHERE deger.indirim_orani!=0 AND deger.bas_tarih<='$tarih' AND bit_tarih>='$tarih' AND deger.urun_id=urun.urun_id ORDER BY deger.indirim_orani DESC",$baglanti);
        while($indirimkayitlar=@mysql_fetch_array($indirimsql))
        {
			
			$fiyatsql=@mysql_query("SELECT * from deger WHERE urun_id=$indirimkayitlar[0]",$baglanti);
			$fiyatdeger=@mysql_fetch_array($fiyatsql);
			$indirimoran=$fiyatdeger[5];
			$ifiyat=$fiyatdeger[4];
			$ifiyat-=$ifiyat*$indirimoran/100;
			//if($fiyatdeger[6]<=$tarih && $fiyatdeger[7]>=$tarih) {$ifiyat-=$ifiyat*$degeroku[5]/100;}
		
			
            echo "<div class='urun'>";
			echo "<div class='indirim'></div>";
            echo "<img src='urunresimleri/".$indirimkayitlar[2]."'>";
            echo "<span>".$indirimkayitlar[1]."</span>";
            echo "<span style='text-decoration:line-through;'>".number_format($fiyatdeger[4],2,",",".")." TL </span>";
			echo "<span style='color:red;'>".number_format($ifiyat,2,",",".")." TL %".$indirimoran."</span>";
            echo "<a href='?url=urundetay&urun_id=".$indirimkayitlar[0]."'><div class='incele'>İNCELE</div></a>";
            echo "</div>";
        }
    ?>  
</div>
