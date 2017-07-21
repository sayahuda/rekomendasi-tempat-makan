<?php
	$nama_file="default.jpg";
	$peringatan='';
	require_once('../../fungsi/fungsi.php');
	konek_db();
	
	if(isset($_POST['simpan'])){
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$alamat = $_POST['alamat'];
		$tlp = $_POST['tlp'];
		$email = $_POST['email'];
		$level = $_POST['level'];
		$query = mysql_query("INSERT INTO `md_user`(`KD_USER`, `NAMA`, `USERNAME`, `PASSWORD`, `ALAMAT`, `NO_HP`, `EMAIL`, `LEVEL`)
							VALUES ('','".$nama."','".$username."','".$password."','".$alamat."','".$tlp."','".$email."','".$level."');");

		if($query){
			echo "<script>alert('data berhasil disimpan !');</script>";
        	echo "<meta http-equiv='refresh' content='0; url=list_user.php'>";
		}else{
			echo "<script>alert('data gagal disimpan !');</script>";
        	echo "<meta http-equiv='refresh' content='0; url=list_user.php'>";
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
        TAMBAH USER
        <small>rekomendasi tempat makan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard" class="active"></i> Home</a></li>
        <li><a href="list_user.php">Data User</a></li>
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
								<label>Nama </label>
								<input type="text" required="" name="nama" class="form-control" placeholder="Isikan Nama Anda">
							</div>
							<div class="form-group">
								<label>Username </label>
								<input type="text" required="" name="username" class="form-control" placeholder="Username">
							</div>
							<div class="form-group">
								<label>Password </label>
								<input type="password" required="" name="password" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
								<label>Alamat </label>
								<input type="text" name="alamat" class="form-control" placeholder="Alamat">
							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">
								<label>Telephone </label>
								<input type="text" name="tlp" class="form-control" placeholder="085xxxxxxxxx">
							</div>
							<div class="form-group">
								<label>Email </label>
								<input type="email" required="" name="email" class="form-control" placeholder="Rekomendasi@mail.com">
							</div>
							<div class="form-group">
								<label>Level </label>
								<select class="form-control" name="level" placeholder="pilih">
									<option value="-">Pilih Salah Satu</option>
									<?php
									$query = mysql_query("SELECT LEVEL FROM MD_USER ORDER BY KD_USER;");
									while($data = mysql_fetch_array($query)){
										?>
										<option value="<?php echo $data['LEVEL']; ?>"> <?php if ($data['LEVEL']==1){
											echo "ADMIN";
										}
										if ($data['LEVEL']==2) {
											echo "PEMILIK RUMAH MAKAN";
										}?>
									</option>
									<?php } ?>

								</select>
							</div>

						</div>

						<div class="form-group">
							<button class="btn btn-danger" style="width: 100%;" name="simpan" >Simpan</button>
						</div>
						</form>
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
