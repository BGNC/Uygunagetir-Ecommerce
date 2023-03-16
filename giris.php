<?php

include("header.php");

?>

    <div class="top-header">
        <div class="content-inner clearfix">

            
            <div class="breadcrumbs">
                <a href="anasayfa.html" class="color-white hover-color-accent">Anasayfa</a>
                |
                <a href="#" class="color-white hover-color-accent">Kullanıcı</a>
               
            </div>

        </div>
    </div>

    <div class="grid-row">
        <div class="content-inner">

            <div class="divider80"></div>

            <div class="shop-account">

                <form class="shop-account-login one-half clearfix" method="post" action="girisok.php">

                    <h5 class="light">Oturum Aç</h5>

                    <input type="text" name="kadi" class="full-width" placeholder="Kullanıcı Adı" required>
                    <input type="password" name="sifre" class="full-width" placeholder="Parola" required>

                    <input type="submit" class="button-regular hover-bg-semiblack hover-border-semiblack" value="Oturum Aç">
                    

                </form>

                <form class="shop-account-login one-half last-col clearfix" method="post" action="uyeolok.php">

                    <h5 class="light">Kayıt Ol</h5>

                    <input type="text" class="half-width first" name="kadi" placeholder="Kullanıcı Adı" required>
                    <input type="password" class="half-width second" name="sifre" placeholder="Parola" required>
                    <input type="text" class="half-width first" name="adi" placeholder="İsim" required>
                    <input type="text" class="half-width second" name="soyadi" placeholder="Soyisim" required>
                    <input type="email" class="full-width" name="email" placeholder="Email Adres" required>
                    <input type="text" class="full-width second" name="tel" placeholder="Telefon" required>
                    <input type="text" class="full-width" name="adres" placeholder="Adres" required>

                    <input type="submit" class="button-regular hover-bg-semiblack hover-border-semiblack" value="Kayıt Ol">

                </form>

                <div class="clear"></div>

            </div>
            
            <div class="divider80"></div>

        </div>
    </div>

<?php include("footer.php"); ?>
