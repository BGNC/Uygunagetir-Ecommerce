<?php include("header.php"); ?>

<?php 

	$toplam=$_POST["siparis_toplam"]; 
	if(isset($_SESSION["uye"])){

?>

    <div class="top-header">
        <div class="content-inner clearfix">
            
            <div class="breadcrumbs">
                <a href="anasayfa.html" class="color-white hover-color-accent">Anasayfa</a>
                |
               
                <a href="#" class="color-white hover-color-accent">Ödeme</a>
            </div>

        </div>
    </div>

     <div class="grid-row">
        <div class="content-inner">

            <div class="divider80"></div>

            <form class="shop-cart-checkout clearfix" method="post" action="odemeyapok.php">

                <div class="billing-address one-half">
                    <h5 class="light">Toplam Tutar : <?php echo number_format($toplam,2,",","."); ?> <i class="fa fa-try"></i></h5> 

                    <input type="text" class="full-width" placeholder="Kart Numarsı" >

                    <select class="half-width">
                        <option value="">01</option>
                        <option value="">02</option>
                        <option value="">03</option>
                       	<option value="">04</option>
                       	<option value="">05</option>
                       	<option value="">06</option>
                       	<option value="">07</option>
                       	<option value="">08</option>
                        <option value="">09</option>
                        <option value="">10</option>
                       	<option value="">11</option>
                       	<option value="">12</option> 
                        
                    </select>

                        <select class="half-width">
                        <option value="">2017</option>
                        <option value="">2018</option>
                        <option value="">2019</option>
                        <option value="">2020</option>
                        <option value="">2021</option>
                        <option value="">2023</option>
                        <option value="">2024</option>
                        <option value="">2025</option>
                        <option value="">2026</option>
                        <option value="">2027</option>
                        
                    </select>


                    
                    <input type="text" class="full-width" placeholder="Güvenlik Kodu" >
                   

                     <input type="submit" class="button-regular hover-bg-semiblack hover-border-semiblack" value="Satışı Gerçekleştir">

                </div>

           

                <div class="divider50 clear"></div>

         

            </form>
            
            <div class="divider50"></div>

        </div>
    </div>

    <?php } else { header("location:giris.html"); } ?>

<?php include("footer.php"); ?>