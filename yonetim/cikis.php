<?php
session_start();
if(isset($_SESSION["yonetici"]))
{
	unset($_SESSION["yonetici"]);
	header("location:giris.html");
	
}
else
{
	header("location:giris.html");
}
?>