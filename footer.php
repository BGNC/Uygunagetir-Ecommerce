
    <footer>
        <div class="content-inner clearfix">
            <!--<ul class="menu clearfix">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li><a href="#">Shortcodes</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Headers</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Shop</a></li>
            </ul>-->
            <p class="copyrights">© Copyright Tüm Hakları Saklıdır. <a href="">Uygunagetir</a></p>
        </div>
    </footer>

 

    <a href="#" class="back-to-top fa fa-angle-up"></a>




      <!-- Begin JavaScript -->
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false'></script>
    <script type="text/javascript" src="js/migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/modernizr-respond.js"></script>
    <script type="text/javascript" src="js/jquery.elevatezoom.js"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/scrollTo-min.js"></script>
    <script type="text/javascript" src="js/easing.1.3.js"></script>
    <script type="text/javascript" src="js/appear.js"></script>
    <script type="text/javascript" src="js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="js/easy-pie-chart/easy-pie-chart.js"></script>
    <script type="text/javascript" src="js/owl-carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/jflickrfeed.min.js"></script>
    <script type="text/javascript" src="js/flexslider/flexslider.min.js"></script>
     <script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="js/fancybox/fn.js"></script>
    <script type="text/javascript" src="js/isotope/isotope.min.js"></script>
    <script type="text/javascript" src="js/countTo.js"></script>
    <script type="text/javascript" src="js/gmap.min.js"></script>
    <script type="text/javascript" src="js/countdown.js"></script>
    <script type="text/javascript" src="js/tweetable.jquery.js"></script>
    <script type="text/javascript" src="js/timeago.js"></script>
    <script type="text/javascript" src="js/tooltipster/tooltipster.min.js"></script>
    <script type="text/javascript" src="js/parallax-1.1.3.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script>
        $(document).ready(function(){

            $("#zoom_05").elevateZoom({
              zoomType              : "inner",
              cursor: "crosshair"
            });


             $.sepet_guncelle=function(id,adet){
               $.get("sepetguncelle.php",{id:id,adet:adet},function(){
                window.location.href="sepet.html";
               });
             
            }

        });
    </script>
    <script type="text/javascript">

    function sepet_sil(deger){

        var cevap = confirm("Ürün Sepetinizden Kaldırılacak Emin Misiniz ?");
        if(cevap==true){

            window.location.href="sepetsil.php?id="+deger;
        }
    }

    </script>
 

   
  
    <!-- End JavaScript -->



</body>
<!-- End Body -->

</html>