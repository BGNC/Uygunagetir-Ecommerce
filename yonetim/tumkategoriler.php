<?php 
include("header.php");
if(isset($_SESSION["yonetici"])){ 
?>
<div class="content-wrapper">
	 <section class="content-header">
      <h1>
        
        Kategori İndrimi
        
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
            <div class="box box-success">
               
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="tumkategorilerok.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                  
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
                      <label for="">İndirim Oranı</label>
                      <select class="form-control" name="indirim_orani">
                      <?php
                        for($i=0;$i<=60;$i+=5)
                        {
                        ?>
                          <option value="<?php echo $i;?>"><?php echo $i;?></option>
                          <?php 
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="">Başlangıç Tarih</label>
                      <input type="date" name="bas_tarih" class="form-control" >
                    </div>

                    <div class="form-group">
                      <label for="">Bitiş Tarih</label>
                      <input type="date" name="bit_tarih" class="form-control">
                    </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success">İNDİRİM UYGULA</button>
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