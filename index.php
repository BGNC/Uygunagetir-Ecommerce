<?php include("header.php"); ?>

 <!-- Begin Slideshow -->
    <div class="slideshow-container style-4">
        <div class="slideshow-inner">
            <ul>

            	<?php
            	$sorgu=mysql_query("SELECT * FROM slide ORDER BY id ASC");
            	while ($rows=mysql_fetch_array($sorgu)) {
            	
            	?>	
                 <li data-transition="fade" data-slotamount="8" data-masterspeed="500" >

                   
                    <img src="slide/<?php echo $rows["dosya_adi"]; ?>"  alt=""  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
             
                </li>

                <?php } ?>
                
            

            </ul>
        </div>
    </div>
    <!-- End Slideshow -->

    <div class="grid-row">
        <div class="content-inner">

            <div class="divider80"></div>


            <h4 class="light">Vitrin Ürünler</h4>

            <ul class="products clearfix">

            <?php
            $vitrinsql  =   @mysql_query("SELECT urun.urun_id,urun.urun_adi,urun.urun_resmi,deger.fiyat FROM urun,deger WHERE urun.vitrin=1 AND urun.urun_id=deger.urun_id ORDER BY urun.sira ASC");
            while($vitrinkayitlar=@mysql_fetch_array($vitrinsql))
            {
                $btarih=date("Y-m-d");
                $vfiyat=$vitrinkayitlar[3];
                $degersql="SELECT * FROM deger WHERE urun_id=$vitrinkayitlar[0]";
                $degersorgu=@mysql_query($degersql,$baglanti);
                $degeroku=@mysql_fetch_array($degersorgu);
            
            if($degeroku[6]<=$btarih && $degeroku[7]>=$btarih) $vfiyat-=$vfiyat*$degeroku[5]/100;

            ?>
            <li class="product one-fourth animated" data-animation="fadeIn" data-animation-delay="0">
                    <div class="product-media">
                        <img src="urunresimleri/<?php echo $vitrinkayitlar[2];?>" alt="">
                        <div class="overlay">
                            <a  id="example1" href="urunresimleri/<?php echo $vitrinkayitlar[2];?>" class="product-zoom icon3-search facybox-image"></a>
                           
                        </div>
                    </div>
                    <a href="urundetay-<?php echo seo($vitrinkayitlar[1]).'-'.$vitrinkayitlar[0];?>.html"><h5 class="product-name"><?php echo $vitrinkayitlar[1]; ?></h5></a>
                    <div class="product-price"><?php echo number_format($vfiyat,2,",","."); ?> <i class="fa fa-try"></i></div>
                    <a href="urundetay-<?php echo seo($vitrinkayitlar[1]).'-'.$vitrinkayitlar[0]; ?>.html" class="product-choose button-regular hover-color-semiblack hover-bg-white"><i class="icon3-bag"></i> Sepete Ekle</a>
            </li>
           
            <?php } ?>  

            </ul>

             <div class="divider50"></div>
             

            <h4 class="light">İndirimli Ürünler</h4>



            <ul class="products clearfix">

            <?php
            @$tarih=date("Y-m-d");
            $indirimsql =   @mysql_query("SELECT urun.urun_id,urun.urun_adi,urun.urun_resmi,deger.indirim_orani FROM urun,deger WHERE deger.indirim_orani!=0 AND deger.bas_tarih<='$tarih' AND bit_tarih>='$tarih' AND deger.urun_id=urun.urun_id ORDER BY deger.indirim_orani DESC",$baglanti);
            while($indirimkayitlar=@mysql_fetch_array($indirimsql))
            {
                $fiyatsql=@mysql_query("SELECT * from deger WHERE urun_id=$indirimkayitlar[0]",$baglanti);
                $fiyatdeger=@mysql_fetch_array($fiyatsql);
                $indirimoran=$fiyatdeger[5];
                $ifiyat=$fiyatdeger[4];
                $ifiyat-=$ifiyat*$indirimoran/100;

            ?>    

                <li class="product one-fourth animated" data-animation="fadeIn" data-animation-delay="0">
                    <div class="product-media">
                        <img src="urunresimleri/<?php echo $indirimkayitlar[2]; ?>" alt="">
                        <div class="overlay">
                            <a id="example1" href="urunresimleri/<?php echo $indirimkayitlar[2];?>" class="product-zoom icon3-search facybox-image"></a>
                        </div>
                    </div>
                    <!--  THERE İS A BİG PROBLEM -->
                    <a href="urundetay-<?php echo seo($indirimkayitlar[1]).'-'.$indirimkayitlar[0];?>.html"><h5 class="product-name"><?php echo $indirimkayitlar[1]; ?></h5></a>
                    <div class="product-price"><?php echo number_format($ifiyat,2,",","."); ?> <i class="fa fa-try"></i></div>
                    <a href="urundetay-<?php echo seo($indirimkayitlar[1]).'-'.$indirimkayitlar[0]; ?>.html" class="product-choose button-regular hover-color-semiblack hover-bg-white"><i class="icon3-bag"></i>Sepete Ekle</a>
                </li>
                <!--- ABOVE YOU SHOULD CORRECT YOUR MİSTAKES. -->
            

            <?php } ?>
            </ul>
            
    </div>
</div>

<div class="divider80"></div>



<?php include("footer.php"); ?>