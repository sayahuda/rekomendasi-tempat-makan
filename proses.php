<?php
	require_once('fungsi/fungsi.php');
	konek_db();
	if (!isset($_POST['rasa'])) {
		echo '<script>document.location="index.php";</script>';
	}

	$rasa = $_POST['rasa'];
	$jenis = $_POST['jenis'];
	$harga  = $_POST['harga'];
	$jarak  = $_POST['jarak'];
	$luas  = $_POST['luas'];
	$fasilitas  = $_POST['fasilitas'];
	$operator = $_POST['operator'];


	$hasil = lihat_hasil($rasa, $jenis, $harga, $jarak, $luas, $fasilitas, $operator);

	//shorting in foreach
	$index = 0;
	foreach ($hasil as $result) {
		$rslt[$index]['id']						 = $result['id'];
		$rslt[$index]['nama']					 = $result['nama'];
		$rslt[$index]['rasa']					 = $result['rasa'];
		$rslt[$index]['jenis']				 = $result['jenis'];
		$rslt[$index]['harga']				 = $result['harga'];
		$rslt[$index]['jarak']				 = $result['jarak'];
		$rslt[$index]['luas'] 				 = $result['luas'];
		$rslt[$index]['fasilitas']		 = $result['fasilitas'];
		$rslt[$index]['nk_harga']			 = $result['nk_harga'];
		$rslt[$index]['nk_jarak']			 = $result['nk_jarak'];
		$rslt[$index]['nk_luas']			 = $result['nk_luas'];
		$rslt[$index]['nk_fasilitas']	 = $result['nk_fasilitas'];
		$rslt[$index]['ks']						 = $result['ks'];

		$index++;

	}

	//shorting :
	for ($i=0; $i < count($rslt) - 1; $i++) {
		for ($j=0; $j < count($rslt) - 1; $j++) {
				if ($rslt[$j]['ks'] < $rslt[$j+1]['ks']) {
				$tmp = $rslt[$j];
				$rslt[$j] = $rslt[$j+1];
				$rslt[$j+1] = $tmp;
			}
		}
	}

	$jml_bukan_nol = 0;
	for ($i=0; $i < count($rslt); $i++) {
		if ($rslt[$i]['ks']!=0) {
			$jml_bukan_nol++;
		}
	}

	//eliminasi data yang memiliki nilai result = 0
	if ($jml_bukan_nol!=0) {
		for ($i=0; $i < $jml_bukan_nol; $i++) {
		$isi[$i] = $rslt[$i];
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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="pages/admin/list_makanan.php">
            <i class="fa fa-folder"></i> <span>Data Makanan</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="pages/admin/list_tempat.php">
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
        DASHBOARD
        <small>rekomendasi tempat makan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard" class="active"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
						<div class="col-xs-10">
							<div class="box-header">
								<h3 class="box-title">Rekomendasi</h3>
							</div>

						</div>

						<br>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped table-bordered table-hover" id="dataTables-examplel">
						    <thead>
						    <tr>
						        <th >Nama</th>
						        <th >Rasa</th>
						        <th >Harga</th>
						        <th >Jarak</th>
						        <th >Jenis</th>
						        <th >Luas</th>
						        <!-- <th >Fasilitas</th> -->
										<?php
										// if($rasa!='-'){
						        // 	echo "<th>".$rasa."</th>";
						        // }
										// if($harga!='-'){
						        // 	echo "<th>".$harga."</th>";
						        // }
										// if($jarak!='-'){
						        // 	echo "<th>".$jarak."</th>";
						        // }
										// if($luas!='-'){
						        // 	echo "<th>".$luas."</th>";
						        // }
										// if($kebersihan!='-'){
						        // 	echo "<th>".$kebersihan."</th>";
						        // }
										// if($fasilitas!='-'){
						        // 	echo "<th>".$fasilitas."</th>";
						        // }
											 ?>
						        <th >Result</th>
						        <th >Action</th>
						    </tr>
						    </thead>
						    <tbody>
									<?php
										if (isset($isi)) {
											# code...

										for ($i=0; $i < count($isi); $i++) {
										# code...
									?>

						    			<tr>
						    				<td><?php echo $isi[$i]['nama']; ?></td>
						    				<td><?php echo $isi[$i]['rasa']; ?></td>
												<td><?php echo rp($isi[$i]['harga']); ?></td>
						    				<td><?php echo km($isi[$i]['jarak']); ?></td>
												<td><?php echo $isi[$i]['jenis']; ?></td>
						    				<td><?php echo m2($isi[$i]['luas']); ?></td>
						    				<!-- <td><?php echo ($isi[$i]['fasilitas']); ?></td> -->
												<?php
						    				// if($rasa!='-'){
									      //   	echo "<td>".$isi[$i]['nk_rasa']."</td>";
									      //   }
									        // if($harga!='-'){
									        // 	echo "<td>".$isi[$i]['nk_harga']."</td>";
									        // }
									        // if($jarak!='-'){
									        // 	echo "<td>".$isi[$i]['nk_jarak']."</td>";
									        // }
									        // if($luas!='-'){
									        // 	echo "<td>".$isi[$i]['nk_luas']."</td>";
									        // }
									        // if($fasilitas!='-'){
									        // 	echo "<td>".$isi[$i]['nk_fasilitas']."</td>";
									        // }

									         ?>
						    				<td><?php echo $isi[$i]['ks']; ?></td>
						    				<td><a href="../admin/pages/admin/detail_makanan.php?id=<?php echo $isi[$i]['id']; ?>" class="btn btn-primary" style="width: 100%;">Detail</a></td>

											</tr>

						    	<?php	}
								} ?>
						    </tbody>
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
<div class="map">

</div>
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- <script src="plugins/morris/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="dist/js/util.js"></script>

<script type="text/javascript">
	function initMap() {
		var map = new google.maps.Map($('.map'), {
			center: {lat: -34.397, lng: 150.644},
			zoom: 6
		})
		var infoWindow = new google.maps.InfoWindow;

		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
				var pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				}

				infoWindow.setPosition(pos)
				infoWindow.setContent('Current Position')
				infoWindow.open(map)
				map.setCenter(pos)
			}, function () {
				handleLocationError(true, infoWindow, map.getCenter())
			})
		}
	}
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ45tYOgqkKzl7HpmU8kiqWp6GV5iKHEk&callback=initMap"></script>
</body>
</html>
