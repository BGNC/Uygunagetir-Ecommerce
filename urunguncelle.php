<div style="padding:25px 0 25px 0;">

<?php
if(isset($_SESSION["uye"]))
{
	$urun_id	=	$_GET["urun_id"];
	$urungetir	=	mysql_fetch_array(@mysql_query("SELECT urun.marka_id,urun.kategori_id,urun.altkategori_id,urun.urun_adi,deger.fiyat,urun.urun_ozellik,urun.urun_stok FROM urun,deger WHERE urun.urun_id=$urun_id AND urun.urun_id=deger.urun_id",$baglanti));
	$marka_id	=	$urungetir[0];
	$kategori_id	=	$urungetir[1];
	$altkategori_id	=	$urungetir[2];
	$urunadi	=	$urungetir[3];
	$urun_fiyat	=	$urungetir[4];
	$urun_ozellik	=	$urungetir[5];
	$urun_stok	=	$urungetir[6];
			
?>
<form name="urun" action="urunguncelleok.php?urun_id=<?php echo $urun_id; ?>" method="post" enctype="multipart/form-data">
<table width="400" align="center">
	<tr>
    	<td width="90" height="25" valign="top"><span class="metin">Marka</span></td>
        <td width="15" height="25" align="center" valign="top">:</td>
        <td width="279" height="25" valign="top">
        <select name="marka_id" class="urunselect">
        <option value="0"></option>
        <?php
		$markasql=@mysql_query("SELECT * FROM marka",$baglanti);
		while($markakayit=mysql_fetch_array($markasql))
		{
		?>	
		<option value="<?php echo $markakayit[0];?>" <?php if($markakayit[0]==$marka_id){?> selected="selected" <?php }?>><?php echo $markakayit[1]; ?></option>
        <?php
		}
		?>
        </select></td>
    </tr>
    <tr>
    	<td height="25" valign="top"><span class="metin">Kategori</span></td>
        <td height="25" align="center" valign="top">:</td>
        <td height="25" valign="top">
        <select name="kategori_id" class="urunselect" id="kategori">
        <option value="0"></option>
        <?php
		$kategorisql=@mysql_query("SELECT * FROM kategori",$baglanti);
		while($kategorikayit=mysql_fetch_array($kategorisql))
		{
		?>
		<option value="<?php echo $kategorikayit[0];?>" <?php if($kategorikayit[0]==$kategori_id){?> selected="selected"<?php } ?> ><?php echo $kategorikayit[1]; ?></option>
        <?php
		}
		?>
        </select></td>
    </tr>
    <tr>
    	<td height="25" valign="top"><span class="metin">Alt Kategori</span></td>
        <td height="25" align="center" valign="top">:</td>
        <td height="25" valign="top"><select name="altkategori_id" class="urunselect" id="altkategori">
        <?php
		$altkategori=@mysql_query("SELECT * FROM altkategori WHERE kategori_id=$kategori_id",$baglanti);
		while($altkategorigetir=mysql_fetch_array($altkategori))
		{
		?>
        	<option value="<?php echo $altkategorigetir[0]; ?>" <?php if($altkategorigetir[0]==$altkategori_id){ ?> selected="selected" <?php } ?>><?php echo $altkategorigetir[2]; ?></option>
        <?php } ?>
        </select></td>
    </tr>
    <tr>
    	<td height="25" valign="top"><span class="metin">Ürün Adı</span></td>
        <td height="25" align="center" valign="top">:</td>
      <td height="25" valign="top"><input type="text" name="urunadi" class="uruntext" value="<?php echo $urunadi; ?>" /></td>
    </tr>
    <tr>
    	<td height="25" valign="top"><span class="metin">Ürün Fiyatı</span></td>
        <td height="25" align="center" valign="top">:</td>
        <td height="25" valign="top"><input type="text" name="urunfiyati" class="uruntext" value="<?php echo $urun_fiyat; ?>" /></td>
    </tr>
    <tr>
    	<td height="25" valign="top"><span class="metin">Stok Adeti</span></td>
        <td height="25" align="center" valign="top">:</td>
        <td height="25" valign="top"><input type="text" name="stok" class="uruntext" value="<?php echo $urun_stok; ?>"  /></td>
    </tr>
    <tr>
    	<td height="25" valign="top"><span class="metin">Ürün Özellik</span></td>
        <td height="25" align="center" valign="top">:</td>
      <td height="25" valign="top"><textarea name="ozellik" class="uruntextarea"><?php echo $urun_ozellik; ?></textarea></td>
    </tr>
    <tr>
    	<td height="25" valign="top"><span class="metin">Ürün Resim</span></td>
        <td height="25" align="center" valign="top">:</td>
        <td height="25" valign="top"><input type="file" name="resim" /></td>
    </tr>
    <tr>
    	<td height="25"></td>
        <td height="25"></td>
        <td height="25"><input type="submit" value="GÜNCELLE" class="urunbuton" /></td>
    </tr>
</table>
</form>
<?php	
}
else
{
	header("location:index.php");
}

?>
</div>