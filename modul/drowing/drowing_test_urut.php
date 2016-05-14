<link rel="stylesheet" href="modul/drowing/switch/style.css" type="text/css"/>

<script type="text/javascript" src="assets/redips/header.js"></script>
<script type="text/javascript" src="assets/redips/redips-drag-min.js"></script>
<script type="text/javascript" src="modul/drowing/switch/script.js"></script>

<!-- Page Content // Drowing Urut -->
<div class="container">

		<?php
			// $id_kelas_get 	= $uriget[id_kelas];			
			$id_kelas_get 	= $uriget[id_kelas];
			$data_peserta 	= []; // Semua data satu orang peserta
			$id_dan_data 	= []; // Data** peserta disimpan di dalam array baru

			// Konversi id_kelas > isi dansebaliknya

			include "lib/config.php";
			$kelas_id_conv    = array();
			$kelas_val_conv    = array();

			$kelas_id         = $db->fetch_all("kelas_all");

			foreach($kelas_id as $val){
				// Buat Array dengan id=isi kelas dan value id kelas, untuk konversi saat POST
				$kelas_id_conv[$val->isi] = $val->id_kelas;

				// Buat Array dengan id=idkelas kelas dan value isi, untuk konversi saat POST
				$kelas_val_conv[$val->id_kelas] = $val->isi_kelas;
			}


			// Buat Array dengan id=isi kontingen dan value id kontingen, untuk konversi saat POST
			$kont_id_conv    = array();

			$kont_id          = $db->fetch_all("kontingen_all");

			foreach ($kont_id as $val) {
			  $kont_id_conv[$val->isi_kontingen] = $val->id_kontingen;     
			}			
			// -- END KONVERSI

			// Hitung jumlah peserta di kelas ini dalam variable jml_peserta
			$query_count		= $db->custom_query("SELECT COUNT(*) AS Jumlah FROM peserta WHERE id_kelas='$id_kelas_get'");
			foreach ($query_count as $counts){
				$jml_peserta	= $counts->Jumlah;
			}

			// Membuat ID dan // Membuat Nama dan Kontingen Tiap ID
			$query_peserta 	= $db->custom_query("SELECT peserta.*, kontingen_all.isi_kontingen 
												 FROM peserta INNER JOIN kontingen_all
												 ON peserta.id_kontingen=kontingen_all.id_kontingen
												 WHERE peserta.id_kelas='$id_kelas_get'
												 ORDER BY kontingen_all.isi_kontingen ASC
												 ");

			// Memasukkan data-data peserta ke array
			$d=0;
			foreach ($query_peserta as $col) {
				$data_peserta['id_peserta'] 	= $col->id_peserta;
				$data_peserta['nama'] 			= $col->nama;
				$data_peserta['kontingen'] 		= $col->isi_kontingen;
				$id_dan_data[$d] 				= $data_peserta;
				$d += 1;
			}
			
			// Acak isi array
			//shuffle($id_dan_data);

			$max_perpool	= 16;
			$bagi			= $jml_peserta / $max_perpool;
			$modulus 		= $jml_peserta % $max_perpool;
			$jml_pool 		= 0;

			// Stored Array = array(pool_name => array(id_peserta,nama, kontingen));
			//Array yang akan masuk ke database
			$arr_inp	= []; 

			// Lib Nama Pool 
			$pool_name1 = [0,'A-'];
			$pool_name2 = [0,'A','B'];
			$pool_name4 = [0,'B2','A2','B1','A1'];
			$pool_name8  = [0,'B4','A4','B3','A3','B2','A2','B1','A1'];

			// Jika hanya 1 pool
			if($bagi < 1){
				$pool_name 			= $pool_name1; // Langsung inisialisasi 1 pool tanpa nama
				$jml_pool			= 1;
				$tiap_pool 			= $jml_peserta;
				$opo 				= $jml_pool * $tiap_pool;
				$pool_no 			= 1;	

				$pre_data_peserta	= [];	
				$pre_data_peserta 	= $id_dan_data;

				$pre_pool_no 							= [];
				$pre_pool_no[$pool_name[$pool_no]] 		= $pre_data_peserta;

				$arr_inp = serialize($pre_pool_no);

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

				$pool_name 	= ${pool_name.$jml_pool};

				$tiap_pool	= ceil($jml_peserta / $jml_pool)-1; // Bulatkan kebawah - Banyak Peserta tiap pool
				$opo 		= $jml_pool * $tiap_pool;         // Total Maksimal Peserta yang ditampung di semua pool				

				// Urutan awal untuk memasukkan tiap id_dan_data
				$urutan_data = 0;

				//Data yang akan terkumpul jadi satuan arrayy arr_inp
				$pre_pool_no = [];

				// Perulangan tiap pool
				for($i=0; $i<$jml_pool; $i++)
				{
					// menghasilkan $pool_no1 = 1+1 dst.
					${pool_no.$i} 			= $i+1;

					${pre_data_peserta.$i}	= [];	

					$modulus_a 				= $jml_peserta % ($jml_pool * $tiap_pool);

					// Fungsi Bagi Rata Sisa modulusnya ke tiap pool
					if ($i+1 <= $modulus_a){
						$tiap_pool += 1;
					}	

					// Masukkan data ke array ini, ketika sudah max dari hasil bagi dua maka masukkan ke variable selanjutnya				
					for($ij=1; $ij<=$tiap_pool; $ij++)
					{
						${pre_data_peserta.$i}[$ij]	= $id_dan_data[$urutan_data];
						$urutan_data += 1;
					}
					
					$pre_pool_no[$pool_name[${pool_no.$i}]] = ${pre_data_peserta.$i};

					// Fungsi Bagi Rata Sisa modulusnya ke tiap pool
					if ($i+1 <= $modulus_a){
						$tiap_pool -= 1;
					}					
				} // Close for

				// Keluaran array dijadikan serial untuk dapat masuk ke DB
				$arr_inp = serialize($pre_pool_no);
			} // Close Else


			//Keluarkan Datanya
			// echo $arr_inp;
			$decode_arr = unserialize($arr_inp);
			?>

			<div class="row">
				<h1 align="center">Kelola Drowing <br><small><?php echo $kelas_val_conv[$id_kelas_get]; ?></small>
				</h1>
				<h4 class="page-header text-center">
					Jumlah Peserta : <?php echo $jml_peserta; ?> 
					(<?php echo $jml_pool; ?> Pool)
				</h4>

			</div> <!-- CLOSE -->			

			<?php
			// echo "Jml Peserta => Jml Pool => Peserta/pool => Max All Pool <br>";
			// echo $jml_peserta." => ".$jml_pool." => ".$tiap_pool." => ".$opo." <br><br>";		
			?>

			<div id="redips-drag">			
			<?php
				// Pengeluaran Array Unserialize
				foreach ($decode_arr as $pool => $data_peserta) {				
					echo "  <table id='table1'>
							<thead class='disabled'><th>Pool : ".$pool."</th></thead><tbody>";						
			?>
			<?php 
					include "tb.php"; // Library Table Color					
					$no_urut = 0;
					
					// Cek jml Peserta di pool ini dan library tabel color yang digunakan				
					$jml_pool_ini 	= count($data_peserta);

					//Gunakan Tabel di Library
					$tb_use 	= ${tb.$jml_pool_ini};					
					$tbnom_use 	= ${tbnom.$jml_pool_ini};

					$val_urutan = key($tb_use);

					//Keluarkan tiap Data Peserta
					foreach ($data_peserta as $key => $value) 
					{											
						$urutan_tbnom = $tbnom_use[$no_urut];
						if(empty($value['id_peserta'])){							
							$no_urut += 1;							
						}
						else
						{
							$no_urut += 1;
							echo
								"<tr class='".$pool."_".$no_urut."'><td>
									<span>".key($tb_use)."</span> - <span class='label ".$tb_use[key($tb_use)]."'>".$urutan_tbnom."</span>
									<div class='redips-drag label label-default' value='".$value['id_peserta']."-".$kont_id_conv[$value['kontingen']]."'> 
									<strong>".$value['kontingen']."</strong> - ".$value['nama'].
									"</div>
								</td></tr>";

							// Urutan Setelahnya
							each($tb_use);
						}										
					} // Close foreach 2
					echo "</tbody></table>"; // Tutup tbody;
				} // Close foreach 1				
			?>
			</table> <!-- Close table1 -->
			</div> <!-- // CLOSE id="redips-drag" -->

</div> <!-- CLOSE <div class="container"> -->

<br>
<!-- <button class="btn btn-primary">Selesai Menyusun Manual</button> -->
<br><br>

<form method="post" action='' enctype="multipart/form-data">
	<?php 
		foreach ($decode_arr as $pool => $data_peserta) {
			$no = 0;						
			foreach ($data_peserta as $key => $value) {
				$no += 1;
	?>
		<div class="disp-input">			
		No. <?php echo $pool."_".$no; ?>: 
			<input type="text" name="<?php echo $pool."_".$no; ?>" id="var_<?php echo $pool."_".$no; ?>" />
		</div>
    <?php 	
			} // close foreach 2
		}// close foreach 1 
	?>
	<div class="row">
		<p class="text-center"><input id="simpan" class="btn btn-lg btn-primary" type="submit" name="submit" value="Simpan Perubahan">	</p>
	</div>
</form>

<script type="text/javascript">
		var val;
		$(document).ready(function(){
		    $("#simpan").click(function(){
		    	alert('Perubahan Tersimpan.');

				<?php 
					
					foreach ($decode_arr as $pool => $data_peserta) {
						$no = 0;

						foreach ($data_peserta as $key => $value) {
							$no += 1;
				?>			    	
					        val = $("tr.<?php echo $pool."_".$no; ?>>td>div").attr("value");					      

					        $("#var_<?php echo $pool."_".$no; ?>").attr({
					          "value" : val			   
		        			})
		        			;
			    <?php 	
						} // close foreach 2
					}// close foreach 1 
				?>
		    });
		});
	</script>	

<?php 
	// //Simpan Proses
	if($_POST[submit]){		
		$arr_pool = array();
		$arr_identitas = array();
		$arr_identitas_tampung = array();

		// Cek keadaan Array
		$list_id_kelas = array();
		$cek_id_ada = $db->fetch_col('drowing',array('id_kelas'))	;
		foreach ($cek_id_ada as $cek_kelas => $value) {
						array_push($list_id_kelas, $value->id_kelas);
					}
		if(in_array($id_kelas_get,$list_id_kelas))
		{
			echo "<script>alert('Drowing Peserta Untuk Kelas ini sudah ada, Silahkan Cek di Daftar Drowing')</script>";
		} // Close if(in_array($id_kelas_get))

		else
		{
			// Reverse urutan array (Karena jumlah terkecil berada dibelakang, untuk menghindari BUG, Trash Value saat Jumlah terbesar di awal)
			$decode_arr = array_reverse($decode_arr);

			foreach ($decode_arr as $pool => $data_peserta) {
				$no = 0;						
				foreach ($data_peserta as $key => $value) {
					$no += 1;

					// $pecah = id_peserta - nama_peserta - id_kontingen
					$iden 						= $_POST[$pool.'_'.$no];
					$pecah		 				= explode('-', $iden);
					$arr_identitas['id_peserta'] 		= $pecah[0];
					$arr_identitas['id_kontingen'] 		= $pecah[1];

					$arr_identitas_tampung[$no]			= $arr_identitas;

				} // foreach 2
				
				$arr_pool[$pool] 						= $arr_identitas_tampung;					

			} // foreach 1

			//Reverse lagi urutannya
			$arr_pool 	= array_reverse($arr_pool);

			$dat = array(
						'id_kelas'		=> $id_kelas_get,
						'list_peserta'	=> serialize($arr_pool)
					);
			$table = 'drowing';
			$masukan = $db->insert($table,$dat);
			echo "<meta http-equiv='refresh' content='0;url=./?".paramEncrypt("uri=drowing/drowing_hasil")."' />";

		} // if(in_array($id_kelas_get))
	} // CLose if($submit);

?>