<?php
if(isset($_SESSION["yonetici"]))
{
?>
<div style=" background-color:#fff; width:750px; margin:50px auto; padding:50px 0px; border-radius:5px;">
<?php
echo '<table id="tablo" align="center">
<thead>
	<th width="50">SN</th>
    <th width="100">Satıcı</th>
    <th width="200">Ürün Adı</th>
    <th width="60">Stok</th>
    <th width="70"></th>
</thead>';
$sira=0;
$urunsql=@mysql_query("SELECT urun.urun_id,uye.kadi,urun.urun_adi,urun.urun_stok FROM urun,uye WHERE gorunum=0 AND urun.satici_id=uye.uyeid",$baglanti);
while($urunkayit=mysql_fetch_array($urunsql))
{
	$sira++;
	echo "<tr>";
	echo "<td>".$sira."</td>";
	echo "<td>".$urunkayit[1]."</td>";
	echo "<td>".$urunkayit[2]."</td>";
	echo "<td>".$urunkayit[3]."</td>";
	echo "<td width='70'><a href='aktif.php?id=".$urunkayit[0]."'>Aktif Et</a></td>";
	echo "</tr>";
}
echo "</table>";
?>
</div>
<?php	
}
else
{
	header("location:giris.php");
}

?>