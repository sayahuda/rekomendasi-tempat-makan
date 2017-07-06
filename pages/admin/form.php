<?php
mysql_connect("localhost", "root", "");
mysql_select_db("rekomendasi");

if(isset($_POST['submit'])){
		$kd_rmakan = $_POST['kd_rmakan']; 
		$jumMK = 2; 
		for($i = 1; $i <= $jumMK; $i++) { 
			$fst = $_POST['fst'.$i]; 
			if (!empty($fst)) { 
				$query = "INSERT INTO CEK_FASILITAS VALUES('$kd_rmakan', '$fst', 0)"; 
				mysql_query($query); 
			} 
		} 
		echo "Terimakasih sudah memilih matakuliah"; 

	}
?>

<h1>Form Pengambilan Matakuliah</h1>

<form method="post" action="#">
Kode Rumah Makan <input type="text" name="kd_rmakan" /><br />
Daftar Matakuliah <br />
<?php
$query = "SELECT * FROM fasilitas";
$hasil = mysql_query($query);
$no = 1;
while ($data = mysql_fetch_array($hasil))
{
echo "<input type='checkbox' value='".$data['KD_FASILITAS']."' name='fst".$no."' /> ".$data['NAMA']."<br />";
$no++;
}
?>
<input type="submit" name="submit" value="Submit" />

</form>