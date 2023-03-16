<?php 
include("header.php");
$id=$_GET["id"];

$alt_kategori=mysql_fetch_array(mysql_query("SELECT * FROM altkategori WHERE altkategori_id=$id"));
$kategori_id=$alt_kategori["kategori_id"];
$kategori=mysql_fetch_array(mysql_query("SELECT * FROM kategori WHERE kategori_id=$kategori_id"));



?>
  <div class="top-header">
        <div class="content-inner clearfix">
            
            <div class="breadcrumbs">
                <a href="anasayfa.html" class="color-white hover-color-accent">Anasayfa</a>
                |
                <a href="#" class="color-white hover-color-accent"><?php echo $kategori["kategori_adi"]; ?></a>
                |
                <a href="#" class="color-white hover-color-accent"><?php echo $alt_kategori["altkategori_adi"]; ?></a>
            </div>

        </div>
    </div>


    <div class="grid-row">
        <div class="content-inner">

            <div class="divider80"></div>


            <div class="page-wrapper has-sidebar-left clearfix">

                <div class="products-wrapper">

                    <ul class="products clearfix">

                    <?php 

                    $sql="SELECT urun.urun_id,urun.urun_adi,urun.urun_resmi,deger.fiyat FROM urun,deger WHERE urun.gorunum=1 AND urun.altkategori_id=$id AND urun.urun_id=deger.urun_id";
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
                                <img src="urunresimleri/<?php echo $filtrekayitlar[2]; ?>" alt="">
                                <div class="overlay">
                                    <a id="example1" href="urunresimleri/<?php echo $filtrekayitlar[2]; ?>" class="product-zoom icon3-search facybox-image"></a>
                                </div>
                            </div>
                            <a href="urundetay-<?php echo seo($filtrekayitlar["urun_adi"]).'-'.$filtrekayitlar["urun_id"] ?>.html"><h5 class="product-name"><?php echo $filtrekayitlar[1]; ?></h5></a>
                            <div class="product-price"><?php echo number_format($fiyat,2,",",".") ?> <i class="fa fa-try"></i></div>
                            <a href="urundetay-<?php echo seo($filtrekayitlar["urun_adi"]).'-'.$filtrekayitlar["urun_id"]; ?>.html" class="product-choose button-regular hover-color-semiblack hover-bg-white"><i class="icon3-bag"></i>Sepete Ekle</a>
                        </li>
                    <?php } ?>    	
                    </ul>
                </div>

                <div class="sidebar sidebar-left">

                    <div class="widget widget-categories">
                        <h5><span>Kategori</span></h5>
 
                        <ul>
                        <?php 
                        $kategori_sorgu=mysql_query("SELECT * FROM altkategori WHERE kategori_id=$kategori_id");
                        while($rows=mysql_fetch_array($kategori_sorgu))
                        { ?>
                            <li>
                                <a href="kategori-<?php echo seo($rows["altkategori_adi"]).'-'.$rows["altkategori_id"]; ?>.html">
                                    <i class="fa fa-angle-double-right" style="font-size: 16px;"></i> <?php echo $rows["altkategori_adi"]; ?>
                                </a>
                            </li>
                        <?php } ?>    
                        </ul>
                    </div>

                </div>

            </div>

            

           

        </div>
    </div>

    <div class="divider100"></div>

<?php include("footer.php"); ?>