<?php 

include("header.php");

if(isset($_SESSION["yonetici"])){ 

?>

 <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Siparişler

        

      </h1>

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">

        <div class="col-xs-12">



          <div class="box box-success">

          

            <!-- /.box-header -->

            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">

                <thead>

                <tr>

                  <th>Tarih</th>

                  <th>Müşteri Adı Soyadı</th>

                  <th>Ürün Adı</th>

                  <th>Ürün Fiyatı</th>

                  <th>Adet</th>

                  <th>Toplam Fiyat</th>

                  <th></th>

                  <th></th>

                </tr>

                </thead>

                <tbody>

                <?php

                 $sql="SELECT satis.tarih,uye.ad,uye.soyad,urun.urun_adi,satis.urun_fiyat,satis.urun_adet,satis.toplam_fiyat,satis.satis_id,satis.kargo_durum FROM satis,uye,urun WHERE satis.kargo_durum!=1 AND satis.satici_id=1 AND satis.alan_id=uye.uyeid AND satis.urun_id=urun.urun_id ORDER BY satis.satis_id DESC";

                  //$sql2="SELECT satis.tarih,uye.ad,uye.soyad,urun.urun_adi,satis.urun_fiyat,satis.urun_adet,satis.toplam_fiyat,satis.satis_id,satis.kargo_durum FROM satis,uye,urun WHERE satis.kargo_durum!=1 AND satis.satici_id=1 AND satis.alan_id=uye.uye_id AND satis.urun_id=urun.urun_id ORER BY satis.satid_id DESC";

                  $sqlsorgu=@mysql_query($sql,$baglanti);

                  while($satislar=@mysql_fetch_array($sqlsorgu))

                  {

                    $durum=$satislar[8];

                    echo "<tr>";

                    echo "<td width='180'>".$satislar[0]."</td>";

                    echo "<td width='180'>".$satislar[1]." ".$satislar[2]."</td>";

                    echo "<td width='170'>".$satislar[3]."</td>";

                    echo "<td width='120'>".number_format($satislar[4],2,",",".")." TL</td>";

                    echo "<td width='60'>".$satislar[5]."</td>";

                    echo "<td  width='120'>".number_format($satislar[6],2,",",".")." TL</td>";

                    

                    if($durum==2)

                    {

                      echo "<td width='100'><select id='durum'onchange='$.kargo(".$satislar[7].",this.value);' ><option value='0'></option><option value='2' selected>Hazırlanıyor</option><option value='3'>Kargoya Verildi</option></td>";

                    }

                    else if($durum==3)

                    {

                      echo "<td width='100'><select id='durum' onchange='$.kargo(".$satislar[7].",this.value);' ><option value='0'></option><option value='2'>Hazırlanıyor</option><option value='3' selected >Kargoya Verildi</option></td>";

                    }

                    else

                    {

                      echo "<td width='100'><select id='durum' onchange='$.kargo(".$satislar[7].",this.value);' ><option value='0'></option><option value='2'>Hazırlanıyor</option><option value='3'>Kargoya Verildi</option></td>";

                    }

                    echo "<td  width='60'><a href='kargo-$satislar[7].html'><button type='button' class='btn btn-block btn-success btn-xs'>Kargo Kodu</button></a></td>";

                    echo "</tr>";

                    

                  }

                  ?>

                

               

                </tbody>

              </table>

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

        </div>

        <!-- /.col -->

      </div>

      <!-- /.row -->

    </section>

</div>

<?php 

}

else

{

  header("location:giris.html");

}





include("footer.php"); 

?>

