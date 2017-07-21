<?php

  require_once('../../fungsi/fungsi.php');
  konek_db();

  $id = $_GET['id'];
  $query = mysql_query("SELECT MD_MAKANAN.KD_MAKANAN AS KD_MAKANAN, MD_MAKANAN.NAMA AS NAMA, MD_MAKANAN.GAMBAR AS GAMBAR, MD_MAKANAN.HARGA AS HARGA,
    MD_RMAKAN.KD_RMAKAN AS KD_RMAKAN, MD_RMAKAN.NM_RMAKAN AS NM_RMAKAN, MD_RMAKAN.LUAS AS LUAS, MD_RMAKAN.ALAMAT AS ALAMAT, MD_RMAKAN.EMAIL AS EMAIL,
    MD_RMAKAN.NO_TLP AS NO_TLP, MD_RMAKAN.LOKASI AS LOKASI, V_RASA.NAMA AS RASA FROM MD_MAKANAN JOIN MD_RMAKAN ON MD_MAKANAN.KD_RMAKAN=MD_RMAKAN.KD_RMAKAN
    JOIN V_RASA ON MD_MAKANAN.KD_RASA=V_RASA.KD_RASA WHERE KD_MAKANAN='".$id."';");
  $data = mysql_fetch_array($query);

 ?>

 <!DOCTYPE html>
<html>
<?php   require_once"head.php" ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b>TM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Rekomendasi</b> Makanan</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        
        <div class="pull-center info">
          <p>Hudalloh</p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
        <br>
      </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="../../index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        </li> 
        <li class=" active treeview">
          <a href="list_makanan.php">
            <i class="fa fa-folder"></i> <span>Data Makanan</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="list_tempat.php">
            <i class="fa fa-folder"></i> <span>Data Tempat Makan</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="list_user.php">
            <i class="fa fa-folder"></i> <span>Data User</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Parameter</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/admin/harga.php"><i class="fa fa-archive"></i> Harga</a></li>
            <li><a href="pages/admin/fasilitas.php"><i class="fa fa-archive"></i> Fasilitas</a></li>
            <li><a href="pages/admin/jarak.php"><i class="fa fa-archive"></i> Jarak</a></li>
            <li><a href="pages/admin/luas.php"><i class="fa fa-archive"></i> Luas</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DETAIL MAKANAN
        <small>rekomendasi tempat makan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard" class="active"></i> Home</a></li>
        <li><a href="list_makanan.php">Data Makanan</a></li>
        <li class="active">Detail Makanan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
      <div class="box">
        <div style="padding: 25px;">
          <p align="center"><img height="200px" width="300px" src="../asset/gambar/<?php echo $data['GAMBAR']; ?>" class="img img-responsive"></p>

        </div>
      </div>
      <div class="col-md-6">
          <!-- Box Comment -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Makanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-bordered table-hover">
                <thead >
                  <tr>
                    <td><b>Nama Makanan  </b></td>
                    <td><?php echo $data['NAMA']; ?></td>
                  </tr>

                  <tr>
                    <td><b>Jenis Makanan   </b></td>
                    <td><?php echo $data['RASA']; ?></td>
                  </tr>

                  <tr>
                    <td><b>Harga  </b></td>
                    <td><?php echo rp($data['HARGA']); ?></td>
                  </tr>
                </thead>
                <tbody>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
        <!-- /.col -->
      <div class="col-md-6">
          <!-- Box Comment -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Rumah Makan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example4" class="table table-bordered table-hover">
                <thead >
                  <tr>
                  <td><b>Nama Rumah Makan </b></td>
                  <td><?php echo ($data['NM_RMAKAN']); ?></td>
                </tr>

                <tr>
                  <td><b>Lokasi</b></td>
                  <td><?php echo ($data['LOKASI']); ?></td>
                </tr>

                <tr>
                  <td><b>Luas   </b></td>
                  <td><?php echo m2($data['LUAS']);  ?></td>
                </tr>

                <tr>
                  <td><b>Fasilitas  </b></td>
                  <td>
                  <?php
                  $kode= $data['KD_RMAKAN'];
                  $query= mysql_query("SELECT FASILITAS.NAMA AS NAMA, FASILITAS.KD_FASILITAS AS KD_FASILITAS, CEK_FASILITAS.KD_FASILITAS AS FASILITAS,
                    CEK_FASILITAS.KD_RMAKAN AS RMAKAN
                    FROM CEK_FASILITAS JOIN MD_RMAKAN ON CEK_FASILITAS.KD_RMAKAN=MD_RMAKAN.KD_RMAKAN
                    JOIN FASILITAS ON CEK_FASILITAS.KD_FASILITAS = FASILITAS.KD_FASILITAS WHERE CEK_FASILITAS.KD_RMAKAN='".$kode."';");
                    while ($data = mysql_fetch_array($query)){
                      echo "<input type='checkbox' checked value='".$data['NAMA']."' /> ".$data['NAMA']."<br />";
                      

                    }
                    ?>
                    <td>

                  </td>
                </tr>
                </thead>
                <tbody>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>

      </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="#">Rekomendasi Tempat Makan</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function(){
        $('*[data-href]').click(function(){
            window.location = $(this).data('href');
            return false;
        });
      });
    </script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
