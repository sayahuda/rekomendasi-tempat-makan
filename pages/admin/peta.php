<?php
  $peringatan='';
  require_once('../../fungsi/fungsi.php');
  konek_db();

 ?>
 <html>
<head>
<?php include_once"head.php"; ?>

<!-- load googlemaps api dulu -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ45tYOgqkKzl7HpmU8kiqWp6GV5iKHEk"></script>

<script type="text/javascript">
  var peta;
  var gambar_tanda;
  gambar_tanda = '../asset/marker.png';
  
  

  function peta_awal(){
    // posisi default peta saat diload
    
      var lokasibaru = new google.maps.LatLng(-7.7760801,110.3892547);
      var petaoption = {
      zoom: 13,
      center: lokasibaru,
      mapTypeId: google.maps.MapTypeId.ROADMAP
        };

      peta = new google.maps.Map(document.getElementById("map_canvas"),petaoption);

      // ngasih fungsi marker buat generate koordinat latitude & longitude
      tanda = new google.maps.Marker({
          position: lokasibaru,
          map: peta,   
          draggable : true
      });

      // ketika markernya didrag, koordinatnya langsung di selipin di textfield
      google.maps.event.addListener(tanda, 'dragend', function(event){
        document.getElementById('latitude').value = this.getPosition().lat();
        document.getElementById('longitude').value = this.getPosition().lng();
    });
  }

  function setpeta(x,y,id){
    // mengambil koordinat dari database
    var lokasibaru = new google.maps.LatLng(x, y);
    var petaoption = {
      zoom: 20,
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
</head>
<body onload="peta_awal()" class="hold-transition skin-blue sidebar-mini">

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
        LIST TEMPAT MAKAN
        <small>rekomendasi tempat makan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard" class="active"></i> Home</a></li>
        <li><a href="list_makanan.php">Data Tempat Makan</a></li>
        <li class="active">Lihat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">List Data Tempat Makan</h3>
              </div>
            
            <br>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-9">
                  <div class="control-group">
                   <div id="map_canvas" style="width:100%; height:500px"></div>
                  </div>
                </div>
                <div class="col-md-3">
                    <form action="?action=add" method="POST">
                    <div class="span4">
                    <div class="control-group">
                      <label class="control-label" for="input01">Nama Cabang</label>
                      <div class="controls">
                      <input type="text" class="input-xlarge" id="nama_cabang" name="nama_cabang" rel="popover" data-content="Masukkan nama cabang." data-original-title="Cabang">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="input01">Longitude</label>
                        <div class="controls">
                        <input type="text" class="input-xlarge" id="longitude" name="longitude" >
                        </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="input01">Latitude</label>
                        <div class="controls">
                        <input type="text" class="input-xlarge" id="latitude" name="latitude">
                        </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="input01"></label>
                        <div class="controls">
                         <button type="submit" class="btn btn-success">Tambah Cabang</button>

                        </div>
                    </div>
                    </form>
                  
                </div>
              

                <div class="control-group">
                  <label class="control-label" for="input01">Daftar Cabang</label>
                    <div class="controls">
                    <div id="daftar">
                    <ul>
                    <?php
                    // mengambil data dari database
                    $lokasi = mysql_query("select * from `md_rmakan`");

                    while($l=mysql_fetch_array($lokasi)){
                      // membuat fungsi javascript untuk nantinya diolah dan ditampilkan dalam peta

                      echo "<li><a href=\"javascript:setpeta(".$l['LOKASI'].",".$l['KD_RMAKAN'].")\">".$l['NM_RMAKAN']."</a> | <a href='?action=remove&id=".$l['KD_RMAKAN']."'>Hapus</a></li>";
                    }
                    ?>
                    </ul>
                    </div>

                    </div>
                </div>


              </div>
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
</body>
</html>



