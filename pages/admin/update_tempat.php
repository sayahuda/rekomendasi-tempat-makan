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


    	$query = mysql_query("UPDATE MD_RMAKAN SET  NM_RMAKAN='".$nama."', ALAMAT='".$alamat."',
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
					    $query = mysql_query("SELECT MD_RMAKAN.KD_USER AS KD_USER, MD_RMAKAN.NM_RMAKAN AS NM_RMAKAN, MD_RMAKAN.ALAMAT AS ALAMAT,
              MD_RMAKAN.NO_TLP AS NO_TLP, MD_RMAKAN.KD_JENIS AS KD_JENIS, MD_RMAKAN.EMAIL AS EMAIL, MD_RMAKAN.LUAS AS LUAS,
              MD_RMAKAN.LOKASI AS LOKASI,
               MD_USER.KD_USER AS USER, MD_USER.NAMA AS NAMA, JENIS_RM.JENIS AS JENIS FROM MD_RMAKAN JOIN MD_USER ON MD_RMAKAN.KD_USER=MD_USER.KD_USER JOIN JENIS_RM ON MD_RMAKAN.KD_JENIS=JENIS_RM.KD_JENIS WHERE KD_RMAKAN=$id;");

					    $data = mysql_fetch_array($query)

					    ?>
  							<div class="form-group">
                  <label>Nama Pemilik</label>
                  <input type="text" required name="kd_user" maxlength="20"class="form-control" value="<?php echo $data['NAMA']; ?>">
                </div>
                <div class="form-group">
                  <label>Nama Rumah Makan </label>
                  <input type="text" required name="nama" class="form-control" value="<?php echo $data['NM_RMAKAN']; ?>">
                </div>
                <div class="form-group">
                  <p><b>Jenis</b></p>
                  <select class="form-control" name="kd_jenis">
                    <option value="<?php  echo $data['KD_JENIS']; ?>"><?php echo $data['JENIS']; ?></option>
                    <?php
                    $query = mysql_query("SELECT KD_JENIS, JENIS FROM JENIS_RM WHERE NOT KD_JENIS='".$data['KD_JENIS']."';");
                    while($dt = mysql_fetch_array($query)){
                      ?>
                      <option value="<?php echo $dt['KD_JENIS']; ?>"> <?php echo $dt['JENIS']; ?> </option>
                      <?php } ?>

                    </select>
                </div>
                <div class="form-group">
                  <label>Alamat </label>
                  <input type="text" name="alamat" class="form-control" value="<?php echo $data['ALAMAT']; ?>">
                </div>
                <div class="form-group">
                  <label>Email </label>
                  <input type="email" required name="email" class="form-control" value="<?php echo $data['EMAIL']; ?>">
                </div>
                <div class="form-group">
                  <label>Telephon </label>
                  <input type="number" name="tlp" class="form-control" value="<?php echo $data['NO_TLP']; ?>">
                </div>
                <div class="form-group">
                  <label>Luas </label>
                  <input type="number" required name="luas" class="form-control" value="<?php echo $data['LUAS']; ?>">
                </div>
  						</div>

  						<div class="col-md-6">
  							
  							<div class="form-group">
                  <label>Lokasi </label>
                  <div id="map_canvas" style="width:100%; height:350px"></div>
                  <input type="text" required name="lokasi" class="form-control" id="latitude" placeholder="Latitude">

                  <input type="type" required name="lokasi1" class="form-control" id="longitude" placeholder="Longtitude">

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
