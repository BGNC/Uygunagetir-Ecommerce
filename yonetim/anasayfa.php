<?php



include("header.php"); 



if(isset($_SESSION["yonetici"])){



$siparis=mysql_fetch_array(mysql_query("SELECT COUNT(satis_id) FROM satis where kargo_durum!=1 AND satici_id=1 "));

$urun=mysql_fetch_array(mysql_query("SELECT COUNT(urun_id) FROM urun where satici_id=1 "));

$uye=mysql_fetch_array(mysql_query("SELECT COUNT(uyeid) FROM uye where rutbe!=1"));

$satis=mysql_fetch_array(mysql_query("SELECT SUM(toplam_fiyat) FROM satis where kargo_durum=1 AND satici_id=1 "));





?>



<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="container-fluid">

    <section class="content-header">

      <h1>

        Anasayfa

        <small>Kontrol Panel</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>

        <li class="active">Panel</li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">

      

      <div class="row">

        <div class="col-lg-3 col-xs-6">

          <!-- small box -->

          <div class="small-box bg-aqua">

            <div class="inner">

              <h3><?php echo $siparis[0]; ?></h3>



              <p>Yeni Siparişler</p>

            </div>

            <div class="icon">

              <i class="ion ion-bag"></i>

            </div>

            <a href="siparisler.html" class="small-box-footer">Daha Fazla Bilgi <i class="fa fa-arrow-circle-right"></i></a>

          </div>

        </div>

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">

          <!-- small box -->

          <div class="small-box bg-green">

            <div class="inner">

              <h3><?php echo $urun[0]; ?></h3>



              <p>Toplam Ürün</p>

            </div>

            <div class="icon">

              <i class="fa fa-tasks"></i>

            </div>

            <a href="urun-listele.html" class="small-box-footer">Daha Fazla Bilgi <i class="fa fa-arrow-circle-right"></i></a>

          </div>

        </div>

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">

          <!-- small box -->

          <div class="small-box bg-yellow">

            <div class="inner">

              <h3><?php echo $uye[0]; ?></h3>



              <p>Kullanıcı Kayıtları</p>

            </div>

            <div class="icon">

              <i class="ion ion-person-add"></i>

            </div>

            <a href="#" class="small-box-footer">Daha Fazla Bilgi <i class="fa fa-arrow-circle-right"></i></a>

          </div>

        </div>

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">

          <!-- small box -->

          <div class="small-box bg-red">

            <div class="inner">

              <h3><?php echo number_format($satis[0],2,",","."); ?></h3>



              <p>Toplam Satış</p>

            </div>

            <div class="icon">

              <i class="fa fa-try"></i>

            </div>

            <a href="satislar.html" class="small-box-footer">Daha Fazla Bilgi <i class="fa fa-arrow-circle-right"></i></a>

          </div>

        </div>

        <!-- ./col -->

      </div>

    </section>

    </div>

    <!-- /.content -->

</div> 



<?php 

}

else

{

  header("location:giris.html");

}





include("footer.php"); 

?>







