<?php
if(isset($_SESSION["uye"]))
{
	$uyesql="SELECT * FROM uye WHERE kadi='".$_SESSION["uye"]."'";
	$uyesorgu=@mysql_query($uyesql,$baglanti);
	$uyegetir=@mysql_fetch_array($uyesorgu);
	$uyeid=$uyegetir[0];
	$ad=$uyegetir[3];
	$soyad=$uyegetir[4];
	$tel=$uyegetir[5];
	$email=$uyegetir[6];
	$adres=$uyegetir[7];
	$bhesapno=$uyegetir[8];
	
?>
<div style="width:600px; padding:15px 0px; margin:10px auto;">
<form action="hesapayarok.php?uye_id=<?php echo $uyeid; ?>" method="post">
<table align="center">
	<tr>
    	<td><span class="metin">Ad</span></td>
        <td><span class="metin">:</span></td>
        <td><input type="text" name="ad" class="uyetext" value="<?php echo $ad; ?>" /></td>
    </tr>
    <tr>
    	<td><span class="metin">Soyad</span></td>
        <td><span class="metin">:</span></td>
        <td><input type="text" name="soyad" class="uyetext" value="<?php echo $soyad?>" /></td>
    </tr>
    <tr>
    	<td><span class="metin">Telefon</span></td>
        <td><span class="metin">:</span></td>
        <td><input type="text" name="tel" class="uyetext" value="<?php echo $tel; ?>"  /></td>
    </tr>
    <tr>
    	<td><span class="metin">E-Mail</span></td>
        <td><span class="metin">:</span></td>
        <td><input type="text" name="email" class="uyetext" value="<?php echo $email; ?>"  /></td>
    </tr>
    <tr>
    	<td><span class="metin">Adres</span></td>
        <td><span class="metin">:</span></td>
        <td><textarea name="adres" class="uyeadres"><?php echo $adres; ?></textarea></td>
    </tr>
    <tr>
    	<td><span class="metin">Banka Hesap No</span></td>
        <td><span class="metin">:</span></td>
        <td><input type="text" name="bhesapno" class="uyetext" value="<?php echo $bhesapno ?>"  /></td>
    </tr>
    <tr>
    	<td></td>
        <td></td>
        <td><input type="submit" value="GÜNCELLE" class="uyebuton"/></td>
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