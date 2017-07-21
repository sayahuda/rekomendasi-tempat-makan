<?php
	$nama_file="default.jpg";
	$peringatan='';
	require_once('../../fungsi/fungsi.php');
	konek_db();

	
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
        LIST MAKANAN
        <small>rekomendasi tempat makan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard" class="active"></i> Home</a></li>
        <li><a href="list_makanan.php">Data Makanan</a></li>
        <li class="active">Lihat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
						<div class="col-xs-10">
							<div class="box-header">
								<h3 class="box-title">List Makanan</h3>
							</div>

						</div>
						<div class="col-xs-2">
							<div class="box-header">
								<a href="tambah_makanan.php" class="btn btn-success" style="width:150px" role="button"><i class="fa fa-plus"> <b> Tambah </b> </i></a>

							</div>
						</div>
						<br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead >
                  <tr >
  								 		<th style="text-align: center" width="2%">No</th>
                      <th style="text-align: center" width="10%">Kode</th>
                      <th style="text-align: center" width="28%">Nama</th>
  								 		<th style="text-align: center" width="20%">Nama Rumah Makan</th>
  						        <th style="text-align: center" width="20%">Jenis</th>
                      <th style="text-align: center" width="15%" >Harga</th>
  						        <th style="text-align: center" >Action</th>
  								 </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
								$sql = mysql_query("SELECT MD_MAKANAN.KD_MAKANAN AS KD_MAKANAN, MD_RMAKAN.KD_RMAKAN AS KD_RMAKAN, MD_MAKANAN.NAMA AS NAMA,
                                    MD_MAKANAN.HARGA AS HARGA, MD_RMAKAN.NM_RMAKAN AS RMAKAN, MD_RMAKAN.LUAS AS LUAS,
																		V_RASA.NAMA AS RASA
                                    FROM MD_MAKANAN JOIN MD_RMAKAN ON MD_MAKANAN.KD_RMAKAN=MD_RMAKAN.KD_RMAKAN JOIN V_RASA ON MD_MAKANAN.KD_RASA=V_RASA.KD_RASA;");
								while ($isi = mysql_fetch_array($sql)) {
                  $i++;
									?>
									<tr >
										<td align="center"><?php echo $i; ?></td>
                    <td><?php echo $isi['KD_RMAKAN'].$isi['KD_MAKANAN']; ?></td>
                    <td align="center"><?php echo $isi['NAMA']; ?></td>
										<td ><?php echo $isi['RMAKAN']; ?></td>
										<td><?php echo $isi['RASA']; ?></td>
										<td><?php echo rp($isi['HARGA']); ?></td>
                    <td align="center">
                      <a class="glyphicon glyphicon-cloud" href="detail_makanan.php?id=<?php echo $isi['KD_MAKANAN']; ?>" title="Detail" ></a>
                      <a class="glyphicon glyphicon-edit" href="update_makanan.php?id=<?php echo $isi['KD_MAKANAN']; ?>" title="Edit" ></a>
                      <a class="glyphicon glyphicon-trash" href="delete_makanan.php?id=<?php echo $isi['KD_MAKANAN']; ?>" title="Hapus" ></a>
                    </td>
									</tr>
									<?php
								}

							 ?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
