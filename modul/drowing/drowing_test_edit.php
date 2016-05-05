<link rel="stylesheet" href="modul/drowing/switch/style.css" type="text/css"/>

<script type="text/javascript" src="assets/redips/header.js"></script>
<script type="text/javascript" src="assets/redips/redips-drag-min.js"></script>
<script type="text/javascript" src="modul/drowing/switch/script.js"></script>

   <!-- Page Content -->
<div class="container">
	<?php
	    include "lib/config.php";
	    include "modul/drowing/tb.php";
	    $id_drowing_get   = $uriget[id_drowing];
	    $data_extract     = $db->custom_query("SELECT * FROM drowing WHERE id_drowing='$id_drowing_get'");
	    foreach ($data_extract as $data => $val) {
	        $list_peserta = $val->list_peserta;
	        $id_kelas_get = $val->id_kelas;
	    }
	    // echo $list_peserta;

	    $arr_peserta = unserialize($list_peserta);
	    $decode_arr  = $arr_peserta;

	    // Buat Array dengan id=isi kontingen dan value id kontingen, untuk konversi saat POST
	    $kont_val_conv    = array();
	    $kelas_val_conv    = array();

	    $kont_val          = $db->fetch_all("kontingen_all");
	    $kelas_val          = $db->fetch_all("kelas_all");
	    $peserta_val        = $db->custom_query("SELECT id_peserta, nama FROM peserta");

	    foreach ($kont_val as $id) {
	      $kont_val_conv[$id->id_kontingen] = $id->isi_kontingen;     
	    }           

	    foreach ($kelas_val as $id) {
	      $kelas_val_conv[$id->id_kelas] = $id->isi_kelas;     
	    }               

	    // load semua data nama
	    foreach ($peserta_val as $id) {
	      $peserta_val_conv[$id->id_peserta] = $id->nama;     
	    }
	    // -- END KONVERSI    

		// Hitung jumlah peserta di kelas ini dalam variable jml_peserta
		$query_count		= $db->custom_query("SELECT COUNT(*) AS Jumlah FROM peserta WHERE id_kelas='$id_kelas_get'");
		foreach ($query_count as $counts){
			$jml_peserta	= $counts->Jumlah;
		}	    
	?>

			<div class="row">
				<h1 align="center">Edit Drowing <br><small><?php echo $kelas_val_conv[$id_kelas_get]; ?></small>
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
									<div class='redips-drag label label-default' value='".$value['id_peserta']."-".$value['id_kontingen']."'> 
									<strong>".$kont_val_conv[$value['id_kontingen']]."</strong> - ".$peserta_val_conv[$value['id_peserta']].
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
		<p class="text-center"><input id="simpan" class="btn btn-lg btn-danger" type="submit" name="submit" value="Simpan Pengeditan">	</p>
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
					'list_peserta'	=> serialize($arr_pool)
				);
		$id  = 'id_drowing';
		$val = $id_drowing_get;
		$table = 'drowing';
		$masukan = $db->update($table,$dat,$id,$val);
		echo "<meta http-equiv='refresh' content='0;url=./?".paramEncrypt("uri=drowing/drowing_table&id_drowing=".$id_drowing_get)."' />";

	} // CLose if($submit);

?>