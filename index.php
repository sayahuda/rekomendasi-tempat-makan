<?php
	require_once('fungsi/fungsi.php');
	konek_db();

 ?>

 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rekomendasi Tempat Makan</title>
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

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <!-- <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
        </div>
        <div class="pull-left info">
          <p>Hudalloh</p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
        <br>
      </div>
      
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
          <a href="pages/admin/list_user.php">
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
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php
              $sql= "SELECT KD_MAKANAN FROM MD_MAKANAN";
              $isi=mysql_query($sql) or die(mysql_error());
              $hasil=mysql_num_rows($isi);
              echo $hasil;
               ?>
             </h3>

              <p>Makanan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="../admin/pages/admin/list_makanan.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->

          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php
              $sql= "SELECT KD_RMAKAN FROM MD_RMAKAN";
              $isi=mysql_query($sql) or die(mysql_error());
              $hasil=mysql_num_rows($isi);
              echo $hasil;
               ?>
             </h3>

              <p>Temapat Makan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag" ></i>
            </div>
            <a href="../admin/pages/admin/list_tempat.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php
              $sql= "SELECT KD_USER FROM MD_USER";
              $isi=mysql_query($sql) or die(mysql_error());
              $hasil=mysql_num_rows($isi);
              echo $hasil;
               ?>
             </h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add" ></i>
            </div>
            <a href="pages/admin/list_user.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <!-- MAP -->

      <!-- <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="col-xs-10">
              <div class="box-header">
                <h3 class="box-title">Lokasi</h3>
              </div>

            </div>
            <div class="box-body">
                <?php   ; ?>
            </div>
           
          </div>
        </div>

      </div> -->
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
              <form method="post" action="proses.php">
    						<div class="row">
    							<div class="col-md-6">
                      
                    <input type="hidden" id="latitude">
                     <input type="hidden" id="longitude">

                       <input type="hidden" align="center" placeholder="Menunggu permintaan lokasi" name="asal" id="asal" size="40" class="form-control" readonly="readonly" required/>
            
    								<div class="form-group">
    									<p>Jenis Makanan :</p>
    									<select class="form-control" name="rasa">
    										<option value="-" >--Silahkan Pilih Salah Satu--</option>
    										<?php
    										$query = mysql_query("SELECT MD_MAKANAN.KD_RASA AS KD_RASA, V_RASA.KD_RASA AS RASA, V_RASA.NAMA AS NAMA
													FROM V_RASA JOIN MD_MAKANAN ON MD_MAKANAN.KD_RASA=V_RASA.KD_RASA GROUP BY MD_MAKANAN.KD_RASA;");
    										while($data = mysql_fetch_array($query)){
    											?>
    											<option value="<?php echo $data['KD_RASA']; ?>"> <?php echo $data['NAMA']; ?> </option>
    											<?php } ?>

    										</select>
    								</div>
    								<div class="form-group">
    									<p>Jenis Tempat Makan :</p>
    									<select class="form-control" name="jenis">
    										<option value="-">--Silahkan Pilih Salah Satu--</option>
    										<?php
    										$query = mysql_query("SELECT MD_RMAKAN.KD_JENIS AS KD_JENIS, JENIS_RM.JENIS AS JENIS
                         FROM MD_RMAKAN JOIN JENIS_RM ON MD_RMAKAN.KD_JENIS=JENIS_RM.KD_JENIS GROUP BY MD_RMAKAN.KD_JENIS ;");
    										while($data = mysql_fetch_array($query)){
    											?>
    											<option value="<?php echo $data['KD_JENIS']; ?>"> <?php echo $data['JENIS']; ?> </option>
    											<?php } ?>

    										</select>
    								</div>

    								<div class="form-group">
    									<p>Harga Makanan :</p>
    									<select class="form-control" name="harga">
    										<option value="-">--Silahkan Pilih Salah Satu--</option>
    										<?php
    											$query = mysql_query("SELECT * FROM v_harga;");
    											while($data = mysql_fetch_array($query)){
    										 ?>
    										<option value="<?php  echo $data['KD_FK']; ?>" > <?php echo $data['STATUS']; ?> </option>
    										<?php } ?>

    									</select>
    								</div>


    								<div class="form-group">
    									<p>Jarak Tempat Makan :</p>
    									<select class="form-control" name="jarak">
    										<option value="-">--Silahkan Pilih Salah Satu--</option>
    										<?php
    											$query = mysql_query("SELECT * FROM v_jarak;");
    											while($data = mysql_fetch_array($query)){
    										 ?>
    										<option value="<?php echo $data['KD_FK']; ?>" > <?php echo $data['STATUS']; ?> </option>
    										<?php } ?>

    									</select>
    								</div>

    							</div>
    							<div class="col-md-6">

    								<div class="form-group">
    									<p>Luas Tempat Makan :</p>
    									<select class="form-control" name="luas">
    										<option value="-">--Silahkan Pilih Salah Satu--</option>
    										<?php
    											$query = mysql_query("SELECT * FROM v_luas;");
    											while($data = mysql_fetch_array($query)){
    										 ?>
    										<option value="<?php echo $data['KD_FK']; ?>" > <?php echo $data['STATUS']; ?> </option>
    										<?php } ?>

    									</select>
    								</div>

    								<div class="form-group">
    									<p>Fasilitas Tempat Makan :</p>
    									<select class="form-control" name="fasilitas">
    										<option value="-">--Silahkan Pilih Salah Satu--</option>
    										<?php
    											$query = mysql_query("SELECT * FROM v_fasilitas;");
    											while($data = mysql_fetch_array($query)){
    										 ?>
    										<option value="<?php echo $data['KD_FK']; ?>" > <?php echo $data['STATUS']; ?> </option>
    										<?php } ?>

    									</select>
    								</div>

    								<div class="form-group">
    									<p>Operator :</p>
    									<select class="form-control" name="operator">
    										<option value="AND">AND</option>
    										<option value="OR">OR</option>
    									</select>
    								</div>
    								<div class="form-group">
    									<button type="reset" class="btn btn-danger" style="width: 100%;">Reset</button>
    								</div>
    								<div class="form-group">
    									<button type="submit" class="btn btn-danger" style="width: 100%;">Lihat Rekomendasi</button>
    								</div>
    							</div>
    						</div>
    					</form>
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
<script src="plugins/morris/morris.min.js"></script>
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

<script>
    var latitude = document.getElementById('latitude');
    var longitude = document.getElementById('longitude');
    var asal = document.getElementById('asal');

    if (navigator.geolocation) {
      function onSuccess(position){
        latitude.value = position.coords.latitude;
        longitude.value = position.coords.longitude;
        asal.value = latitude.value.concat(', ').concat(longitude.value);
      }
      function onError(error) {
        alert("Error : " + error.code + ", Message: " + error.message);
      }

      navigator.geolocation.getCurrentPosition(onSuccess, onError);
    } else {
      alert("Browser Tidak Suport");
    }
</script>
</body>
</html>
