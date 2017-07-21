<?php

  require_once('../../fungsi/fungsi.php');
  konek_db();

  $id = $_GET['id'];
  $query = mysql_query("SELECT * FROM MD_USER WHERE KD_USER='".$id."';");
  $data = mysql_fetch_array($query);
 ?>

 <!DOCTYPE html>
<html>
<?php   require_once"head.php"; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
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
        <li class="treeview">
          <a href="list_makanan.php">
            <i class="fa fa-folder"></i> <span>Data Makanan</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        </li>
        <li class=" treeview">
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
            <li><a href="harga.php"><i class="fa fa-archive"></i> Harga</a></li>
            <li><a href="fasilitas.php"><i class="fa fa-archive"></i> Fasilitas</a></li>
            <li><a href="jarak.php"><i class="fa fa-archive"></i> Jarak</a></li>
            <li><a href="luas.php"><i class="fa fa-archive"></i> Luas</a></li>
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
        PROFILE USER
        <small>rekomendasi tempat makan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard" class="active"></i> Home</a></li>
        <li><a href="list_user.php">Data User</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
      <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data User</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-6">
                <table id="example3" class="table table-bordered table-hover">
                  <thead >
                    <tr>
                      <td><b>Kode   </b></td>
                      <td><?php echo $data['KD_USER']; ?></td>
                    </tr>
                    <tr>
                      <td><b>Nama   </b></td>
                      <td><?php echo $data['NAMA']; ?></td>
                    </tr>

                    <tr>
                      <td><b>Username   </b></td>
                      <td><?php echo $data['USERNAME']; ?></td>
                    </tr>

                    <tr>
                      <td><b>Password </b></td>
                      <td><?php echo $data['PASSWORD']; ?></td>
                    </tr>
                    <tr>
                      <td><b>Alamat </b></td>
                      <td><?php echo $data['ALAMAT']; ?></td>
                    </tr>
                  </thead>
                  <tbody>
                  </tfoot>
                </table>
              </div>
              <div class="col-md-6">
                <table id="example3" class="table table-bordered table-hover">
                  <thead >
                    <tr>
                      <td><b>Telephon   </b></td>
                      <td><?php echo m2($data['NO_HP']); ?></td>
                    </tr>
                    <tr>
                      <td><b>Email </b></td>
                      <td><?php echo $data['EMAIL']; ?></td>
                    </tr>
                    <tr>
                      <td><b>Level </b></td>
                      <td><?php
                      if ($data['LEVEL']==1) {
                        echo "ADMIN";
                      }else if ($data['LEVEL']==2) {
                        echo "PEMILIK RUMAH MAKAN";
                      }else {
                        echo "Belum Ada";
                      } ?></td>
                    </tr>

                  </thead>
                  <tbody>
                  </tfoot>
                </table>
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
      <!-- <div class="box">
        <div style="padding: 25px;">
          <p align="center"><img height="200px" width="300px" src="../asset/gambar/<?php echo $data['GAMBAR']; ?>" class="img img-responsive"></p>

        </div>
      </div> -->


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
