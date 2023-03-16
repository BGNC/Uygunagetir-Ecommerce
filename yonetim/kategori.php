<?php 

include("header.php"); 

if(isset($_SESSION["yonetici"])){



?>

<div class="content-wrapper">

    <section class="content">

      <div class="row">

        <div class="col-lg-12">

            <div class="box box-success">

               

                <!-- /.box-header -->

                <!-- form start -->

                <form role="form" action="kategoriok.php" method="post" enctype="multipart/form-data">

                  <div class="box-body">

                  



                    <div class="form-group">

                      <label for="exampleInputPassword1">Kategori Adı</label>

                      <input type="text" name="kategori" class="form-control"  placeholder="Kategori Adı">

                    </div>



                  <div class="form-group">

                    <button type="submit" class="btn btn-success">KAYDET</button>

                  </div>

                </form>  



                  <table id="example1" class="table table-bordered table-striped">

                    <thead>

                    <tr>

                      <th width="3%">SN</th>

                      <th>Kategori Adı</th>

                      <th width="11%"></th>

                    </tr>

                    </thead>

                    <tbody>

                     <?php

                      $sira=0;

                      $sorgu  = @mysql_query("SELECT * FROM kategori ORDER BY kategori_adi ASC",$baglanti);

                      while($kategoriler=mysql_fetch_array($sorgu))

                      {

                        $sira++;

                        echo "<tr>";

                        echo "<td>".$sira."</td>";

                        echo "<td>".$kategoriler[1]."</td>";

                        echo "<td><a href='kategori-$kategoriler[kategori_id].html'><button type='button' class='btn btn-warning btn-xs'>Düzenle</button></a>&nbsp;&nbsp;<a href='kategorisil.php?kategori_id=".$kategoriler[0]."'><button type='button' class='btn btn-danger btn-xs'>Kaldır</button></a></td>";

                      }



                      ?>

                    </tbody>

                  </table>

                

             </div>

         </div>    

       

      </div>

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

