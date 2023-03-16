<?php include("header.php"); ?>

<div class="top-header">
        <div class="content-inner clearfix">
            
            <div class="breadcrumbs">
                <a href="anasayfa.html" class="color-white hover-color-accent">Anasayfa</a>
                |
                <a href="#" class="color-white hover-color-accent">Sepetiniz</a>
            </div>

        </div>
    </div>

     <div class="grid-row">
        <div class="content-inner">

            <div class="divider80"></div>

            <?php

            if(isset($_SESSION["sepet"]) && count($_SESSION["sepet"])>0 ){	

            ?>

            <form class="shop-cart clearfix" method="post" action="odeme.html">

                <table class="cart-table">

                    <tr>
                        <th class="product-action">&nbsp;</th>
                        <th class="product-thumb">Resim</th>
                        <th class="product-info">Ürün Bilgisi</th>
                        <th class="product-price">Fiyat</th>
                        <th class="product-quantity">Adet</th>
                        <th class="product-total">Toplam</th>
                    </tr>

                    <?php

                    $urunler=$_SESSION["sepet"];

                    $siparis_toplam=0;
                   	$sepet_toplam=0;

                    foreach ($urunler as $urun) {

                   		$id 	=	$urun["urun_id"];
                   		$adet	=	$urun["adet"];

                   			

                   		$sepetsql         =   "SELECT urun_adi,urun_resmi FROM urun WHERE urun_id=$id";
						$sepetsorgu       =   mysql_query($sepetsql,$baglanti);
						$sepetgetir       =   mysql_fetch_array($sepetsorgu);
					
						
						
						$degersql         =   "SELECT * FROM deger WHERE urun_id=$id";
						$degersorgu       =   mysql_query($degersql,$baglanti);
						$degergetir       =   mysql_fetch_array($degersorgu);
						$b_tarih          =   date("Y-m-d");
						$bas_tarih        =   $degergetir[6];
						$bit_tarih        =   $degergetir[7];
						$i_orani          =   $degergetir[5];
						$fiyat            =   $degergetir[4];
						$sepet_toplam     +=  $fiyat*$adet;
						if($bas_tarih<=$b_tarih && $bit_tarih>=$b_tarih) $fiyat-=$fiyat*$i_orani/100;
						
						$toplam_fiyat=$fiyat*$adet;	

                    	$siparis_toplam+=$toplam_fiyat;
                	?>

                    <tr>
                        <td class="product-action">
                            <a onclick="sepet_sil(<?php echo $id; ?>);" class="fa fa-remove bg-accent hover-border-semiblack hover-bg-semiblack"></a>
                        </td>
                        <td class="product-thumb">
                            <img src="urunresimleri/<?php echo $sepetgetir["urun_resmi"]; ?>" alt="">
                        </td>
                        <td class="product-info">
                            <?php echo $sepetgetir["urun_adi"];  ?>
                        </td>
                        <td class="product-price">
                            <?php echo number_format($fiyat,2,",","."); ?> <i class="fa fa-try"></i>
                        </td>
                        <td class="product-quantity">
                            <div class="quantity clearfix">
                               
                                <input type="number" onclick="$.sepet_guncelle(<?php echo $id; ?>,this.value);" id="adet" step="1" min="1" value="<?php echo $adet; ?>">
               
                            </div>
                        </td>
                     
                        <td class="product-total">
                            <?php echo number_format($toplam_fiyat,2,",","."); ?> <i class="fa fa-try"></i>
                        </td>
                    </tr>

                    <?php } ?>
                    

                </table>

                <div class="cart-total one-half last-col">

                    <h5 class="light">Sepet</h5>
                    <p>Ürün Toplamı <span><?php echo $toplam_urun; ?> adet</span></p>
                    <p>Sipariş Toplamı <span><?php echo number_format($siparis_toplam,2,",","."); ?> <i class="fa fa-try"></i></span></p>

                </div>

                <div class="cart-actions">
                    <a href="anasayfa.html"><input type="button" class="button-regular hover-bg-semiblack hover-border-semiblack" value="Alışverişe Devam Et"></a>
                    <input type="hidden" name="siparis_toplam" value="<?php echo $siparis_toplam; ?>">
                    <input type="submit" class="button-regular hover-bg-semiblack hover-border-semiblack" value="Ödeme">
                </div>

                <div class="divider50 clear"></div>

   
            </form>

            <?php
        	}
        	else{

        			echo "<h4>Sepetinizde Herhangi Bir Ürün Bulunmamaktadır.</h4>";
        	}
            ?>
            
            <div class="divider30"></div>

            <h5 class="light">Yeni Ürünler</h5>

            <ul class="products clearfix">

            	<?php 

            	$urun=mysql_query("SELECT * FROM urun,deger WHERE urun.urun_id=deger.urun_id ORDER BY urun.urun_id DESC LIMIT 4");
            	while($urunler=mysql_fetch_array($urun)){

            	?>

                <li class="product one-fourth animated" data-animation="fadeIn" data-animation-delay="0">
                    <div class="product-media">
                        <img src="urunresimleri/<?php echo $urunler["urun_resmi"]; ?>" alt="">
                        <div class="overlay">
                            <a id="example1" href="urunresimleri/<?php echo $urunler["urun_resmi"]; ?>" class="product-zoom icon3-search"></a>
                        </div>
                    </div>
                    <!-- BURADA KALDIN -->
                    <a href="urundetay-<?php echo seo($urunler["urun_adi"]).'-'.$urunler["urun_id"];?>.html"><h5 class="product-name"><?php echo $urunler["urun_adi"]; ?></h5></a>
                    <div class="product-price"><?php echo number_format($urunler["fiyat"],2,",","."); ?> <i class="fa fa-try"></i></div>
                    <a href="urundetay-<?php echo seo($urunler["urun_adi"]).'-'.$urunler["urun_id"]; ?>.html" class="product-choose button-regular hover-color-semiblack hover-bg-white"><i class="icon3-bag"></i>Sepete Ekle</a>
                </li>

                <?php } ?>
            </ul>

        </div>
    </div>

    <div class="divider50 clear"></div>

<?php include("footer.php"); ?>