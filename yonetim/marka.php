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

                <form role="form" action="markaekleok.php" method="post" enctype="multipart/form-data">

                  <div class="box-body">

                  

                    <div class="form-group">

                      <label for="exampleInputPassword1">Marka Adı</label>

                      <input type="text" name="markaadi" class="form-control"  placeholder="Marka Adı">

                    </div>

                  

                     

                  <div class="form-group">

                    <button type="submit" class="btn btn-success">KAYDET</button>

                  </div>

                 </form>

                  

                  <table id="example1" class="table table-bordered table-striped">

                    <thead>

                    <tr>

                      <th width="3%">SN</th>

                      <th>Marka Adı</th>

                      <th width="11%"></th>

                    </tr>

                    </thead>

                    <tbody>

                     <?php

                      $sorgu=@mysql_query("SELECT * FROM marka ORDER BY marka_adi",$baglanti);

                      $sira=0;

                      while($markalar=mysql_fetch_array($sorgu))

                      {

                        $sira++;

                        echo "<tr>";

                        echo "<td>".$sira."</td>";

                        echo "<td>".$markalar[1]."</td>";

                        echo "<td><a href='marka-$markalar[0].html'><button type='button' class='btn btn-warning btn-xs'>Düzenle</button></a> <a href='markasil.php?marka_id=".$markalar[0]."'><button type='button' class='btn btn-danger btn-xs'>Kaldır</button></a></td>";

                        echo "</tr>";

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