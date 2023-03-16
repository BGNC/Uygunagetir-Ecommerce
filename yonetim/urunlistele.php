<?php 

include("header.php");

if(isset($_SESSION["yonetici"])){ 

?>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

      

        <a href="urun-ekle.html"><button type="button" class="btn btn-success">+ Ürün Ekle</button></a>

        

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

                  <th width="3%">SN</th>

                  <th>Satıcı</th>

                  <th>Ürün Adı</th>

                  <th>Stok</th>

                  <th>Vitrin</th>

                  <th>Ürün Resmi</th>

                  <th width="12%"></th>

                </tr>

                </thead>

                <tbody>

                 <?php

                  $sira=0;

                  $urunsql=@mysql_query("SELECT urun.urun_id,uye.kadi,urun.urun_adi,urun.urun_stok,urun.vitrin,urun.urun_resmi FROM urun,uye WHERE gorunum=1 AND urun.satici_id=uye.uyeid ORDER BY urun.urun_id ASC");

                  while($urunkayit=mysql_fetch_array($urunsql))

                  {

                    $sira++;

                    echo "<tr>";

                    echo "<td>".$sira."</td>";

                    echo "<td>".$urunkayit[1]."</td>";

                    echo "<td>".$urunkayit[2]."</td>";

                    echo "<td>".$urunkayit[3]."</td>";

                    if($urunkayit[4]==1)echo "<td><input type='checkbox' checked onchange='$.vitrinekle(".$urunkayit[0].")'></td>";

                    else echo "<td><input type='checkbox' onchange='$.vitrinekle(".$urunkayit[0].")'></td>";

                    

                    echo "<td><a href='../urunresimleri/$urunkayit[5]' target='_blank'><button type='button' class='btn  btn-success btn-xs'>Resmi Gör</button></a></td>";

                    echo "<td><a href='urun-$urunkayit[0].html'><button type='button' class='btn btn-warning btn-xs'>Düzenle</button></a>&nbsp;&nbsp;<a onclick='$.urunsil(".$urunkayit[0].");'>&nbsp;<button type='button' class='btn btn-danger btn-xs'>Kaldır</button></a></td>";

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