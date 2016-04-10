<?php
			// $dat_pes 		= array({"a",}*33);
			$dat_pes 		= array("a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a");

			$jml_peserta 	= count($dat_pes);
			$max_perpool	= 16;
			$bagi			= $jml_peserta / $max_perpool;
			$modulus 		= $jml_peserta % $max_perpool;
			$jml_pool 		= 0;

			// Stored Array = array(pool_name => array(id_peserta,nama, kontingen));
			//Array yang akan masuk ke database
			$arr_inp	= []; 
			$pool_name  = [0,'A','B','C','D','E','F','G','H','I','J'];

			echo "Jumlah Peserta: $jml_peserta<br>";
			// Jika hanya 1 pool
			if($bagi < 1)
			{
				$jml_pool			= 1;
				$tiap_pool 			= $jml_peserta;
				$opo 				= $jml_pool * $tiap_pool;
				$pool_no 			= 1;	
				
				echo "Jumlah Peserta : $jml_peserta <br>";
				echo "Jumlah di Pool $pool_name[$pool_no] : $jml_peserta <br>";

			} // Close if

			// Jika Lebih dari satu pool
			else {		
				$jml_pool 	= ceil($bagi);					  // Bulatkan kebawah - Jumlah Pool 
				if($jml_pool == 3)
				{
					$jml_pool = 4;
				}
				else if(($jml_pool > 4) and ($jml_pool < 8))
				{
					$jml_pool = 8;
				}

				$tiap_pool	= ceil($jml_peserta / $jml_pool)-1; // Bulatkan kebawah - Banyak Peserta tiap pool
				$opo 		= $jml_pool * $tiap_pool;         // Total Maksimal Peserta yang ditampung di semua pool				

				// Urutan awal untuk memasukkan tiap id_dan_data
				$urutan_data = 0;

				//Data yang akan terkumpul jadi satuan arrayy arr_inp
				$pre_pool_no = [];

				// Perulangan tiap pool
				for($i=0; $i<$jml_pool; $i++)
				{
					${pool_no.$i} 			= $i+1;
					${pre_data_peserta.$i}	= [];

					// Fungsi Bagi Rata Sisanya ke tiap pool
					if ($i+1 <= $modulus){
						$tiap_pool += 1;
					}				
					for($ij=1; $ij<=$tiap_pool; $ij++)						
					{
						${pre_data_peserta.$i}[$ij]	= $dat_pes[$urutan_data];
						$urutan_data += 1;
					}	

					$di_pool_ini = count(${pre_data_peserta.$i});
					foreach (${pre_data_peserta.$i} as $key => $value) 
					{
								if(empty($value))
								{
									$di_pool_ini -= 1;
								}
					}

					// Perulangan tiap pool
					if ($i+1 <= $modulus){
						$tiap_pool -= 1;
					}					

					$ec_pool 	 = $pool_name[${pool_no.$i}];
					echo "Peserta Pool $ec_pool : $di_pool_ini <br>";
				} // Close for
			}

		    $beregu     = array();
		    for($i=1; $i<=3; $i++)
		    {
		      $beregu[$i]['nama'] = "a";
		      $beregu[$i]['tgl_lahir'] = "a";
		    }	
			print_r($beregu_arr);

			echo "<br>".serialize($beregu);
			
?>