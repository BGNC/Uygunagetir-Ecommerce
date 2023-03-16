<?php 
include("header.php");
if(isset($_SESSION["yonetici"])){ 
?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Satışlar
        
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-success">
          
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                <th>Tarih</th>
			        <th>Satıcı</th>
			        <th>Müşteri Adı Soyadı</th>
			        <th>Ürün Adı</th>
			        <th>Ürün Fiyatı</th>
			        <th>Adet</th>
			        <th>Toplam Fiyat</th>
	                </tr>
                </thead>
                <tbody>
                <?php
					$sql="SELECT satis.tarih,uye.ad,uye.soyad,urun.urun_adi,satis.urun_fiyat,satis.urun_adet,satis.toplam_fiyat,urun.urun_id FROM satis,uye,urun WHERE satis.kargo_durum=1 AND satis.alan_id=uye.uyeid AND satis.urun_id=urun.urun_id ORDER BY satis.satis_id ASC";
					$sqlsorgu=@mysql_query($sql,$baglanti);
					while($satislar=@mysql_fetch_array($sqlsorgu))
					{
						
						$urun_id=$satislar[7];
						
						
						
						$sqlsatis="SELECT uye.kadi FROM uye,urun WHERE urun.urun_id=$urun_id AND urun.satici_id=uye.uyeid";
						$satissorgu=mysql_query($sqlsatis,$baglanti);
						$s=mysql_fetch_array($satissorgu);
						$satici_adi=$s[0];
						
						echo "<tr>";
						echo "<td width='180'>".$satislar[0]."</td>";
						echo "<td width='150'>".$satici_adi."</td>";
						echo "<td width='180'>".$satislar[1]." ".$satislar[2]."</td>";
						echo "<td width='170'>".$satislar[3]."</td>";
						echo "<td width='120'>".number_format($satislar[4],2,",",".")." TL</td>";
						echo "<td width='60'>".$satislar[5]."</td>";
						echo "<td  width='120'>".number_format($satislar[6],2,",",".")." TL</td>";
						echo "</tr>";
						
					}
					
					?>
                
               
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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