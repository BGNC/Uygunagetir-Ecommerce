<?php 

include("header.php");

if(isset($_SESSION["yonetici"])){ 

// HATA VAR.

$sql=mysql_fetch_array(mysql_query("SELECT * FROM satis Where satici_id=1 ",$baglanti));

$satis_id=$sql[0];
?>

<div class="content-wrapper">



	 <section class="content-header">

      <h1>

        <a href="siparisler.html"><input type="button" class="btn btn-success" value="SİPARİŞLER"></a>

        

      </h1>

    </section>

    <section class="content">

      <div class="row">

        <div class="col-lg-12">

            <div class="box box-success">

             

                <form role="form" action="kargokoduverok.php?satis_id=<?php echo $satis_id;?>" method="post" enctype='multipart/form-data '>

                  <div class="box-body">

                  

                    <div class="form-group">

                      <label for="">Kargo Firma</label>

                      <select class="form-control" name="kargoadi">

                      <option>Seçiniz</option>

                      <option>ARAS</option>

                      <option>MNG</option>

          			      <option>UPS</option>	

                      </select>

                    </div>



                    <div class="form-group">

                      <label for="">Kargo Kodu</label>

                      <input type="text" name="kargokodu" class="form-control"  placeholder="Kargo kodu">

                    </div>



                  <div class="form-group">

                    <button type="submit" class="btn btn-success">KARGO BİLGİSİ VER</button>

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