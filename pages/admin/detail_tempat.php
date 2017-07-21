<?php

  require_once('../../fungsi/fungsi.php');
  konek_db();

  $id = $_GET['id'];
  $query = mysql_query("SELECT * FROM MD_RMAKAN WHERE KD_RMAKAN=$id;");
  $data = mysql_fetch_array($query);

 ?>

 <!DOCTYPE html>
<html>
<?php require_once('head.php'); ?>
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
      title :'nama',
      position: lokasibaru,
      icon: gambar_tanda,
      animation : google.maps.Animation,

      map: peta
    });
    var contentString = '<?php  echo $data['NM_RMAKAN']; ?>';
    var infowindow = new google.maps.InfoWindow({
                content: contentString
              });
    tanda.addListener('click', function() {
                infowindow.open(peta, tanda);
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
        <li class="active treeview">
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
        DETAIL TEMPAT MAKAN
        <small>rekomendasi tempat makan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard" class="active"></i> Home</a></li>
        <li><a href="list_tempat.php">Data Tempat Makan</a></li>
        <li class="active">Detail Tempat Makan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
      <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border" align="center">
                <h1 class="box-title" ><b><?php echo $data['NM_RMAKAN']; ?></b></h1>
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-7">
                  <div class="control-group">
                   <div id="map_canvas" style="width:100%; height:500px"></div>
                  </div>
              </div>
              <div class="col-md-5">
                <div class="box-header with-border">
                  <h3 class="box-title" >Detail Tempat Makan</h3>
                </div>
                <table id="example3" class="table table-bordered table-hover">
                  <thead >
                    <tr>
                      <td><b>Nama   </b></td>
                      <td><?php echo $data['NM_RMAKAN']; ?></td>
                    </tr>

                    <tr>
                      <td><b>Alamat   </b></td>
                      <td><?php echo $data['ALAMAT']; ?></td>
                    </tr>

                    <tr>
                      <td><b>Email </b></td>
                      <td><?php echo $data['EMAIL']; ?></td>
                    </tr>
                    <tr>
                      <td><b>Telephon </b></td>
                      <td><?php echo $data['NO_TLP']; ?></td>
                    </tr>
                    <tr>
                      <td><b>Luas   </b></td>
                      <td><?php echo m2($data['LUAS']); ?></td>
                    </tr>

                    <tr>
                      <td><b>Fasilitas  </b></td>
                      <td>
                      <br>
                        <?php

                        $sql= mysql_query("SELECT FASILITAS.NAMA AS NAMA, FASILITAS.KD_FASILITAS AS KD_FASILITAS, CEK_FASILITAS.KD_FASILITAS AS FASILITAS,
                          CEK_FASILITAS.KD_RMAKAN AS RMAKAN
                          FROM CEK_FASILITAS JOIN MD_RMAKAN ON CEK_FASILITAS.KD_RMAKAN=MD_RMAKAN.KD_RMAKAN
                          JOIN FASILITAS ON CEK_FASILITAS.KD_FASILITAS = FASILITAS.KD_FASILITAS WHERE CEK_FASILITAS.KD_RMAKAN=$id;");
                        $no = 1;
                        while ($data = mysql_fetch_array($sql))
                        {
                          echo "<input type='checkbox' checked disabled value='".$data['NAMA']."' /> ".$data['NAMA']."<br />";
                          $no++;

                        }
                         ?>
                      </td>
                    </tr>
                  </thead>
                </table>
              </div>
              </div>
              
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <!-- /.box-footer -->
          </div>
          <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="col-xs-10">
              <div class="box-header">
                <h3 class="box-title"><b>List Makanan</b></h3>
              </div>

            </div>
            <div class="col-xs-2">
              <div class="box-header">
                <a href="tambah_makanan.php" class="btn btn-success" style="width:150px" role="button"><i class="fa fa-plus"> <b> Tambah </b> </i></a>

              </div>
            </div>
            <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead >
                  <tr >
                      <th style="text-align: center" width="20px">No</th>
                      <th style="text-align: center" width="30px">Kode</th>
                      <th style="text-align: center" width="250px">Nama</th>
                      <th >Rasa</th>
                      <th >Harga</th>
                      <th style="text-align: center" >Action</th>
                   </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
                $sql = mysql_query("SELECT MD_MAKANAN.KD_RMAKAN AS KD_RMAKAN, MD_MAKANAN.KD_MAKANAN AS KD_MAKANAN,
                  MD_MAKANAN.NAMA AS NAMA, MD_MAKANAN.HARGA AS HARGA, V_RASA.NAMA AS RASA FROM MD_MAKANAN JOIN V_RASA
                  ON MD_MAKANAN.KD_RASA=V_RASA.KD_RASA WHERE KD_RMAKAN=$id;");
                while ($isi = mysql_fetch_array($sql)) {
                  $i++;
                  ?>
                  <tr >
                    <td align="center"><?php echo $i; ?></td>
                    <td><?php echo $isi['KD_RMAKAN'].$isi['KD_MAKANAN']; ?></td>
                    <td align="center"><?php echo $isi['NAMA']; ?></td>
                    <td><?php echo $isi['RASA']; ?></td>
                    <td><?php echo rp($isi['HARGA']); ?></td>
                    <td align="center">
                      <a class="glyphicon glyphicon-cloud" href="detail_makanan.php?id=<?php echo $isi['KD_MAKANAN']; ?>" title="Detail" ></a>
                      <a class="glyphicon glyphicon-edit" href="update_makanan.php?id=<?php echo $isi['KD_MAKANAN']; ?>" title="Edit" ></a>
                      <a class="glyphicon glyphicon-trash" href="delete_makanan.php?id=<?php echo $isi['KD_MAKANAN']; ?>" title="Hapus" ></a>
                    </td>
                  </tr>
                  <?php
                }

               ?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          <!-- /.box -->
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

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w"></script>

<script>

function initialize() {
  var myLatlng = new google.maps.LatLng(-7.7760801,110.3892547);
  var mapOptions = {
    zoom: 10,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading"><?php echo $titles ?></h1>'+
      '<div id="bodyContent">'+
      '<p><?php echo $alamat ?></p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Maps Info',
      icon:'img/marker.png'
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

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
