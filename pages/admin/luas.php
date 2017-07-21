<?php
	$nama_file="default.jpg";
	$peringatan='';
	require_once('../../fungsi/fungsi.php');
	konek_db();
		error_reporting(0);
	$tabel ="V_LUAS";

	if(isset($_POST['simpan'])){
		$status=$_POST['status'];
		//1
		$bawah1 = $_POST['0'];

		$tengah1 = $_POST['1'];

		$atas1 = $_POST['2'];

		//2
		$bawah2 = $_POST['3'];
		$tengah2 = $_POST['4'];
		$atas2 = $_POST['5'];

		//3
		$bawah3 = $_POST['6'];
		$tengah3 = $_POST['7'];
		$atas3 = $_POST['8'];
		
		$query1 = mysql_query("UPDATE '".$tabel."' SET STATUS='".$status."', BATAS_BAWAH='".$bawah1."', BATAS_ATAS='".$atas1."', BATAS_TENGAH='".$tengah1."' WHERE KD_FK=1;");
		$query2 = mysql_query("UPDATE '".$tabel."' SET STATUS='".$status."', BATAS_BAWAH='".$bawah2."', BATAS_ATAS='".$atas2."', BATAS_TENGAH='".$tengah2."' WHERE KD_FK=2;");
		$query3 = mysql_query("UPDATE '".$tabel."' SET STATUS='".$status."', BATAS_BAWAH='".$bawah3."', BATAS_ATAS='".$atas3."', BATAS_TENGAH='".$tengah3."' WHERE KD_FK=3;");
	}
	
 ?>


 <!DOCTYPE html>
