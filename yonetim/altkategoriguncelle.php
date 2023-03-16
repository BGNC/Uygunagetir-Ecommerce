<?php 



include("header.php"); 



if(isset($_SESSION["yonetici"])){



$id=$_GET["id"];

$altkategori=mysql_fetch_array(mysql_query("SELECT * FROM altkategori WHERE altkategori_id=$id"));





?>

<div class="content-wrapper">

    <section class="content">

      <div class="row">

        <div class="col-lg-12">

            <div class="box box-success">

               

                <!-- /.box-header -->

                <!-- form start -->

                <form role="form" action="altkategoriguncelleok.php?altkategori_id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

                  <div class="box-body">

                  

                    <div class="form-group">

                      <label for="">Kategori Adı</label>

                      <select class="form-control" name="kategori_id">

                      <option>Seçiniz</option>

                      <?php

                        $kategorisql=@mysql_query("SELECT * FROM kategori",$baglanti);

                        while($kategorikayit=mysql_fetch_array($kategorisql))

                        { 

                          if($altkategori["kategori_id"]==$kategorikayit["kategori_id"])

                            echo "<option value=".$kategorikayit[0]." selected>".$kategorikayit[1]."</option>";

                          else

                            echo "<option value=".$kategorikayit[0].">".$kategorikayit[1]."</option>";

                        }

                        ?>  

                      </select>

                    </div>



                    <div class="form-group">

                      <label for="">Alt Kategori Adı</label>

                      <input type="text" name="altkategoriadi" class="form-control"  placeholder="Alt Kategori Adı" value="<?php echo $altkategori["altkategori_adi"]; ?>">

                    </div>



                  <div class="form-group">

                    <button type="submit" class="btn btn-success">GÜNCELLE</button>

                  </div>



                 

                  <table id="example1" class="table table-bordered table-striped">

                    <thead>

                    <tr>

                      <th width="3%">SN</th>

                      <th>Üst Kategori Adı</th>

                      <th>Kategori Adı</th>

                      <th width="11%"></th>

                    </tr>

                    </thead>

                    <tbody>

                     <?php

                      $sira=0;

                      $sorgu  = @mysql_query("SELECT * FROM kategori,altkategori WHERE altkategori.kategori_id=kategori.kategori_id ORDER BY altkategori.altkategori_adi ASC");

                      while($kategoriler=mysql_fetch_array($sorgu))

                      {

                        $sira++;

                        echo "<tr>";

                        echo "<td>".$sira."</td>";

                        echo "<td>".$kategoriler["kategori_adi"]."</td>";

                        echo "<td>".$kategoriler["altkategori_adi"]."</td>";

                        echo "<td><a href='altkategori-$kategoriler[altkategori_id].html'><button type='button' class='btn btn-warning btn-xs'>Düzenle</button></a>&nbsp;&nbsp;<a href='altkategorisil.php?kategori_id=".$kategoriler["altkategori_id"]."'><button type='button' class='btn btn-danger btn-xs'>Kaldır</button></a></td>";

                        echo "</tr>";

                      }



                      ?>

                    </tbody>

                  </table>

                  



                </form>

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