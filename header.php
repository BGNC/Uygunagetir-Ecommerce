<?php
include("baglanti.php");
session_start(); 

$toplam_urun=0;
if(isset($_SESSION["sepet"])){
    $urunler=$_SESSION["sepet"];
    foreach ($urunler as $urun) {
        $toplam_urun+=$urun["adet"];
    }
}


?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<!-- Begin Head -->
<head>

    <meta charset="utf-8">
    <title><?php echo $site_title; ?></title>

    <!-- Begin Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="A Template by PixelZeesh"/>
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, Responsive"/>
    <meta name="author" content="onur genç"/>
    <!-- End Meta Tags -->

   

    <!-- Begin Stylesheets -->
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="includes/entypo/style.css">
    <link type="text/css" rel="stylesheet" href="includes/icomoon/style.css">
    <link type="text/css" rel="stylesheet" href="includes/font-awesome/css/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="js/jquery-ui/jquery-ui-1.10.3.custom.min.css">
    <link type="text/css" rel="stylesheet" href="js/rs-plugin/css/settings.css" />
    <link type="text/css" rel="stylesheet" href="js/owl-carousel/owl.carousel.css">
    <link type="text/css" rel="stylesheet" href="js/owl-carousel/owl.theme.css">
    <link type="text/css" rel="stylesheet" href="js/flexslider/style.css">
    <link type="text/css" rel="stylesheet" href="js/easy-pie-chart/style.css">
    <link type="text/css" rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css">
    <link type="text/css" rel="stylesheet" href="js/isotope/isotope.css">
    <link type="text/css" rel="stylesheet" href="js/tooltipster/tooltipster.css">
    <link type="text/css" rel="stylesheet" href="css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="css/colors.css">
    <link type="text/css" rel="stylesheet" href="css/color-green.css">
    <link id="main-style" type="text/css" rel="stylesheet" href="css/style.css">
    <!-- End Stylesheets -->

    <!-- Begin JavaScript ( rest of Javascript after footer area) -->
    
    

    <!-- End JavaScript -->

</head>
<!-- End Head -->


<!-- Begin Body -->
<body>

    <!-- Begin Header -->
    <header class="style-1 version-4">
        <div class="header-container">
     
            <div class="content-inner clearfix">

                <a href="anasayfa.html" class="logo-container ">
                    <img alt="" src="images/logo.png">
                </a>
     
                <a href="#" class="mobile-navigation fa fa-bars"></a>
                
                <div class="menu-nav">

                    <a href="sepet.html" class="shopping-bag active">
                        <i class="icon2-cart3"></i> 
                        <?php
                        if(count(@$_SESSION["sepet"])>0){

                        ?>

                        <span class="cart-items"><?php echo $toplam_urun; ?></span>

                        <?php } ?>
                    </a>

                    <nav>
                        <ul>
                            <li>
                                <a href="anasayfa.html">
                                    Anasayfa
                                    <span class="arrow-down icon1-angle-down"></span>
                                </a>
                            </li>


                            <?php

                            $kategorisql    =   mysqli_query("SELECT * FROM kategori ORDER BY kategori_adi ASC",$baglanti);
                            while($kategorigetir=mysqli_fetch_array($kategorisql))
                            { 
                                $kategori_id=$kategorigetir["kategori_id"];
                            ?>

                            <li>
                                <a href="#">
                                    <?php echo $kategorigetir["kategori_adi"]; ?>
                                    <span class="arrow-down fa fa-angle-down "></span>
                                </a>

                                <ul>
                                    <?php
                                    $sorgu=mysqli_query("SELECT * FROM altkategori where kategori_id=$kategori_id ORDER BY altkategori_adi ASC",$baglanti);
                                    while($kayit=mysqli_fetch_array($sorgu)){
                                    ?>
                                    <li><a href="kategori-<?php echo seo($kayit["altkategori_adi"]).'-'.$kayit["altkategori_id"]?>.html"><?php echo $kayit["altkategori_adi"]; ?></a></li>
                                    <?php } ?>
                                </ul>

                            </li>

                            <?php } ?>    

                            <?php
                            if(empty($_SESSION["uye"])){

                            ?>
                                <li>
                                    <a href="giris.html">
                                        Kayıt Ol
                                        
                                    </a>
                                </li>

                                <li>
                                    <a href="giris.html">
                                        Oturum Aç
                                        
                                    </a>
                                </li>
                            <?php
                            }
                            else { ?>

                               <li>
                                    <a href="cikis.php">
                                        Çıkış Yap
                                        
                                    </a>
                                </li>
                            
                            <?php } ?>

                        </ul>
                    </nav>

                </div>
                
            </div>
     
        </div>
    </header>
    <!-- End Header -->