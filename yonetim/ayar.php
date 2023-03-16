<?php 

  include("header.php"); 
  if(isset($_SESSION["yonetici"])){
  $ayargetir=@mysql_fetch_array(@mysql_query("SELECT * FROM ayar",$baglanti));
  $sitetitle=$ayargetir[1];
  $sitedesc=$ayargetir[2];
  $sitekey=$ayargetir[3]; 

?>
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
            <div class="box box-success">
               
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="ayarok.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      
                    <div class="form-group">
                      <label for="">Site Başlık</label>
                      <input type="text" name="sitetitle" class="form-control" value="<?php echo $sitetitle; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Site Açıklama</label>
                      <input type="text" name="sitedescription" class="form-control" value="<?php echo $sitedesc; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Site Keywords</label>
                      <input type="text" name="sitekeywords" class="form-control" value="<?php echo $sitekey; ?>">
                    </div>
                    

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