<?php 
	require_once('../../fungsi/fungsi.php');
	konek_db();

	if(isset($_POST['simpan'])){
		//murah
		$murah_bawah = $_POST['0'];

		if($_POST['1']=='-'){
			$murah_tengah=null;
		}else{
			$murah_tengah = $_POST['1'];
		}
		
		$murah_atas = $_POST['2'];

		//sedang
		$sedang_bawah = $_POST['3'];

		if($_POST['4']=='-'){
			$sedang_tengah=null;
		}else{
			$sedang_tengah = $_POST['4'];
		}

		$sedang_atas = $_POST['5'];

		//mahal
		$mahal_bawah = $_POST['6'];

		if($_POST['7']=='-'){
			$mahal_tengah=null;
		}else{
			$mahal_tengah = $_POST['7'];
		}

		$mahal_atas = $_POST['8'];

		$sedikit = mysql_query("UPDATE V_HARGA SET batas_bawah='".$murah_bawah."',batas_tengah='".$murah_tengah."', batas_atas='".$murah_atas."' WHERE status='murah';");
		$banyak = mysql_query("UPDATE V_HARGA SET batas_bawah='".$sedang_bawah."', batas_atas='".$sedang_atas."', batas_tengah='".$sedang_tengah."' WHERE status='sedang';");
		$banyak = mysql_query("UPDATE V_HARGA SET batas_bawah='".$mahal_bawah."', batas_atas='".$mahal_atas."', batas_tengah='".$mahal_tengah."' WHERE status='mahal';");

	}



 ?>


 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Pendukung Keputusan Pemilihan Kendaraan</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body style="background: url('asset/background2.jpg') repeat;">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php"><span style="color: white;"><b>Fuzzy Cari Kendaraan | </b></span></a> <a href="master.php" class="navbar-brand" style="color: red;">Master Data</a>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div class="col-md-8 col-md-offset-2">			
		
		

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					
				</div>
			</div>
		</div><!--/.row-->


		<div class="row" >
			<div class="col-md-12">
				<div class="panel panel-default">
					<div>
						<img src="asset/background.jpg" class="img img-responsive">
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked desktop"><use xlink:href="#stroked-desktop"></use></svg>Update Data Harga Kendaraan:</div>
					<div class="panel-body">
						<form method="post" action="#" id="fx">
						<div class="row">
							<?php 
								$query = mysql_query("SELECT * FROM V_HARGA;");
								$i=0;
								$x=90;
								while ($data = mysql_fetch_array($query)) {

							 ?>
							<div class="col-md-4">
								<div class="form-group">
									<label align="center"><?php echo $data['status']; ?> :</label>
									<hr>


									<p>Pilih fungsi keanggotaan</p>


									<select name="fn_keangotaan" id="<?php echo strtoupper($data['status']); ?>" class="form-control" onchange="<?php echo "cek_".strtolower($data['status'])."();"; ?>">
										<option value=" - "> - </option>
										<option value="turun"> turun </option>
										<option value="segitiga"> segitiga </option>
										<option value="naik"> naik </option>
									</select>
									<hr>

									<p>Batas Bawah  :</p>
									<input type="number" class="form-control" disabled id="<?php  echo "f".$i;?>" name=<?php echo $i; ?> value=<?php echo $data['batas_bawah']; ?>>
									<?php $i++; ?>

									<hr>

									<p>Batas Tengah  :</p>
									<input type="text" class="form-control" disabled id="<?php  echo "f".$i;?>" name=<?php echo $i; ?> value=<?php echo $data['batas_tengah']; ?>>
									<?php $i++; ?>
									<hr>

									<p>Batas Atas  :</p>
									<input type="number" class="form-control" disabled id="<?php  echo "f".$i;?>" name= <?php echo $i; ?> value=<?php echo $data['batas_atas']; ?>>
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
								$sql = mysql_query("SELECT * FROM f_harga;");
								while ($isi = mysql_fetch_array($sql)) {
									?>
									<tr>
										<td><?php echo $isi['status']; ?></td>
										<td><?php echo rp($isi['batas_bawah']); ?></td>
										<td><?php echo rp($isi['batas_tengah']); ?></td>
										<td><?php echo rp($isi['batas_atas']); ?></td>
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
		
								
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>

	<script type="text/javascript">
		function cek_murah(){
				if(fx.MURAH.value=='turun'){
					fx.f0.disabled=false;
					fx.f1.disabled=true;
					fx.f1.value='-';					
					fx.f2.disabled=false;
				}else if(fx.MURAH.value=='segitiga'){
					fx.f0.disabled=false;
					fx.f1.disabled=false;
					fx.f2.disabled=false;
				}else if(fx.MURAH.value=='naik'){
					fx.f0.disabled=false;
					fx.f1.disabled=true;
					fx.f1.value=null;
					fx.f2.disabled=false;
				}else{
					fx.f0.disabled=true;
					fx.f1.disabled=true;
					fx.f2.disabled=true;
				}
		}

		function cek_sedang(){
				if(fx.SEDANG.value=='turun'){
					fx.f3.disabled=false;
					fx.f4.disabled=true;
					fx.f4.value=null;
					fx.f5.disabled=false;
				}else if(fx.SEDANG.value=='segitiga'){
					fx.f3.disabled=false;
					fx.f4.disabled=false;
					fx.f5.disabled=false;
				}else if(fx.SEDANG.value=='naik'){
					fx.f3.disabled=false;
					fx.f4.disabled=true;
					fx.f4.value=null;
					fx.f5.disabled=false;
				}else{
					fx.f3.disabled=true;
					fx.f4.disabled=true;
					fx.f5.disabled=true;
				}
		}

		function cek_mahal(){
				if(fx.MAHAL.value=='turun'){
					fx.f6.disabled=false;
					fx.f7.disabled=true;
					fx.f7.value='-';
					fx.f8.disabled=false;
				}else if(fx.MAHAL.value=='segitiga'){
					fx.f6.disabled=false;
					fx.f7.disabled=false;
					fx.f8.disabled=false;
				}else if(fx.MAHAL.value=='naik'){
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

</body>

</html>