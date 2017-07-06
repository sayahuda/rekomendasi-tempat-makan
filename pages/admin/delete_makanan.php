<?php
	require_once('../../fungsi/fungsi.php');
	konek_db();
	$id = $_GET['id'];
	$query = mysql_query("DELETE FROM MD_MAKANAN WHERE KD_MAKANAN=$id;");
	if($query){
		echo "<script>alert('Berhasil dihapus'); </script>";
		echo "<meta http-equiv='refresh' content='0; url=list_makanan.php'>";
	}else{
		echo "<script>alert('gagal dihapus'); </script>";
		echo "<meta http-equiv='refresh' content='0; url=list_makanan.php'>";
	}

 ?>
