<?php 

include("../baglanti.php"); session_start();

?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title></title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->

  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Morris chart -->

  <link rel="stylesheet" href="bower_components/morris.js/morris.css">

  <!-- jvectormap -->

  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">

  <!-- Date Picker -->

  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- Daterange picker -->

  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- bootstrap wysihtml5 - text editor -->

  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- iCheck for checkboxes and radio inputs -->

  <link rel="stylesheet" href="plugins/iCheck/all.css">

  <!-- DataTables -->

  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- jasyn-bootstrap -->

  <link rel="stylesheet" type="text/css" href="bower_components/jasny-bootstrap/css/jasny-bootstrap.min.css">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->



  <!-- Google Font -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">



  <!-- jQuery 3 -->

  <script src="bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap 3.3.7 -->

  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->

  <script src="bower_components/fastclick/lib/fastclick.js"></script>

  <!-- AdminLTE App -->

  <script src="dist/js/adminlte.js"></script>

  <!-- AdminLTE for demo purposes -->

  <script src="dist/js/demo.js"></script>

  <!-- CK Editor -->

  <script src="bower_components/ckeditor/ckeditor.js"></script>

  <!-- iCheck 1.0.1 -->

  <script src="plugins/iCheck/icheck.min.js"></script>

  <!-- SlimScroll -->

  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

  <!-- DataTables -->

  <script src="bower_components/datatables.net/js/jquery.dataTables.js"></script>

  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <!-- jasyn-bootstrap -->

  <script src="bower_components/jasny-bootstrap/js/jasny-bootstrap.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- yonetim -->

  <script src="dist/js/yonetim.js"></script>





  <script type="text/javascript">

    $(function () {

      $( "#sortable" ).sortable();


      $("#sortable").on("sortupdate",function(){

            var data = $("#sortable").sortable("serialize");
            $.post("sira.php",{data:data},function(donen_veri){

              //alert(donen_veri);

            });
      });


      $('#example1').DataTable(); 

     
      CKEDITOR.replace('editor1');

      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({

      checkboxClass: 'icheckbox_minimal-blue',

      radioClass   : 'iradio_minimal-blue'

       }); 




    });

</script>

</head>

<body class="sidebar-mini skin-green">

<div class="wrapper">

<header class="main-header">

    <!-- Logo -->

    <a href="anasayfa.html" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><b>UygunaGetir</b></span>

    </a>

    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

        <span class="sr-only">Toggle navigation</span>

      </a>



      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <!-- Messages: style can be found in dropdown.less-->

          

          <!-- Notifications: style can be found in dropdown.less -->

          

          <!-- Tasks: style can be found in dropdown.less -->

         

          <!-- User Account: style can be found in dropdown.less -->

          <li class="user user-menu">

            <a href="http://uygunagetir.name.tr/" target="_blank">

              <span class="hidden-xs">Site Önizleme</span>

            </a>

           

          </li>

          <!-- Control Sidebar Toggle Button -->

          <li>

            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>

          </li>

        </ul>

      </div>

    </nav>

</header>



 <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

      <!-- Sidebar user panel -->

      <div class="user-panel">

        

      </div>

      

      <ul class="sidebar-menu" data-widget="tree">

       <!-- <li class="header">MAIN NAVIGATION</li>-->

        <li>

          <a href="anasayfa.html">

            <i class="fa fa-home"></i> <span>Anasayfa</span>  

          </a>

        </li>

         <li>

          <a href="siparisler.html">

            <i class="fa fa-cart-plus"></i> <span>Siparişler</span>  

          </a>

        </li>



         <li>

          <a href="satislar.html">

            <i class="fa fa-check-square-o"></i> <span>Satışlar</span>  

          </a>

        </li>



        <li>

          <a href="marka.html">

            <i class="fa fa-laptop"></i>

            <span>Marka Düzenle</span>

          </a>

        </li>



        <li class="treeview">

          <a href="#">

            <i class="fa fa-laptop"></i>

            <span>İndirim Uygula</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="indirim-tum-urunler.html"><i class="fa fa-circle-o"></i> Tüm Ürünler</a></li>

            <li><a href="indirim-kategori.html"><i class="fa fa-circle-o"></i> Kategoriye Göre</a></li>

            <li><a href="indirim-diger.html"><i class="fa fa-circle-o"></i> Diğer</a></li>

            

          </ul>

        </li>

       

        <li class="treeview">

          <a href="#">

            <i class="fa fa-tasks"></i>

            <span>Ürün Düzenle</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="kategori-ekle.html"><i class="fa fa-circle-o"></i> Kategori Ekle</a></li>

            <li><a href="altkategori-ekle.html"><i class="fa fa-circle-o"></i> Alt Kategori Ekle</a></li>

            <li><a href="urun-ekle.html"><i class="fa fa-circle-o"></i> Ürün Ekle</a></li>

            <li><a href="urun-listele.html"><i class="fa fa-circle-o"></i> Ürün Listele</a></li>

            <li><a href="vitrin-duzenle.html"><i class="fa fa-circle-o"></i> Vitrin Düzenle</a></li>


          </ul>

        </li>



        <li>

          <a href="slider-duzenle.html">

            <i class="fa fa-image"></i>

            <span>Slider Düzenle</span>

          </a>

        </li>



        <li>

          <a href="site-ayar.html">

            <i class="fa fa-cogs"></i> <span>Site Ayaları</span>  

          </a>

        </li>

        <li>

          <a href="cikis.php">

            <i class="fa fa-sign-out"></i> <span>Çıkış Yap</span>  

          </a>

        </li>

          

      

       

    </section>

    <!-- /.sidebar -->

  </aside>