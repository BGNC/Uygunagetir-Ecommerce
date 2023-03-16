<?php
if(isset($_SESSION["yonetici"]))
{
?>
<div style=" background-color:#fff; width:750px; margin:50px auto; padding:50px 0px; border-radius:5px;">
<?php
 
 @$i=$_GET["i"];
 if($i=="")
 {
	 include("urunekle.php");
 }
 else
 {
	 include("urunguncelle.php");
 }
 
 include("urunlistele.php");
 
?>
	
</div>
<?php	
}
else
{
	header("location:giris.php");
}

?>