<?php
	$nama_file="default.jpg";
	$peringatan='';
	require_once('../../fungsi/fungsi.php');
	konek_db();
  $id = $_GET['id'];
  $query = mysql_query("SELECT * FROM MD_RMAKAN WHERE KD_RMAKAN=$id;");
  $data = mysql_fetch_array($query);
	if(isset($_POST['simpan'])){
		$id         = $_GET['id'];
		$kd_rmakan  = $_POST['kd_rmakan'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $email      = $_POST['email'];
    $tlp        = $_POST['tlp'];
    $luas       = $_POST['luas'];
    $lokasi     = $_POST['lokasi'];
    $lokasi1     = $_POST['lokasi1'];
    $tempat     = $lokasi.','.$lokasi1;


    	$query = mysql_query("UPDATE MD_RMAKAN SET KD_RMAKAN='".$kd_rmakan."', NM_RMAKAN='".$nama."', ALAMAT='".$alamat."',
														EMAIL='".$email."', NO_TLP='".$tlp."', LUAS='".$luas."', LOKASI='".$tempat."'
      											WHERE KD_RMAKAN=$id;");

			$fst = mysql_query("SELECT * FROM FASILITAS;");
			//
			while ($data=mysql_fetch_array($fst)) {
				$fasilitas = "x".$data['KD_FASILITAS'];
				if(isset($_POST[$fasilitas])){
					//do nothing
				}else{
					$q_hapus = mysql_query("DELETE FROM CEK_FASILITAS WHERE KD_RMAKAN='".$id."' AND KD_FASILITAS='".$data['KD_FASILITAS']."';");
				}
			}

			//
			$fst = mysql_query("SELECT * FROM FASILITAS;");
			while ($data=mysql_fetch_array($fst)) {
				$fasilitas = "y".$data['KD_FASILITAS'];
        
				if(isset($_POST[$fasilitas])){
					$q_input = mysql_query("INSERT INTO CEK_FASILITAS (`KODE`, `KD_RMAKAN`, `KD_FASILITAS`) 
                                                       VALUES ('','".$id."','".$data['KD_FASILITAS']."');");
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
<?php require_once"head.php"; ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ45tYOgqkKzl7HpmU8kiqWp6GV5iKHEk"></script>

<script type="text/javascript">
  var peta;
  var gambar_tanda;
  gambar_tanda = '../asset/marker.png';

  function setpeta(x,y,id){
    // mengambil koordinat dari database
    var lokasibaru = new google.maps.LatLng(x, y);
    var petaoption = {
      zoom: 17,
      center: lokasibaru,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    peta = new google.maps.Map(document.getElementById("map_canvas"),petaoption);

     // ngasih fungsi marker buat generate koordinat latitude & longitude
    tanda = new google.maps.Marker({
      position: lokasibaru,
      icon: gambar_tanda,
      draggable : true,
      map: peta
    });

    // ketika markernya didrag, koordinatnya langsung di selipin di textfield
    google.maps.event.addListener(tanda, 'dragend', function(event){
        document.getElementById('latitude').value = this.getPosition().lat();
        document.getElementById('longitude').value = this.getPosition().lng();
    });
  }
</script>
<body onload="setpeta(<?php echo $data['LOKASI']; ?>,<?php echo $id; ?>)" class="hold-transition skin-blue sidebar-mini">
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
        UPDATE TEMPAT MAKAN
        <small>rekomendasi tempat makan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard" class="active"></i> Home</a></li>
        <li><a href="list_tempat.php">Data Tempat Makan</a></li>
        <li class="active">Update</li>
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
								<?php
					    $query = mysql_query("SELECT MD_RMAKAN.KD_USER AS KD_USER, MD_USER.KD_USER AS USER, MD_USER.NAMA AS NAMA FROM MD_RMAKAN JOIN MD_USER ON MD_RMAKAN.KD_USER=MD_USER.KD_USER WHERE KD_RMAKAN=$id;");

					    $data = mysql_fetch_array($query)

					    ?>
  							<div class="form-group">
                  <label>Pemilik</label>
                  <input type="text" name="kd_user" maxlength="20"class="form-control" value=<?php echo $data['NAMA']; ?>>
                </div>
							<?php
					    $query = mysql_query("SELECT * FROM MD_RMAKAN WHERE KD_RMAKAN=$id;");

					    $data = mysql_fetch_array($query)

					    ?>
  							<div class="form-group">
                  <label>Kode Rumah Makan </label>
                  <input type="text" name="kd_rmakan" class="form-control" value=<?php echo $data['KD_RMAKAN']; ?>>
                </div>
                <div class="form-group">
                  <label>Nama Rumah Makan </label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $data['NM_RMAKAN']; ?>">
                </div>
                <div class="form-group">
                  <label>Alamat </label>
                  <input type="text" name="alamat" class="form-control" value="<?php echo $data['ALAMAT']; ?>">
                </div>
                <div class="form-group">
                  <label>Email </label>
                  <input type="email" name="email" class="form-control" value="<?php echo $data['EMAIL']; ?>">
                </div>
  						</div>

  						<div class="col-md-6">
  							<div class="form-group">
  								<label>Telephon </label>
  								<input type="number" name="tlp" class="form-control" value="<?php echo $data['NO_TLP']; ?>">
  							</div>
  							<div class="form-group">
                  <label>Luas </label>
                  <input type="number" name="luas" class="form-control" value="<?php echo $data['LUAS']; ?>">
                </div>
  							<div class="form-group">
                  <label>Lokasi </label>
                  <div id="map_canvas" style="width:100%; height:500px"></div>
                  <input type="text" name="lokasi" class="form-control" ID="latitude">

                  <input type="type" name="lokasi1" class="form-control" id="longitude" >

                </div>
                <div class="form-group">
									<label>Fasilitas</label>
									<br>
									<?php
									$query = mysql_query("SELECT * FROM FASILITAS;");
									$i=0;
									while ($data = mysql_fetch_array($query)) {
										$fasilitas[$i][0] = $data['KD_FASILITAS'];
										$fasilitas[$i][1] = $data['NAMA'];
										$i++;
									}
									echo $data['KD_FASILITAS'];
									$query_cek = mysql_query("SELECT * FROM CEK_FASILITAS WHERE KD_RMAKAN='".$id."';");
									$i=0;
									while ($data = mysql_fetch_array($query_cek)) {
										$fasilitas_cek[$i][0] = $data['KD_FASILITAS'];
										$i++;
									}


									for ($i=0; $i < count($fasilitas) ; $i++) {
										$cek = 0;
										if (isset($fasilitas_cek)) {
											for ($j=0; $j < count($fasilitas_cek) ; $j++) {
												if ($fasilitas[$i][0] == $fasilitas_cek[$j][0]){
													$cek++;
												}
											}
										}

										if ($cek!=0) {
											$fasilitas[$i][2] = "x".$fasilitas[$i][0];
										}else{
											$fasilitas[$i][2] = "y".$fasilitas[$i][0];
										}
									}

									for ($i=0; $i < count($fasilitas); $i++) {
										if (substr($fasilitas[$i][2],0,1)== 'x') {
											?>
											<input type="checkbox" checked style="margin-left:5px" name="<?php echo $fasilitas[$i][2];?>"> <?php echo $fasilitas[$i][1]; ?>
											<br>
										<?php
									}else {
										?>
										<input type="checkbox" style="margin-left:5px" name="<?php echo $fasilitas[$i][2];?>"> <?php echo $fasilitas[$i][1]; ?>

										<?php
									}
									}
									 ?>

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
