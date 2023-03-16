<?php 
include("header.php"); 
if(isset($_SESSION["yonetici"])){

$id=$_GET["id"];

$urun=mysql_fetch_array(mysql_query("SELECT * FROM urun,deger WHERE urun.urun_id=$id AND urun.urun_id=deger.urun_id"));

?>
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
            <div class="box box-success">
               
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="urunguncelleok.php?urun_id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="">Marka</label>
                      <select class="form-control" name="marka_id">
                      <option>Seçiniz</option>
                      <?php
                        $markasql=@mysql_query("SELECT * FROM marka ORDER BY marka_adi ASC",$baglanti);
                        while($markakayit=mysql_fetch_array($markasql))
                        {
                          if($urun["marka_id"]==$markakayit[0])
                            echo "<option value=".$markakayit[0]." selected >".$markakayit[1]."</option>";
                          else
                            echo "<option value=".$markakayit[0].">".$markakayit[1]."</option>";
                        }
                        ?> 
                      </select>
                    </div>

                     <div class="form-group">
                      <label for="">Kategori</label>
                      <select class="form-control" name="kategori_id" id="kategori" required="required">
                      <option>Seçiniz</option>
                      <?php
                        $kategorisql=@mysql_query("SELECT * FROM kategori ORDER BY kategori_adi ASC ",$baglanti);
                        while($kategorikayit=mysql_fetch_array($kategorisql))
                        {
                          if($urun["kategori_id"]==$kategorikayit[0])
                            echo "<option value=".$kategorikayit[0]." selected>".$kategorikayit[1]."</option>";
                          else
                             echo "<option value=".$kategorikayit[0].">".$kategorikayit[1]."</option>"; 
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="">Alt Kategori</label>
                      <select class="form-control" name="altkategori_id" id="altkategori"  required="required">
                      <option>Seçiniz</option>
                      <?php
                        $kategorisql=@mysql_query("SELECT * FROM altkategori WHERE kategori_id=$urun[kategori_id] ORDER BY altkategori_adi ASC ",$baglanti);
                        while($kategorikayit=mysql_fetch_array($kategorisql))
                        {
                          if($urun["altkategori_id"]==$kategorikayit[0])
                            echo "<option value=".$kategorikayit[0]." selected>".$kategorikayit[2]."</option>";
                          else
                             echo "<option value=".$kategorikayit[0].">".$kategorikayit[2]."</option>"; 
                        }
                        ?>

                      </select>
                    </div>

                    <div class="form-group">
                      <label for="">Ürün Adı</label>
                      <input type="text" name="urunadi" class="form-control"  placeholder="Ürün Adı" value="<?php echo $urun["urun_adi"]; ?>">
                    </div>

                    <div class="form-group">
                      <label for="">Ürün Fiyatı</label>
                      <input type="text" name="urunfiyati" class="form-control"  placeholder="Ürün Fiyatı" value="<?php echo $urun["fiyat"]; ?>">
                    </div>

                     <div class="form-group">
                      <label for="">Ürün Adet</label>
                      <input type="text" name="stok" class="form-control"  placeholder="Ürün Adet" value="<?php echo $urun["urun_stok"]; ?>">
                    </div>

                    <div class="form-group">  
                      <textarea id="editor1" name="ozellik" rows="10" cols="80"><?php echo $urun["urun_ozellik"] ?></textarea>
                    </div>  

                   <div class="form-group">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                          <img src="../urunresimleri/<?php echo $urun["urun_resmi"];?>">
                        </div>
                        <div>
                          <span class="btn btn-default btn-file"><span class="fileinput-new">Resim Seç</span><span class="fileinput-exists">Değiştir</span><input type="file" name="resim"></span>
                          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Sil</a>
                        </div>
                  </div>
                     
                   </div> 
                   

                    <!--<div class="form-group">
                      <label>
                        <input type="checkbox" class="minimal"> Check me out
                      </label>
                    </div>
                    
                   </div>-->
                  <!-- /.box-body -->

                  <div class="form-group">
                    <button type="submit" class="btn btn-success">GÜNCELLE</button>
                  </div>
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