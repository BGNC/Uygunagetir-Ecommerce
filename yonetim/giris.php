<?php
ob_start();
session_start();
if(empty($_SESSION["yonetici"]))
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Giriş</title>
    <meta charset="utf-8" />
    <style>
	 body{ margin:0; padding:0; font-family: "Raleway", sans-serif; font-size:14px; background-color:#f1f1f1;}
	 .giris{
		 width:400px;
		 
		  padding:25px 0; 
			margin:0 auto;
			margin-top:200px;	
		 }
		.giristext{
			width:300px;
			height:30px;
			border:1px solid #ccc;
			border-radius:3px;
			font-size:14px;
			text-indent:10px;
			} 
		.button{
			width:302px;
			height:35px;
			background-color:#4caf50;
			border:0px;
			color:#fff;
			padding:8px;
			font-weight:bold;
			
		}
		 
	</style>
</head>
<body>
<div class="giris">
<form name="girisyap" action="girisok.php" method="post">
<table align="center">
    <tr>
    	<td><input type="text" name="kadi" class="giristext" placeholder="Kulllanıcı Adı" /></td>
    </tr>
    <tr>
    	<td><input type="password" name="sifre" class="giristext" placeholder="Şifre"/></td>
    </tr>
    <tr>
    	  <td><input type="submit" value="GİRİŞ YAP" class="button" /></td>
    </tr>
</table>
</form>
</div>
</body>
</html>
<?php
}
else
{
	header("location:index.php?sayfa=anasayfa");
	
}
ob_end_flush();
?>