<?php
	$nama_file="default.jpg";
	$peringatan='';
	require_once('../../fungsi/fungsi.php');
	konek_db();
  $id = $_GET['id'];
	if(isset($_POST['upload'])){
		$target_dir = "../asset/gambar/";
	      $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
	      $uploadOk = 1;
	      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


	      // $check = getimagesize($_FILES["gambar"]["tmp_name"]);
	      // if($check !== false) {
	      //         $uploadOk = 1;
	      //     } else {
	      //         $peringatan="maaf yang anda pilih bukan gambar :-(";
	      //         $uploadOk = 0;
	      //     }


	      if ($_FILES["gambar"]["size"] > 2000000) {
	          $peringatan='ukuran gambar terlalu besar pilih gambar dengan ukuran kurang 2 MB';
	          $uploadOk = 0;
	      }

        if (file_exists($target_file)) {
            echo "FIle Sudah Ada!!!";
            $uploadOk = 0;
        }

	      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	      && $imageFileType != "gif" ) {
	          $peringatan='pilih gambar dengan format JPG, PNG, JPEG atau GIF';
	          $uploadOk = 0;
	      }

	      if ($uploadOk == 0) {

	      } else {
	          if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
	              $nama_file=$_FILES['gambar']['name'];
	          } else {
	              echo "<script>alert('gambar tidak terupload ke server'); </script>";
	              echo "<meta http-equiv='refresh' content='0; url=list_makanan.php'>";

	          }
	      }
	}
  echo $peringatan;
	if(isset($_POST['simpan'])){
		$id= $_GET['id'];
		$kd_rmakan = $_POST['kd_rmakan'];
		$nama = $_POST['nama'];
		$rasa = $_POST['rasa'];
		$gambar = $_POST['path_file'];
		$harga = $_POST['harga'];

		$query = mysql_query("UPDATE MD_MAKANAN SET KD_RMAKAN='".$kd_rmakan."', NAMA='".$nama."', RASA='".$rasa."', GAMBAR='".$gambar."', HARGA='".$harga."' WHERE KD_MAKANAN=$id;");
		if($query){
			echo "<script>alert('data berhasil disimpan !');</script>";
        	echo "<meta http-equiv='refresh' content='0; url=list_makanan.php'>";
		}else{
			echo "<script>alert('data gagal disimpan !');</script>";
        	echo "<meta http-equiv='refresh' content='0; url=list_makanan.php'>";
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
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
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
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Data Makanan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="list_makanan.php"><i class="fa fa-archive"></i> Lihat</a></li>
            <li><a href="#"><i class="fa fa-plus"></i> Tambah</a></li>
            <li><a href="#"><i class="fa fa-edit"></i> Edit</a></li>
            <li><a href="#"><i class="fa fa-trash"></i> Delete</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Data Tempat Makan</span>
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
        UPDATE MAKANAN
        <small>rekomendasi tempat makan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard" class="active"></i> Home</a></li>
        <li><a href="list_makanan.php">Data Makanan</a></li>
        <li class="active">Update</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
			<?php
    $query = mysql_query("SELECT * FROM MD_MAKANAN;");

    $data = mysql_fetch_array($query)

    ?>
      <div class="row">
        <div class="col-xs-12">
					<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" action="#" enctype="multipart/form-data">
						<div class="col-md-6">
							<div class="form-group" >
								<label>Gambar </label>
								<div align="center">
								<img height="50px" width="200px" align="middle" src="../asset/gambar/<?php echo $nama_file; ?>" class="img img-responsive">
								<input type="text" name="path_file" class="form-control" value=<?php echo $nama_file; ?> readonly>
								<input type="file" name="gambar" class="form-control">
								</div>
								<br>
								<button type="submit" name="upload" class="btn btn-primary" style="width: 100%;">Upload</button>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Kode Rumah Makan </label>
								<input type="text" name="kd_rmakan" class="form-control" value=<?php echo $data['KD_RMAKAN']; ?>>
							</div>

							<div class="form-group">
								<label>Nama Makanan </label>
								<input type="text" name="nama" class="form-control" value=<?php echo $data['NAMA']; ?>>
							</div>
							<div class="form-group">
								<label>Rasa Makanan </label>
								<input type="number" name="rasa" class="form-control" value=<?php echo $data['RASA']; ?>>
							</div>

							<div class="form-group">
								<label>Harga Makanan (Rp.) </label>
								<input type="number" name="harga" class="form-control" value=<?php echo $data['HARGA']; ?>>
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
