<?php
	function konek_db(){
		mysql_connect('localhost','root','');
		mysql_select_db('rekomendasi');
	}

	function mf_linear_naik($nilai, $pilihan, $status){
		//fungsi aktivasi linear naik
		$query = mysql_query("SELECT * FROM ".$pilihan." WHERE UPPER(status)='".strtoupper($status)."';");
		$data = mysql_fetch_array($query);
		$batas_bawah = $data['BATAS_BAWAH'];
		$batas_atas = $data['BATAS_ATAS'];


		//fungsi keanggotaan linear naik

		if($nilai<=$batas_bawah){
			$nk = 0;
		}else if($nilai>=$batas_atas){
			$nk = 1;
		}else{
			$nk = ($nilai - $batas_bawah)/($batas_atas - $batas_bawah);
		}

		return $nk;
	}

	function mf_linear_turun($nilai, $pilihan, $status){
		//fungsi aktivasi linear turun
		//$sql = "SELECT * FROM ".$pilihan." WHERE status_jenis"
		$query = mysql_query("SELECT * FROM ".$pilihan." WHERE status='".$status."';");
		$data = mysql_fetch_array($query);
		$batas_bawah = $data['BATAS_BAWAH'];
		$batas_atas = $data['BATAS_ATAS'];

		//fungsi keanggotaan linear turun

		if($nilai<=$batas_bawah){
			$nk = 1;
		}else if($nilai>=$batas_atas){
			$nk = 0;
		}else{
			$nk = ($batas_atas - $nilai)/($batas_atas - $batas_bawah);
		}

		return $nk;
	}

	function mf_linear_sgt($nilai, $pilihan, $status){
		//fungsi aktivasi linear segitiga
		$query = mysql_query("SELECT * FROM ".$pilihan." WHERE upper(status)='".strtoupper($status)."';");
		$data = mysql_fetch_array($query);

		$batas_bawah = $data['BATAS_BAWAH'];
		$batas_tengah = $data['BATAS_TENGAH'];
		$batas_atas = $data['BATAS_ATAS'];


		//fungsi keanggotaan segitiga :
		if($nilai<=$batas_bawah || $nilai>=$batas_atas){
			$nk = 0;
		}else if($batas_bawah<=$nilai && $nilai<=$batas_tengah){
			$nk = ($nilai - $batas_bawah)/($batas_tengah - $batas_bawah);
		}else{
			$nk = ($batas_atas - $nilai)/($batas_atas - $batas_tengah);
		}

		return $nk;
	}
	function hit_jarak($KD_RMAKAN){
		$query = mysql_query("SELECT LOKASI FROM MD_RMAKAN WHERE KD_RMAKAN='".$KD_RMAKAN."' ;");
		$data = mysql_fetch_array($query);
		$from = "-7.7783772,110.4000222";
		$p = "-7.866103,110.116653";
		// $p = $data['LOKASI'];
	  $to = "$p";
	  // echo $to."<br>";
	  $from = urlencode($from);
	  $to = urlencode($to);

	  $data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=id-ID&sensor=false");
	  // echo $data;
	  $data = json_decode($data);

	  $time = 0;
	  $distance = 0;
	  foreach($data->rows[0]->elements as $road) {
	      // $time += $road->duration->value;
				 $distance += $road->distance->value;

	  }
		$kilo= floor($distance / 1000);
		// echo $kilo."<br>";
		return $kilo;
	}
	function hit_fasilitas($KD_RMAKAN){
		$sql_fasilitas = mysql_query("SELECT PARKIR_MOTOR, PARKIR_MOBIL, LESEHAN, WIFI, MUSHOLA, TOILET, GAZEBO, HALAL, KIPAS, AC,
			RUANG_RAPAT, PROYEKTOR, SOUND FROM MD_RMAKAN WHERE KD_RMAKAN='".$KD_RMAKAN."';");
		$data_fasilitas = mysql_fetch_array($sql_fasilitas);

		$temp=0;
		if($data_fasilitas['PARKIR_MOBIL']==1){
			$temp++;
		}

		if ($data_fasilitas['PARKIR_MOTOR']==1){
			$temp++;
		}

		if ($data_fasilitas['LESEHAN']==1){
			$temp++;
		}

		if($data_fasilitas['WIFI']==1){
			$temp++;
		}

		if($data_fasilitas['MUSHOLA']==1){
			$temp++;
		}

		if($data_fasilitas['TOILET']==1){
			$temp++;
		}
		if($data_fasilitas['GAZEBO']==1){
			$temp++;
		}
		if($data_fasilitas['HALAL']==1){
			$temp++;
		}
		if($data_fasilitas['KIPAS']==1){
			$temp++;
		}
		if($data_fasilitas['AC']==1){
			$temp++;
		}
		if($data_fasilitas['RUANG_RAPAT']==1){
			$temp++;
		}
		if($data_fasilitas['PROYEKTOR']==1){
			$temp++;
		}
		if($data_fasilitas['SOUND']==1){
			$temp++;
		}
		return $temp;
	}

	function lihat_hasil($rasa, $jenis, $harga, $jarak, $luas, $kebersihan, $fasilitas, $operator){
		if($rasa=='-' && $jenis=='-'){
		$sql = mysql_query("SELECT MD_MAKANAN.KD_MAKANAN AS KD_MAKANAN, MD_RMAKAN.KD_RMAKAN AS KD_RMAKAN, MD_MAKANAN.NAMA AS NAMA,
			MD_MAKANAN.RASA AS RASA, MD_MAKANAN.HARGA AS HARGA, MD_RMAKAN.KD_JENIS AS KD_JENIS, MD_RMAKAN.LUAS AS LUAS, MD_RMAKAN.KEBERSIHAN AS KEBERSIHAN
			FROM MD_MAKANAN JOIN MD_RMAKAN ON MD_MAKANAN.KD_RMAKAN=MD_RMAKAN.KD_RMAKAN;");
		}else if($rasa!='-' AND $jenis!='-') {
			$sql = mysql_query("SELECT MD_MAKANAN.KD_MAKANAN AS KD_MAKANAN, MD_RMAKAN.KD_RMAKAN AS KD_RMAKAN, MD_MAKANAN.NAMA AS NAMA,
				MD_MAKANAN.RASA AS RASA, MD_MAKANAN.HARGA AS HARGA, MD_RMAKAN.KD_JENIS AS KD_JENIS, MD_RMAKAN.LUAS AS LUAS, MD_RMAKAN.KEBERSIHAN AS KEBERSIHAN
				FROM MD_MAKANAN JOIN MD_RMAKAN ON MD_MAKANAN.KD_RMAKAN=MD_RMAKAN.KD_RMAKAN WHERE RASA=$rasa AND KD_JENIS=$jenis;");
		}else {
			$sql = mysql_query("SELECT MD_MAKANAN.KD_MAKANAN AS KD_MAKANAN, MD_RMAKAN.KD_RMAKAN AS KD_RMAKAN, MD_MAKANAN.NAMA AS NAMA,
				MD_MAKANAN.RASA AS RASA, MD_MAKANAN.HARGA AS HARGA, MD_RMAKAN.KD_JENIS AS KD_JENIS, MD_RMAKAN.LUAS AS LUAS, MD_RMAKAN.KEBERSIHAN AS KEBERSIHAN
				FROM MD_MAKANAN JOIN MD_RMAKAN ON MD_MAKANAN.KD_RMAKAN=MD_RMAKAN.KD_RMAKAN WHERE RASA='$rasa' OR KD_JENIS='$jenis';");
		}
		
		if($harga!='' && $jarak!='' && $luas!='' && $kebersihan!='' && $fasilitas!='' && $operator!=''){
			while($data = mysql_fetch_array($sql)){

				// $t_rasa	      = 'v_rasa';
				$t_harga	    = 'v_harga';
				$t_jarak	    = 'v_jarak';
				$t_kebersihan	= 'v_kebersihan';
				$t_fasilitas	= 'v_fasilitas';
				$t_luas	      = 'v_luas';

				$i = 0;
				$temp;

				$max = 0;
				$min = 1;

				//cek rasa
        // if ($rasa=='-') {
        //   $nk_rasa = '-';
        // }elseif (strtoupper($rasa)=='CUKUP ENAK') {
        //   $nk_rasa = mf_linear_turun($data['RASA'], $t_rasa, $rasa);
				//
        //   $temp[$i] = $nk_rasa;
        //   $i++;
        // }elseif (strtoupper($rasa)=='ENAK') {
        //   $nk_rasa = mf_linear_sgt($data['RASA'], $t_rasa, $rasa);
				//
        //   $temp[$i] = $nk_rasa;
        //   $i++;
        // }else {
        //   $nk_rasa = mf_linear_naik($data['RASA'], $t_rasa, $rasa);
				//
        //   $temp[$i] = $nk_rasa;
        //   $i++;
        // }


				//cek harga
				if($harga=='-'){
					$nk_harga	= '-';
				}else if(strtoupper($harga)=='MURAH'){
					$nk_harga	= mf_linear_turun($data['HARGA'], $t_harga, $harga);

					$temp[$i]	= $nk_harga;
					$i++;

				}else if(strtoupper($harga)=='MENENGAH'){
					$nk_harga	= mf_linear_sgt($data['HARGA'], $t_harga, $harga);

					$temp[$i]	= $nk_harga;
					$i++;

				}else{
					$nk_harga	= mf_linear_naik($data['HARGA'], $t_harga, $harga);

					$temp[$i]	= $nk_harga;
					$i++;

				}

				$djarak = 44;

				// echo "jarak : ".$jarak;
				// echo "<br>";

				// cek jarak_tempuh
        if ($jarak=='-') {
          $nk_jarak = '-';
        }else if($jarak=='dekat'){
          $nk_jarak = mf_linear_turun($djarak, $t_jarak, $jarak);

          $temp[$i] = $nk_jarak;
          $i++;
        }elseif ($jarak=='sedang') {
          $nk_jarak = mf_linear_sgt($djarak, $t_jarak, $jarak);

          $temp[$i] = $nk_jarak;
          $i++;
        }else{
          $nk_jarak = mf_linear_naik($djarak, $t_jarak, $jarak);
        }

				//cek kebersihan
				if($kebersihan=='-'){
					$nk_kebersihan	= '-';
				}else if(strtoupper($kebersihan)=='CUKUP BERSIH'){
					$nk_kebersihan	= mf_linear_turun($data['KEBERSIHAN'], $t_kebersihan, $kebersihan);

					$temp[$i]	= $nk_kebersihan;
					$i++;

				}else if(strtoupper($kebersihan)=='BERSIH'){
					$nk_kebersihan	= mf_linear_sgt($data['KEBERSIHAN'], $t_kebersihan, $kebersihan);

					$temp[$i]	= $nk_kebersihan;
					$i++;

				}else{
					$nk_kebersihan	= mf_linear_naik($data['KEBERSIHAN'], $t_kebersihan, $kebersihan);

					$temp[$i]	= $nk_kebersihan;
					$i++;

				}


        //cek luas
        if ($luas=='-') {
          $nk_luas = '-';
        }elseif (strtoupper($luas)=='SEMPIT') {
          $nk_luas = mf_linear_turun($data['LUAS'], $t_luas, $luas);

          $temp[$i] = $nk_luas;
          $i++;
        }elseif (strtoupper($luas)=='SEDANG') {
          $nk_luas = mf_linear_sgt($data['LUAS'], $t_luas, $luas);

          $temp[$i] = $nk_luas;
          $i++;
        }else {
          $nk_luas = mf_linear_naik($data['LUAS'], $t_luas, $luas);

          $temp[$i] = $nk_luas;
          $i++;
        }

				$jumlah_fasilitas = hit_fasilitas($data['KD_RMAKAN']);
				// echo "jumlah fasilitas wifi dan mushola :".$jumlah_fasilitas;
				// echo "<br>";
        //cek fasilitas
        if ($fasilitas=='-') {
          $nk_fasilitas ='-';
        }elseif (strtoupper($fasilitas)=='SEDIKIT') {
          $nk_fasilitas = mf_linear_turun($jumlah_fasilitas, $t_fasilitas, $fasilitas);
          $temp[$i] = $nk_fasilitas;
          $i++;
        }elseif (strtoupper($fasilitas)=='SEDANG') {
          $nk_fasilitas = mf_linear_sgt($jumlah_fasilitas, $t_fasilitas, $fasilitas);
          $temp[$i] = $nk_fasilitas;
          $i++;
        }else {
          $nk_fasilitas = mf_linear_naik($jumlah_fasilitas, $t_fasilitas, $fasilitas);
          $temp[$i] = $nk_fasilitas;
          $i++;
        }

        //operator and or
				if($operator=='AND'){
					for($a=0; $a<$i; $a++){
						if($min>=$temp[$a]){
							$min=$temp[$a];
						}
						// echo $temp[$a];
						// echo "<br>";
					}
					$kesimpulan = $min;
				}elseif($i==0){
					$kesimpulan = $min;
					}
					else {
						for($a=0; $a<$i; $a++){
							if($max<=$temp[$a]){
								$max=$temp[$a];
							}
						}
						$kesimpulan = $max;
				}


				$hasil[]	= array(	'id'					=> $data['KD_MAKANAN'],
        										'nama'	     	=> $data['NAMA'],
        										'rasa'	     	=> $data['RASA'],
        										'harga'	     	=> $data['HARGA'],
														'jarak'	     => $djarak,
        										'kebersihan' => $data['KEBERSIHAN'],
														'jenis'	     => $data['KD_JENIS'],
        										'luas'	     => $data['LUAS'],
        										'fasilitas'  => $jumlah_fasilitas,
        										// 'nk_rasa' 	 => round($nk_rasa,2),
        										'nk_harga'   => round($nk_harga,2),
        										'nk_kebersihan'	=> round($nk_kebersihan,2),
        										'nk_jarak'	=> round($nk_jarak,2),
        										'nk_luas' 	=> round($nk_luas,2),
        										'nk_fasilitas' 	=> round($nk_fasilitas,2),
        										'ks'	=> round($kesimpulan,2));

			}

			return $hasil;
		}

	}
	function fasilitas($biner){
		//$query = mysql_query("SELECT * FROM MD_RMAKAN");
		if ($biner==1) {
			$chek = "checked";
		}else{
			$chek = "";
		}

		return $chek;
	}
	function rp($angka)
	{
		if($angka==null){
			$jadi = "Rp. -";
		}else{
			 $jadi = "Rp " . number_format($angka,2,',','.');
		}

	return $jadi;
	}

	function k($angka)
	{
		if($angka==null){
			$jadi = "NULL";
		}else{
			 $jadi = $angka;
		}

	return $jadi;
	}

	function km($angka){
		if($angka==null){
			$jadi ="NULL";
		}else {
			$jadi =$angka." Km";
		}
		return $jadi;
	}
	function m2($angka){
		if($angka==null){
			$jadi ="NULL";
		}else {
			$jadi =$angka." m2";
		}
		return $jadi;
	}

 ?>
