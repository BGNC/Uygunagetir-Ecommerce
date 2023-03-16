<?php
if(isset($_SESSION["yonetici"])){
	@$i=$_GET["i"];
?>
<div style=" background-color:#fff; width:750px; margin:50px auto; padding:50px 0px; border-radius:5px;">
<center>
<select name="indirim_tipi" onchange="window.location=this.value"  style="width:398px; height:30px; margin-bottom:10px;">
<option value="?sayfa=indirim&i=1" <?php if($i==1){?> selected="selected" <?php } ?>>Tüm Ürünler</option>
<option value="?sayfa=indirim&i=2" <?php if($i==2){?> selected="selected" <?php } ?>>Kategoriye Göre</option>
<option value="?sayfa=indirim&i=3" <?php if($i==3){?> selected="selected" <?php } ?>>Diğer</option>
</select>
</center>
<?php
	switch($i)
	{
		case 1 : include("tumurunler.php");break;
		case 2 : include("tumkategoriler.php");break;
		case 3 : include("diger.php");break;
		default : include("tumurunler.php");
	}
?>
</div>
<?php
}
else
{
	header("location:giris.php");
}
?>