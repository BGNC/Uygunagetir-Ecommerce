<table id="tablo" align="center" style="margin-top:20px;">
<thead>
	<th width="50">SN</th>
    <th width="150">Kategori Adı</th>
    <th width="170">Alt Kategori Ekle</th>
    <th colspan="2"></th>
</thead>
<tbody>
<?php
$sira=0;
$sorgu	=	@mysql_query("SELECT * FROM kategori",$baglanti);
while($kategoriler=mysql_fetch_array($sorgu))
{
	$sira++;
	echo "<tr>";
	echo "<td>".$sira."</td>";
	echo "<td>".$kategoriler[1]."</td>";
	echo "<td><a href='?sayfa=altkategori&kategori_id=".$kategoriler[0]."'>Alt Kategori Ekle</a></td>";
	echo "<td width='50'><a href='?sayfa=kategori&kategori_id=".$kategoriler[0]."&i=1'><img src='../resimler/g3.png' width='15' height='15' ></a></td>";
	echo "<td  width='50'><a href='kategorisil.php?kategori_id=".$kategoriler[0]."'><img src='../resimler/s.png'  width='15' height='15' ></a></td>";
}

?>
</tbody>
</table>