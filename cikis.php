<?php
ob_start();
session_start();
if($_SESSION["uye"])
{
	unset($_SESSION["uye"]);
	header("location:anasayfa.html");
}

?>