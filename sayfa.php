<?php
@$url=$_GET["url"];
switch($url)
{
	case "anasayfa" :	include("anasayfa.php"); break;
	case "urundetay":	include("urundetay.php");break;
	case "urunfiltre" : include("urunfiltre.php");break;
	case "uyeol"	:	include("uyeol.php");break;	
	case "giris"	:	include("giris.php");break;	
	case "cikis"	:	include("cikis.php");break;	
	case "sepet"	:	include("sepet.php");break;
	case "odeme"	:	include("odemeyap.php");break;
	case "odemesonuc" : include("odemeyapok.php");break;
	case "aldiklarim" : include("aldiklarim.php");break;
	case "hesapayar" : include("hesapayar.php");break;
	case "satisyap"	: include("satisyap.php");break;	
	case "urunlerim" : include("urunlerim.php");break;	
	case "siparisler" : include("siparislerim.php");break;
	case "kargokoduver" : include("kargokoduver.php"); break;
	case "sattiklarim" : include("sattiklarim.php");break;
	case "urunguncelle" : include("urunguncelle.php");break;
	case "kurunler"	: include("kurunleri.php");break;				
	default 		:	include("anasayfa.php");
}
?>