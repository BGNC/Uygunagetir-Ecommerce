<?php
if(isset($_SESSION["uye"]))
{
	$satis_id=$_GET["satis_id"];
?>
<div style=" min-height:350px; padding:50px 0 50px 0;">
<form name="" action="kargokoduverok.php?satis_id=<?php echo $satis_id; ?>" method="post">
<table align="center">
	<tr>
    	<td><span class="metin">Kargo Firma</span></td>
        <td><span class="metin">:</span></td>
        <td>
        <select name="kargoadi" class="urunselect">
        	<option value="ARAS">ARAS</option>
            <option value="MNG">MNG</option>
            <option value="UPS">UPS</option>
        </select>
        </td>
    </tr>
    <tr>
    	<td><span class="metin">Kargo Kodu</span></td>
        <td><span class="metin">:</span></td>
        <td><input type="text" name="kargokodu" class="uruntext" /></td>
    </tr>
    <tr>
    	<td></td>
        <td></td>
        <td><input type="submit" value="KARGO BİLGİSİ VER" class="urunbuton" /></td>
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