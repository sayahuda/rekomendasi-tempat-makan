<?php
	require_once('../../fungsi/fungsi.php');
	konek_db();
	$id = $_GET['id'];
	$query = mysql_query("DELETE FROM MD_USER WHERE KD_USER='".$id."';");
	if($query){
		echo "<script>alert('Berhasil Hapus!'); </script>";
		echo "<meta http-equiv='refresh' content='0; url=list_user.php'>";
	}else{
		echo "<script>alert('Gagal Hapus!'); </script>";
		echo "<meta http-equiv='refresh' content='0; url=list_user.php'>";
	}

 ?>
