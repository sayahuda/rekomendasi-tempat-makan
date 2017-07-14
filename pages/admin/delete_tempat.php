<?php
	require_once('../../fungsi/fungsi.php');
	konek_db();
	$id = $_GET['id'];
	echo $id;
	$query = mysql_query("DELETE FROM MD_RMAKAN WHERE KD_RMAKAN='".$id."';");
	if($query){
		echo "<script>alert('Berhasil Hapus!'); </script>";
		echo "<meta http-equiv='refresh' content='0; url=list_tempat.php'>";
	}else{
		echo "<script>alert('Gagal Hapus!'); </script>";
		echo "<meta http-equiv='refresh' content='0; url=list_tempat.php'>";
	}

 ?>
