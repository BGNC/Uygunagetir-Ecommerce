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
                <form role="form" action="urunekleok.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="">Marka</label>
                      <select class="form-control" name="marka_id">
                      <option>Seçiniz</option>
                      <?php
                        $markasql=@mysql_query("SELECT * FROM marka ORDER BY marka_adi ASC",$baglanti);
                        while($markakayit=mysql_fetch_array($markasql))
                        {
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
                        $kategorisql=@mysql_query("SELECT * FROM kategori OrDER BY kategori_adi ASC ",$baglanti);
                        while($kategorikayit=mysql_fetch_array($kategorisql))
                        {
                          echo "<option value=".$kategorikayit[0].">".$kategorikayit[1]."</option>";
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="">Alt Kategori</label>
                      <select class="form-control" name="altkategori_id" id="altkategori"  required="required">
                      <option>Seçiniz</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="">Ürün Adı</label>
                      <input type="text" name="urunadi" class="form-control"  placeholder="Ürün Adı">
                    </div>

                    <div class="form-group">
                      <label for="">Ürün Fiyatı</label>
                      <input type="text" name="urunfiyati" class="form-control"  placeholder="Ürün Fiyatı">
                    </div>

                     <div class="form-group">
                      <label for="">Ürün Adet</label>
                      <input type="text" name="stok" class="form-control"  placeholder="Ürün Adet">
                    </div>

                    <div class="form-group">  
                      <textarea id="editor1" name="ozellik" rows="10" cols="80"></textarea>
                    </div>  

                   <div class="form-group">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
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
                    <button type="submit" class="btn btn-success">KAYDET</button>
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