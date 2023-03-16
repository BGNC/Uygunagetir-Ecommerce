<center><img src="resimler/kurunler.png" style=" border:none; margin-top:20px;" /></center>
<div class="menuort" style=" padding:25px 0 0 25px; min-height:400px;">

<?php
$satici_id	=	@$_GET["satici_id"];
	
if($satici_id!=1)
{	

	$urunsorgu	=	@mysql_query("SELECT urun.urun_id,urun.urun_adi,urun.urun_resmi,deger.fiyat FROM urun,deger WHERE urun.satici_id=$satici_id AND urun.urun_id=deger.urun_id",$baglanti);
	while($urunler=@mysql_fetch_array($urunsorgu))
	{
		  echo "<div class='urun'>";
		  echo "<img src='urunresimleri/".$urunler[2]."'>";
		  echo "<span>".$urunler[1]."</span>";
		  echo "<span>".number_format($urunler[3],2,",",".")." TL </span>";
		  echo "<a href='?url=urundetay&urun_id=".$urunler[0]."'><div class='incele'>İNCELE</div></a>";
		  echo "</div>";
	}
}
else
{
	header("location:index.php");
}
?>
</div>