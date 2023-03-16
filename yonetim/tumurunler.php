<?php 
include("header.php"); 
if(isset($_SESSION["yonetici"])){
?>
<div class="content-wrapper">

	 <section class="content-header">
      <h1>
        
        Tüm Ürünler
        
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
            <div class="box box-success">
               
                <form role="form" action="tumurunlerok.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                  
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