<html>
<?php 	require_once"head.php"; ?>

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
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Parameter</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class=" active treeview-menu">
            <li><a href="harga.php"><i class="fa fa-archive"></i> Harga</a></li>
            <li><a href="fasilitas.php"><i class="fa fa-archive"></i> Fasilitas</a></li>
            <li><a href="jarak.php"><i class="fa fa-archive"></i> Jarak</a></li>
            <li ><a  href="luas.php"><i class="fa fa-archive"></i> Luas</a></li>
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
        Variabel Luas
        <small>rekomendasi tempat makan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-dashboard" class="active"></i> Home</a></li>
        <li><a href="luas.php">Variabel Luas</a></li>
        <li class="active">Luas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">

						<div class="panel-body">
							<form method="post" action="#" id="fx">
							<div class="row">
								<?php
									$query = mysql_query("SELECT $tabel.KD_FK AS KD_FK, $tabel.BATAS_BAWAH AS BATAS_BAWAH, $tabel.BATAS_TENGAH
									AS BATAS_TENGAH, $tabel.BATAS_ATAS AS BATAS_ATAS, $tabel.STATUS AS STATUS, FUNGSI_KEANGGOTAAN.KODE AS KODE,
									FUNGSI_KEANGGOTAAN.NAMA AS NAMA FROM $tabel JOIN FUNGSI_KEANGGOTAAN ON $tabel.KD_FK=FUNGSI_KEANGGOTAAN.KODE;");
									$i=0;
									while ($data = mysql_fetch_array($query)) {

								 ?>
								<div class="col-md-4">
									<div class="form-group">

										<label align="center">Himpunan </label>
										<input type="text" class="form-control" name="status" value="<?php echo $data['STATUS']; ?>">

										<hr>
										<p>	Pilih Fungsi Keanggotaan</p>
										<select name="fN_keanggotaan" id="<?php echo "p".$data['KD_FK']; ?>" class="form-control" onchange="<?php echo "cek_".$data['KD_FK']."();"; ?>">	

												<option value="<?php echo "l".$data['KD_FK']; ?>"><?php echo $data['NAMA'] ?></option>
										<?php 	$sql= mysql_query("SELECT * FROM FUNGSI_KEANGGOTAAN ;");
												while ($dt= mysql_fetch_array($sql)) {?>
												 	
												<option value="<?php echo "l".$dt['KODE']; ?>"><?php 	echo $dt['NAMA']; ?></option>
												
												 <?php } ?>
										</select>
										<hr>
										<!-- <div>	
            							<canvas id="myChart" width="100" height="100"></canvas>
										</div>
            							<hr> -->
										<p>Batas Bawah  :</p>
										<input type="number" disabled id="<?php echo "f".$i; ?>" class="form-control" name=<?php echo $i; ?> value=<?php echo $data['BATAS_BAWAH']; ?>>
										<?php $i++; ?>

										<hr>
										<p>Batas Tengah  :</p>
										<input type="text" disabled id="<?php echo "f".$i; ?>" class="form-control" name=<?php echo $i; ?> value=<?php 	echo $data['BATAS_TENGAH']; ?>>
										<?php 	$i++; ?>
										<hr>
										<p>Batas Atas  :</p> 
										<input type="number"  disabled id="<?php echo "f".$i; ?>" class="form-control" name= <?php echo $i; ?> value=<?php echo $data['BATAS_ATAS']; ?>>
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
					<div class="panel-heading"><svg class="glyph stroked desktop"><use xlink:href="#stroked-desktop"></use></svg>Batas Untuk Harga Makanan:</div>
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
								$sql = mysql_query("SELECT * FROM $tabel;");
								while ($isi = mysql_fetch_array($sql)) {
									?>
									<tr>
										<td><?php echo $isi['STATUS']; ?></td>
										<td><?php echo rp($isi['BATAS_BAWAH']); ?></td>
										<?php if ($isi['BATAS_TENGAH']==null){

											?>
											<td><?php echo "NULL"; ?></td>
											<?php 
											}else {
												?>
											<td><?php echo rp($isi['BATAS_TENGAH']); ?></td>
											<?php	
											} ?>
										
										<td><?php echo rp($isi['BATAS_ATAS']); ?></td>
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
<script src="../../plugins/chartjs/chart.bundle.js"></script>
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

<script type="text/javascript">
	function cek_1(){
		if(fx.p1.value=='l1'){
			fx.f0.disabled=false;
			fx.f1.disabled=true;
			fx.f1.value='-';
			fx.f2.disabled=false;
		}else if (fx.p1.value=='l2') {
			fx.f0.disabled=false;
			fx.f1.disabled=false;
			fx.f2.disabled=false;
		}else if (fx.p1.value=='l3') {
			fx.f0.disabled=false;
			fx.f1.disabled=true;
			fx.f1.value='-';
			fx.f2.disabled=false;
		}else{
			fx.f0.disabled=false;
			fx.f1.disabled=true;
			fx.f2.disabled=false;
		}
	}
	function cek_2(){
		if(fx.p2.value=='l1'){
			fx.f3.disabled=false;
			fx.f4.disabled=true;
			fx.f4.value='-';
			fx.f5.disabled=false;
		}else if (fx.p2.value=='l2') {
			fx.f3.disabled=false;
			fx.f4.disabled=false;
			fx.f5.disabled=false;
		}else if (fx.p2.value=='l3') {
			fx.f3.disabled=false;
			fx.f4.disabled=true;
			fx.f5.value='-';
			fx.f6.disabled=false;
		}else{
			fx.f3.disabled=true;
			fx.f4.disabled=true;
			fx.f5.disabled=true;
		}
	}
	function cek_3(){
		if(fx.p3.value=='l1'){
			fx.f6.disabled=false;
			fx.f7.disabled=true;
			fx.f7.value='-';
			fx.f8.disabled=false;
		}else if (fx.p3.value=='l2') {
			fx.f6.disabled=false;
			fx.f7.disabled=false;
			fx.f8.disabled=false;
		}else if (fx.p3.value=='l3') {
			fx.f6.disabled=false;
			fx.f7.disabled=true;
			fx.f7.value='-';
			fx.f8.disabled=false;
		}else{
			fx.f6.disabled=true;
			fx.f7.disabled=true;
			fx.f8.disabled=true;
		}
	}
</script>
<script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
</body>
</html>
