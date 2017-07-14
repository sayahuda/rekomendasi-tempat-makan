<?php
	$nama_file="default.jpg";
	$peringatan='';
	require_once('../../fungsi/fungsi.php');
	konek_db();

	if(isset($_POST['simpan'])){
		//murah
		$murah_bawah = $_POST['0'];
		$murah_atas = $_POST['1'];

		//sedang
		$sedang_bawah = $_POST['2'];
		$sedang_tengah = $_POST['3'];
		$sedang_atas = $_POST['4'];

		//mahal
		$mahal_bawah = $_POST['5'];
		$mahal_atas = $_POST['6'];

		$sedikit = mysql_query("UPDATE V_JARAK SET BATAS_BAWAH='".$murah_bawah."', BATAS_ATAS='".$murah_atas."' WHERE status='Dekat';");
		$banyak = mysql_query("UPDATE V_JARAK SET BATAS_BAWAH='".$sedang_bawah."', BATAS_ATAS='".$sedang_atas."', BATAS_TENGAH='".$sedang_tengah."' WHERE status='Sedang';");
		$banyak = mysql_query("UPDATE V_JARAK SET BATAS_BAWAH='".$mahal_bawah."', BATAS_ATAS='".$mahal_atas."' WHERE status='Jauh';");

	}



 ?>


 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
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

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p>Hudalloh</p>
					<!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
				</div>
			</div>
			<!-- search form -->
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
								<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
								</button>
							</span>
				</div>
			</form>
			<!-- /.search form -->
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
				<li class="treeview">
					<a href="list_tempat.php">
						<i class="fa fa-folder"></i> <span>Data Tempat Makan</span>
						<span class="pull-right-container">
							<!-- <i class="fa fa-angle-left pull-right"></i> -->
						</span>
					</a>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-folder"></i>
						<span>Data User</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="#"><i class="fa fa-archive"></i> Lihat</a></li>
						<li><a href="#"><i class="fa fa-plus"></i> Tambah</a></li>
						<li><a href="#"><i class="fa fa-edit"></i> Edit</a></li>
						<li><a href="#"><i class="fa fa-trash"></i> Delete</a></li>
					</ul>
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
						<li><a href="harga.php"><i class="fa fa-archive active" ></i> Harga</a></li>
						<li><a href="HARGA.php"><i class="fa fa-archive"></i> HARGA</a></li>
						<li><a href="luas.php"><i class="fa fa-archive"></i> Luas</a></li>
						<li><a href="fasilitas.php"><i class="fa fa-archive"></i> Jumlah Fasilitas</a></li>
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
        Variabel Jarak
        <small>rekomendasi tempat makan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-dashboard" class="active"></i> Home</a></li>
        <li><a href="jarak.php">Variabel Jarak</a></li>
        <li class="active">Jarak</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" action="#">
							<div class="row">
							<?php
								$query = mysql_query("SELECT * FROM V_JARAK;");
								$i=0;
								while ($data = mysql_fetch_array($query)) {

							 ?>
							<div class="col-md-4">
								<div class="form-group">
									<label align="center"><?php echo $data['STATUS']; ?> :</label>
									<hr>
									<p>Batas Bawah  :</p>
									<input type="number" class="form-control" name=<?php echo $i; ?> value=<?php echo $data['BATAS_BAWAH']; ?>>
									<?php $i++; ?>
									<hr>
									<?php if($data['BATAS_TENGAH']!=null){
										?>

									<p>Batas Tengah  :</p>
									<input type="number" class="form-control" name=<?php echo $i; ?> value=<?php echo $data['BATAS_TENGAH']; ?>>
									<?php $i++; ?>
									<hr>

										<?php
										} ?>
									<p>Batas Atas  :</p>
									<input type="number" class="form-control" name= <?php echo $i; ?> value=<?php echo $data['BATAS_ATAS']; ?>>
									<?php $i++; ?>

								</div>
							</div>
							<?php } ?>
						</div>
								<div class="form-group">
									<button class="btn btn-danger" style="width: 100%;" name="simpan" >Simpan</button>
								</div>
						</form>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked desktop"><use xlink:href="#stroked-desktop"></use></svg>Batas Untuk Harga kendaraan:</div>
					<div class="panel-body">
						<div class="row" style="padding: 20px;">
							 <table class="table table-bordered">
								 <tr>
								 	<th>Status</th>
								 	<th>Batas Bawah</th>
								 	<th>Batas Tengah</th>
								 	<th>Batas Atas</th>
								 </tr>
								<?php
								$sql = mysql_query("SELECT * FROM V_JARAK;");
								while ($isi = mysql_fetch_array($sql)) {
									?>
									<tr>
										<td><?php echo $isi['STATUS']; ?></td>
										<td><?php echo km($isi['BATAS_BAWAH']); ?></td>
										<td><?php echo km($isi['BATAS_TENGAH']); ?></td>
										<td><?php echo km($isi['BATAS_ATAS']); ?></td>
									</tr>
									<?php
								}

							 ?>

							 </table>

						</div>
					</div>
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
