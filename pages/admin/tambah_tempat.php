<?php
	$nama_file="default.jpg";
	$peringatan='';
	require_once('../../fungsi/fungsi.php');
	konek_db();
	if(isset($_POST['simpan'])){
    $kd_user    = $_POST['kd_user'];
    $kd_jenis   = $_POST['kd_jenis'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $tlp        = $_POST['tlp'];
    $lokasi     = $_POST['lokasi'];
    $luas       = $_POST['luas'];
		$email      = $_POST['email'];
    $query = mysql_query("INSERT INTO `md_rmakan`(`KD_RMAKAN`, `KD_USER`, `KD_JENIS`, `NM_RMAKAN`, `ALAMAT`, `NO_TLP`, `LUAS`, `LOKASI`, `EMAIL`)
																				VALUES  ('', '".$kd_user."', '".$kd_jenis."', '".$nama."', '".$alamat."', '".$tlp."', '".$luas."', '".$lokasi."', '".$email."') ;");
		$kd= mysql_query("SELECT KD_RMAKAN FROM MD_RMAKAN ORDER BY KD_RMAKAN DESC LIMIT 1;");
		$kode = mysql_fetch_array($kd);
		$kd_rmakan = $kode['KD_RMAKAN'];
echo $kode['KD_RMAKAN'];
    $sql = mysql_query("SELECT * FROM FASILITAS;");
    while ($data = mysql_fetch_array($sql)) {
echo mysql_error($sql);
			if(isset($_POST[$data['NAMA']])){
					$query = mysql_query("INSERT INTO CEK_FASILITAS VALUES('', '".$kd_rmakan."', '".$data['KD_FASILITAS']."');");
				}

		}

		if($query){
			echo "<script>alert('data berhasil disimpan !');</script>";
        	echo "<meta http-equiv='refresh' content='0; url=list_tempat.php'>";
		}else{
			echo "<script>alert('data gagal disimpan !');</script>";
        	echo "<meta http-equiv='refresh' content='0; url=list_tempat.php'>";
		}
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
						<li><a href="#"><i class="fa fa-archive"></i> Lihat</a></li>
						<li><a href="#"><i class="fa fa-plus"></i> Tambah</a></li>
						<li><a href="#"><i class="fa fa-edit"></i> Edit</a></li>
						<li><a href="#"><i class="fa fa-trash"></i> Delete</a></li>
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
        TAMBAH TEMPAT MAKAN
        <small>rekomendasi tempat makan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard" class="active"></i> Home</a></li>
        <li><a href="list_tempat.php">Data Tempat Makan</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
					<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" action="#" enctype="multipart/form-data">
  						<div class="col-md-6">
								<div class="form-group">
									<p><b>Pemilik</b></p>
									<select class="form-control" name="kd_user">
										<option value="-">Pilih User</option>
										<?php
										echo $id;
										$query = mysql_query("SELECT KD_USER, NAMA FROM MD_USER ;");
										while($data = mysql_fetch_array($query)){
											?>
											<option value="<?php echo $data['KD_USER']; ?>"> <?php echo $data['NAMA']; ?> </option>
											<?php } ?>

										</select>
								</div>
                <div class="form-group">
                  <label>Nama Rumah Makan </label>
                  <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
                </div>
								<div class="form-group">
									<p><b>Jenis</b></p>
									<select class="form-control" name="kd_jenis">
										<option value="-">Pilih Jenis</option>
										<?php
										$query = mysql_query("SELECT KD_JENIS, JENIS FROM JENIS_RM ;");
										while($data = mysql_fetch_array($query)){
											?>
											<option value="<?php echo $data['KD_JENIS']; ?>"> <?php echo $data['JENIS']; ?> </option>
											<?php } ?>

										</select>
								</div>
                <div class="form-group">
                  <label>Alamat </label>
                  <input type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap">
                </div>
                <div class="form-group">
                  <label>Email </label>
                  <input type="email" name="email" class="form-control" placeholder="Email" >
                </div>
  						</div>

  						<div class="col-md-6">
  							<div class="form-group">
  								<label>Telephon </label>
  								<input type="number" name="tlp" class="form-control" placeholder="085xxxxxxxxx">
  							</div>
  							<div class="form-group">
                  <label>Luas </label>
                  <input type="number" name="luas" class="form-control" placeholder="Dalam Meter Persegi(m2)" >
                </div>
  							<div class="form-group">
                  <label>Lokasi </label>
                  <input type="type" name="lokasi" class="form-control" placeholder="Koordinat Lokasi" >
                </div>

                <div class="form-group">
  								<label>Fasilitas </label>
									<br>
									<?php
									$sql= mysql_query("SELECT * FROM FASILITAS;");
									while($data= mysql_fetch_array($sql)){
										?>
										<input type="checkbox" class="flat" style="margin-left:5px" name="<?php echo $data['NAMA']; ?>" > <?php echo $data['NAMA']; ?>
										<?php
								}?>

								 </div>
							 </div>

              <div class="col-md-12">
                <div class="form-group">
                  <button class="btn btn-danger" style="width: 100%;" name="simpan" >Simpan</button>
                </div>
              </div>
            </form>
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
