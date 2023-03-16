<?php
if(isset($_SESSION["yonetici"]))
{
?>	
<form name="kategoriekle" action="kategoriok.php" method="post">
<table align="center">
	<tr>
    	<td><span class="metin">Kategori Adı</span></td>
        <td><span class="metin">:</span></td>
        <td><input type="text" name="kategori"  class="uruntext" /></td>
        <td><input type="submit" value="KAYDET" class="urunbuton" /></td> 
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