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
                <form role="form" action="sliderok.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      
                    <div class="form-group">
                      <label for="">Slider Başlık</label>
                      <input type="text" name="baslik" class="form-control"  placeholder="Slider Başlık">
                    </div>
                    <label>Resim</label>
                    <div class="form-group">

                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                        <div>
                          <span class="btn btn-default btn-file"><span class="fileinput-new">Resim Seç</span><span class="fileinput-exists">Değiştir</span><input type="file" name="resim"></span>
                          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Sil</a>
                        </div>
                      </div>
                     
                    </div> 

                  <div class="form-group">
                    <button type="submit" class="btn btn-success">KAYDET</button>
                  </div>
                </form>
             </div>

             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th width="3%">SN</th>
                 <th>Slider Başlık</th>
                 <th width="5%"></th>
               </tr>
                 
               </thead>
               <tbody>
               <?php
                $slidesorgu=@mysql_query("SELECT * FROM slide");
                $sn=0;
                while($kayit=@mysql_fetch_array($slidesorgu))
                {
                  $sn++;
                  echo "<tr>";
                  echo "<td>".$sn."</td>";
                  echo "<td>".$kayit[1]."</td>";
                  echo "<td><a href='slidesil.php?id=".$kayit[0]."'><button type='button' class='btn btn-danger btn-xs'>Kaldır</button></a></td>";
                  echo "</tr>"; 
                 } 
                ?>
               </tbody>
             </table>

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
