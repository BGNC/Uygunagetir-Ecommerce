<?php
@$kategori_id=$_GET["kategori_id"];
@$altkategori_id=$_GET["altkategori_id"];

@$marka_id	=	$_POST["marka_id"];
@$deger		=	implode(",",$marka_id);
@$minfiyat	=	$_POST["min"];
@$maxfiyat	=	$_POST["max"];

$x=strlen($minfiyat);
$y=strlen($maxfiyat);

?>
<div style="width:800px; margin:20px  auto;height:600px;">
<div style="width:190px; height:100%; float:left;">
<form action="" method="post">
<input type="hidden" name="kategori_id" value="" /><input name="altkategori_id" type="hidden" />
<div style="margin:10px 0px;">
<span style="font-size:16px;">Markalar</span>
<hr />
<?php
$sqlmarka=mysql_query("SELECT marka.marka_id,marka.marka_adi FROM marka,urun WHERE urun.kategori_id=$kategori_id AND urun.altkategori_id=$altkategori_id AND urun.gorunum=1 AND urun.marka_id=marka.marka_id GROUP BY marka.marka_adi ",$baglanti);
$n=0;
while($markakayit=mysql_fetch_array($sqlmarka))
{
	echo "<label><input type='checkbox' name='marka_id[]' value='".$markakayit[0]."'>$markakayit[1]</label><br/>";
}
?>
</div>
<div style="margin:20px 0px;">
<span style="font-size:16px">Fiyat Aralığı</span>
<hr />
<input type="text" name="min" placeholder="Minumun" class="ftext" />
<input type="text" name="max"  placeholder="Maximum" class="ftext" />
</div>
<input type="submit" value="UYGULA" class="fbuton" />
</form>
</div>

<!-- listenelen urunler *-->
<div style="width:600px; height:600px; float:right;">
<?php
 
 
 $sql="SELECT urun.urun_id,urun.urun_adi,urun.urun_resmi,deger.fiyat FROM urun,deger WHERE urun.gorunum=1 AND urun.urun_id > 0  ";
 if(strlen($kategori_id)!=0)
 {
	$sql.=" AND urun.kategori_id=$kategori_id ";
 }
 if(strlen($altkategori_id)!=0)
 {
	 $sql.=" AND urun.altkategori_id=$altkategori_id ";
 }
 if(strlen($deger)!=0)
 {
	 $sql.=" AND urun.marka_id IN($deger)";
 } 
 $sql.=" AND urun.urun_id=deger.urun_id";
 
 
 @$filtresql=@mysql_query($sql,$baglanti);
 while($filtrekayitlar=mysql_fetch_array($filtresql))
     	{
			//deger tablosundaki başlama ve bitiştarihleri oku
			$bugununtarihi=date("Y-m-d");
			$sqlindirim="select * from deger where urun_id=$filtrekayitlar[0]";
			$sorguindirim=mysql_query($sqlindirim,$baglanti);
			$f=mysql_fetch_array($sorguindirim);
			$fiyat=$filtrekayitlar[3];
			if($bugununtarihi>=$f[6] and $bugununtarihi<=$f[7]) $fiyat-=($fiyat*$f[5]/100);		
			
			if($x!=0 && $y!=0)
			{
				if($fiyat>=$minfiyat && $fiyat<=$maxfiyat)
				{
					echo "<div class='urun'>";
					echo "<img src='urunresimleri/".$filtrekayitlar[2]."'>";
					echo "<span>".$filtrekayitlar[1]."</span>";
					echo "<span>".number_format($fiyat,2,",",".")." TL </span>";
					echo "<a href='?url=urundetay&urun_id=".$filtrekayitlar[0]."'><div class='incele'>İNCELE</div></a>";
					echo "</div>";
				}
				
			}
			else
			{
				if($x!=0)
				{
					if($fiyat>=$minfiyat)
					{
						echo "<div class='urun'>";
						echo "<img src='urunresimleri/".$filtrekayitlar[2]."'>";
						echo "<span>".$filtrekayitlar[1]."</span>";
						echo "<span>".number_format($fiyat,2,",",".")." TL </span>";
						echo "<a href='?url=urundetay&urun_id=".$filtrekayitlar[0]."'><div class='incele'>İNCELE</div></a>";
						echo "</div>";
					}
				}
				else
				{
					if($y!=0)
					{
						if($fiyat<=$maxfiyat)
						{
							echo "<div class='urun'>";
							echo "<img src='urunresimleri/".$filtrekayitlar[2]."'>";
							echo "<span>".$filtrekayitlar[1]."</span>";
							echo "<span>".number_format($fiyat,2,",",".")." TL </span>";
							echo "<a href='?url=urundetay&urun_id=".$filtrekayitlar[0]."'><div class='incele'>İNCELE</div></a>";
							echo "</div>";
						}
					}
					else
					{
							echo "<div class='urun'>";
							echo "<img src='urunresimleri/".$filtrekayitlar[2]."'>";
							echo "<span>".$filtrekayitlar[1]."</span>";
							echo "<span>".number_format($fiyat,2,",",".")." TL </span>";
							echo "<a href='?url=urundetay&urun_id=".$filtrekayitlar[0]."'><div class='incele'>İNCELE</div></a>";
							echo "</div>";
					}
				}
				
			}
		
        }
?>
</div>
</div>