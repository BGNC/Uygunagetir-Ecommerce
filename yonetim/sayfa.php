<?php

@$sayfa	=	$_GET["sayfa"];

switch($sayfa)
{
	case "anasayfa" : include("anasayfa.php"); break;
	case "ayar"		: include("ayar.php"); break;
	case "cikis"	: include("cikis.php"); break;
	case "kategori" : include("kategori.php"); break;
	case "altkategori" : include("altkategori.php"); break;
	case "marka"    : include("marka.php"); break;
	case "urun"		: include("urun.php");break;
	case "indirim"  : include("indirim.php");break;
	case "pasif"    : include("pasifurunler.php");break;
	case "siparis"	: include("siparisler.php");break;
	case "kargokoduver" :include("kargokoduver.php");break;
	case "tumsatislar" :include("tumsatislar.php");break;
	default 		: include("anasayfa.php");  	
}

?>