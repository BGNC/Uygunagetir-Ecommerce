<?php 

include("header.php");

$id=$_GET["id"];

$urunsql	=	@mysql_query("SELECT urun.urun_id,uye.kadi,urun.urun_adi,urun.urun_resmi,urun.urun_ozellik,urun.urun_stok,urun.satici_id,urun.altkategori_id,urun.kategori_id FROM urun,uye WHERE urun.urun_id=$id AND urun.satici_id=uyeid",$baglanti);
$urungetir	=	mysql_fetch_array($urunsql);

$fiyatsql	=	@mysql_query("SELECT * FROM deger WHERE urun_id=$urungetir[0]",$baglanti);
$fiyatkayit	=	@mysql_fetch_array($fiyatsql);
$btarih		=	date("Y-m-d");
$bas_tarih	=	$fiyatkayit[6];
$bit_tarih	=	$fiyatkayit[7];
$fiyat		=	$fiyatkayit[4];

$alt 		=	$urungetir["altkategori_id"];
$ust 		=   $urungetir["kategori_id"];

if($bas_tarih<=$btarih && $bit_tarih>=$btarih) $fiyat-=$fiyat*$fiyatkayit[5]/100; 			
?>

    <div class="top-header">
        <div class="content-inner clearfix">

            
            <div class="breadcrumbs">
                <a href="anasayfa.html" class="color-white hover-color-accent">Anasayfa</a>
                |
                <a href="#" class="color-white hover-color-accent"><?php echo $urungetir["urun_adi"];?></a>
               
            </div>

        </div>
    </div>

    <div class="grid-row">
        <div class="content-inner">

            <div class="divider80"></div>


            <div class="page-wrapper has-sidebar-right clearfix">

                <div class="products-wrapper">

                    <div class="product-single">

                        <div class="product-row clearfix">

                            <div class="product-media">
                                
                                    
                                        <img id="zoom_05" src="urunresimleri/<?php echo $urungetir["urun_resmi"]; ?>" data-zoom-image="urunresimleri/<?php echo $urungetir["urun_resmi"]; ?>">
                                        <!--<li><img src="images/shop1-2.png" alt=""></li>
                                        <li><img src="images/shop1-3.png" alt=""></li>
                                        <li><img src="images/shop1-1.png" alt=""></li>
                                        <li><img src="images/shop1-2.png" alt=""></li>
                                        <li><img src="images/shop1-3.png" alt=""></li>-->
                                    
                                
                                <!--<div id="product-img-nav" class="flexslider">
                                    <ul class="slides">
                                        <li><img src="images/shop1-1.png" alt=""></li>
                                        <li><img src="images/shop1-2.png" alt=""></li>
                                        <li><img src="images/shop1-3.png" alt=""></li>
                                        <li><img src="images/shop1-1.png" alt=""></li>
                                        <li><img src="images/shop1-2.png" alt=""></li>
                                        <li><img src="images/shop1-3.png" alt=""></li>
                                    </ul>
                                </div>-->
                                
                            </div>

                            <div class="product-inner">

                                <h4 class="product-name"><?php echo $urungetir["urun_adi"];?></h4>
                                <div class="product-price"><?php echo number_format($fiyat,2,",","."); ?> <i class="fa fa-try"></i></div>

                                <form class="cart clearfix" method="post" action="sepete_ekle.php">

                                    <div class="quantity">
                                        <input type="hidden" name="urun_id" value="<?php echo $id; ?>">
                                        <input type="button" value="-" class="minus hover-color-white hover-bg-accent">
                                        <input type="number" name="adet" step="1" min="1" value="1">
                                        <input type="button" value="+" class="plus hover-color-white hover-bg-accent">
                                    </div>

                                    <button type="submit" class="product-choose button-regular hover-color-semiblack hover-bg-white"><i class="icon3-bag"></i>Sepete Ekle</button>


                                </form>

                               <!-- <div class="product-info">
                                    <h6>Product Information</h6>
                                    <span>Product code:   000322</span>
                                    <span>Categories: <a href="#">Footwear</a>, <a href="#">Men</a>.</span>
                                    <span>Tags: <a href="#">Aspesi</a>, <a href="#">Blazers</a>, <a href="#">Tailoring</a>.</span>
                                </div>-->

                                <!--<div class="social-icons dark clearfix">
                                    <a href="#" class="icon1-twitter"></a>
                                    <a href="#" class="icon3-instagram"></a>
                                    <a href="#" class="icon3-dribbble"></a>
                                    <a href="#" class="icon3-facebook"></a>
                                    <a href="#" class="icon1-google-plus"></a>
                                </div>-->
                                
                            </div>

                        </div>

                        <div class="divider50"></div>

                        <div class="product-row">

                            <div class="tabs-1">
                             
                                <div class="tabs-container">
                             
                                    <ul>
                                        <li><a href="#tabs1-tab-1">Özellikler</a></li>
                                        <!--<li><a href="#tabs1-tab-2">Reviews (0)</a></li>
                                        <li><a href="#tabs1-tab-3">Returns &amp; Delivery</a></li>
                                        <li><a href="#tabs1-tab-4">F.A.Q's</a></li>-->
                                    </ul>
                             
                                    <div id="tabs1-tab-1">
                                    	<p><?php echo str_replace("\n","\n<br>",$urungetir[4]); ?></p>
                                        
                                    </div>
                             
                                    <!--<div id="tabs1-tab-2">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tristique risus tortor, vitae dignissim nunc porta ac. Quisque sit amet diam non augue rutrum luctus et sit amet est. Cras consequat tortor mauris. In tempus turpis eu felis suscipit, ut tincidunt tortor aliquam. Duis libero odio, vulputate eu erat in, tempor adipiscing turpis. Cras adipiscing ultricies quam, sed eleifend ipsum ultricies eget. Nam molestie sapien tristique, adipiscing arcu quis, viverra metus. Nullam ultrices, sem nec faucibus hendrerit, felis ipsum gravida neque, nec ultricies quam libero quis leo. Mauris urna dolor, suscipit at eleifend in, molestie id turpis. Aliquam erat volutpat. Etiam a purus lorem. Aenean vel ligula nulla. Nunc quis iaculis elit, eu aliquam nisi</p>
                                        <p>Sed eleifend ipsum ultricies eget. Nam molestie sapien tristique, adipiscing arcu quis, viverra metus. Nullam ultrices, sem nec faucibus hendrerit, felis ipsum gravida neque, nec ultricies quam libero quis leo. Mauris urna dolor, suscipit at eleifend in, molestie id turpis. Aliquam erat volutpat. Etiam a purus lorem. Aenean vel ligula nulla. Nunc quis iaculis elit, eu aliquam nisi</p>
                                    </div>
                             
                                    <div id="tabs1-tab-3">
                                        <p>Sed eleifend ipsum ultricies eget. Nam molestie sapien tristique, adipiscing arcu quis, viverra metus. Nullam ultrices, sem nec faucibus hendrerit, felis ipsum gravida neque, nec ultricies quam libero quis leo. Mauris urna dolor, suscipit at eleifend in, molestie id turpis. Aliquam erat volutpat. Etiam a purus lorem. Aenean vel ligula nulla. Nunc quis iaculis elit, eu aliquam nisi</p>
                                    </div>
                             
                                    <div id="tabs1-tab-4">
                                        <p>Sed eleifend ipsum ultricies eget. Nam molestie sapien tristique, adipiscing arcu quis, viverra metus. Nullam ultrices, sem nec faucibus hendrerit, felis ipsum gravida neque, nec ultricies quam libero quis leo. Mauris urna dolor, suscipit at eleifend in, molestie id turpis. Aliquam erat volutpat. Etiam a purus lorem. Aenean vel ligula nulla. Nunc quis iaculis elit, eu aliquam nisi</p>
                                    </div>-->
                             
                                </div>
                             
                            </div>

                        </div>

                        <div class="divider50"></div>

                    </div>

                    <div class="product-row">

                        <h5 class="light">İlgili Ürünler</h5>

                        <ul class="products clearfix">
                        <?php	

                      	$sql="SELECT urun.urun_id,urun.urun_adi,urun.urun_resmi,deger.fiyat FROM urun,deger WHERE urun.gorunum=1 AND urun.urun_id!=$id AND urun.altkategori_id=$alt AND urun.urun_id=deger.urun_id ORDER BY urun.urun_id DESC LIMIT 3";
	                    @$filtresql=@mysql_query($sql,$baglanti);
					    while($filtrekayitlar=mysql_fetch_array($filtresql))
	     				{
							//deger tablosundaki başlama ve bitiştarihleri oku
							$bugununtarihi=date("Y-m-d");
							$sqlindirim="select * from deger where urun_id=$filtrekayitlar[0]";
							$sorguindirim=mysql_query($sqlindirim,$baglanti);
							$f=mysql_fetch_array($sorguindirim);
							$fiyat=$filtrekayitlar[3];
							if($bugununtarihi>=$f[6] and $bugununtarihi<=$f[7]) $fiyat-=($fiyat*$f[5]/100);

	                    ?>

                      	
                        	
                            <li class="product one-third animated" data-animation="fadeIn" data-animation-delay="0">
                                <div class="product-media">
                                    <img src="urunresimleri/<?php echo $filtrekayitlar["urun_resmi"]; ?>" alt="">
                                    <div class="overlay">
                                        <a id="example1" href="urunresimleri/<?php echo $filtrekayitlar["urun_resmi"]; ?>" class="product-zoom icon3-search"></a>
                                    </div>
                                </div>
                                <a href="urundetay-<?php echo seo($filtrekayitlar["urun_adi"]).'-'.$filtrekayitlar["urun_id"]?>.html"><h5 class="product-name"><?php echo $filtrekayitlar[1]; ?></h5></a>
                                
                                <div class="product-price"><?php echo number_format($fiyat,2,",",".") ?> <i class="fa fa-try"></i></div>
                                <a href="urundetay-<?php echo seo($filtrekayitlar["urun_adi"]).'-'.$filtrekayitlar["urun_id"]; ?>.html" class="product-choose button-regular hover-color-semiblack hover-bg-white"><i class="icon3-bag"></i>Sepete Ekle</a>
                            </li>
                          <?php } ?>
                        </ul>

                    </div>

                </div>

                <div class="sidebar sidebar-right">


                    <div class="widget widget-categories">
                        <h5><span>Kategori</span></h5>
 
                        <ul>
                            <?php 
		                        $kategori_sorgu=mysql_query("SELECT * FROM altkategori WHERE kategori_id=$ust ORDER BY altkategori_adi ASC");
		                        while($rows=mysql_fetch_array($kategori_sorgu))
		                        { ?>
		                            <li>
		                                <a href="kategori-<?php echo seo($rows["altkategori_adi"]).'-'.$rows["altkategori_id"]; ?>.html">
		                                    <i class="fa fa-angle-double-right" style="font-size: 16px;"></i> <?php echo $rows["altkategori_adi"]; ?>
		                                </a>
		                            </li>
		                        <?php } ?>    
                        </ul>
                        </ul>
                    </div>

                </div>

            </div>

            

            <div class="divider50"></div>

        </div>
    </div>



<?php include("footer.php"); ?>