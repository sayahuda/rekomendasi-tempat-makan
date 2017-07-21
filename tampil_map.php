<style>
  #map {
    height: 70%;
    width: 70%;
  }
  html, body {
    height: 100%;
    margin: 30;
    padding: 50;
  }
</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVH_syJtQgihGc7sF32SpVyl3ZSXHV974"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ45tYOgqkKzl7HpmU8kiqWp6GV5iKHEk"></script> -->

    
    <div id="map"></div>
    <?php   echo "string"; ?>

    <script>
      var x = -8.141071;
      var y = 110.584049;
      var myOptions = {
              zoom: 13,
              scaleControl: true,
              center:  new google.maps.LatLng(x, y),
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map"),
                myOptions);
            var contentString = 'Content 1';
            var contentString2 = 'Content 2';

            var markersaya = new google.maps.Marker({
            position : new google.maps.LatLng(-8.141071, 110.584049),
            title : 'Saya',
            labelIndex : 'x',
            map : map,
            draggable : false,
            animation : google.maps.Animation
            });

            var markerkamu = new google.maps.Marker({
            position : new google.maps.LatLng(-8.1470818, 110.6057437),
            title : 'Kamu',
            labelIndex : 'x',
            map : map,
            draggable : false,
            animation : google.maps.Animation
            });

            var infowindow = new google.maps.InfoWindow({
                content: contentString
              });
            var infowindow2 = new google.maps.InfoWindow({
                content: contentString2
              });


            markersaya.addListener('click', function() {
                infowindow.open(map, markersaya);
              });
            markerkamu.addListener('click', function() {
                infowindow2.open(map, markerkamu);
              });

// <?php 
//  error_reporting(E_ALL ^ E_DEPRECATED);
//   $server = 'localhost';
//   $user   = 'root';
//   $pass   = '';
//   $db   = 'skripsi';
  
//   $con = mysql_connect($server,$user,$pass);
//   if($con){
//     $selectdb = mysql_select_db($db);
//   }
//   $query = mysql_query("SELECT * FROM MD_RMAKAN");
//   while($data = mysql_fetch_array($query)){
//     $kode_alternatif = $data['KD_RMAKAN'];
//     $nama_alternatif = $data['NM_MAKAN'];
//     $posisi = explode(", " , $data['LOKASI']); 
//     ?>


//   var marker_<?php echo $kode_alternatif ?> = new google.maps.Marker({
//     position : new google.maps.LatLng(<?php echo $posisi[0] ?>, <?php echo $posisi[1] ?>),
//     title : '<?php echo $nama_alternatif ?>',
//     labelIndex : <?php echo $kode_alternatif ?>,
//     map : map,
//     draggable : false,
//     animation : google.maps.Animation
//     });

//   var content_<?php echo $kode_alternatif ?> = '<?php echo $nama_alternatif ?>';
//     var infowindow_<?php echo $kode_alternatif ?> = new google.maps.InfoWindow({
//         content: content_<?php echo $kode_alternatif ?>
//       });
//   marker_<?php echo $kode_alternatif ?>.addListener('click', function() {
//       infowindow_<?php echo $kode_alternatif ?>.open(map, marker_<?php echo $kode_alternatif ?>);
//     });


// <?php 
// ?>
    </script>