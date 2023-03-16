<?php
if(isset($_SESSION["uye"]))
{
?>
<div class="menuort" style="padding:50px 0 50px 0;">
<form name="urun" action="satisok.php" method="post" enctype="multipart/form-data">
<table width="400" align="center" cellpadding="3">
	<tr>
    	<td width="90" height="25" valign="top"><span class="metin">Marka</span></td>
        <td width="15" height="25" align="center" valign="top">:</td>
        <td width="279" height="25" valign="top">
        <select name="marka_id" class="satis-select">
        <option value="0"></option>
        <?php
		$markasql=@mysql_query("SELECT * FROM marka",$baglanti);
		while($markakayit=mysql_fetch_array($markasql))
		{
			echo "<option value=".$markakayit[0].">".$markakayit[1]."</option>";
		}
		?>
        </select></td>
    </tr>
    <tr>
    	<td height="25" valign="top"><span class="metin">Kategori</span></td>
        <td height="25" align="center" valign="top">:</td>
        <td height="25" valign="top">
        <select name="kategori_id" class="satis-select" id="kategori">
        <option value="0"></option>
        <?php
		$kategorisql=@mysql_query("SELECT * FROM kategori",$baglanti);
		while($kategorikayit=mysql_fetch_array($kategorisql))
		{
			echo "<option value=".$kategorikayit[0].">".$kategorikayit[1]."</option>";
		}
		?>
        </select></td>
    </tr>
    <tr>
    	<td height="25" valign="top"><span class="metin">Alt Kategori</span></td>
        <td height="25" align="center" valign="top">:</td>
        <td height="25" valign="top"><select name="altkategori_id" class="satis-select" id="altkategori"><option value="0"></option></select></td>
    </tr>
    <tr>
    	<td height="25" valign="top"><span class="metin">Ürün Adı</span></td>
        <td height="25" align="center" valign="top">:</td>
      <td height="25" valign="top"><input type="text" name="urunadi" class="satis-text" /></td>
    </tr>
    <tr>
    	<td height="25" valign="top"><span class="metin">Ürün Fiyatı</span></td>
        <td height="25" align="center" valign="top">:</td>
        <td height="25" valign="top"><input type="text" name="urunfiyati" class="satis-text" /></td>
    </tr>
    <tr>
    	<td height="25" valign="top"><span class="metin">Stok Adeti</span></td>
        <td height="25" align="center" valign="top">:</td>
        <td height="25" valign="top"><input type="text" name="stok" class="satis-text" /></td>
    </tr>
    </tr>
    <tr>
    	<td height="25" valign="top"><span class="metin">Ürün Özellik</span></td>
        <td height="25" align="center" valign="top">:</td>
      <td height="25" valign="top"><textarea name="ozellik" class="satis-textarea"></textarea></td>
    </tr>
    <tr>
    	<td height="25" valign="top"><span class="metin">Ürün Resim</span></td>
        <td height="25" align="center" valign="top">:</td>
        <td height="25" valign="top"><input type="file" name="resim" /></td>
    </tr>
    <tr>
    	<td height="25"></td>
        <td height="25"></td>
        <td height="25"><input type="submit" value="KAYDET" class="satis-buton" /></td>
    </tr>
</table>
</form>
</div>
<?php		
}
else
{
	header("location:index.php");
}
?>