<?php
if(isset($_SESSION["yonetici"]))
{
	
	$getir=mysql_fetch_array(@mysql_query("SELECT * FROM altkategori"))				
?>
<form name="altkategori" action="altkategoriekleok.php?kategori_id=<?php echo $kategori_id; ?>" method="post">
<table align="center">
	<tr>
    	<td><span class="metin">Üst Kategori</span></td>
        <td>:</td>
        <td colspan="2"><span class="metin"><?php echo $kategori_adi; ?></span></td> 
    </tr>
	<tr>
    	<td><span class="metin">Kategori Adı</span></td>
        <td>:</td>
        <td><input type="text" name="kategoriadi" class="uruntext"></td> 
        <td><input type="submit" value="KAYDET" class="urunbuton"></td>
    </tr>
</table>
</form>

<?php
}
else
{
	header("location:giris.php");
}

?>
