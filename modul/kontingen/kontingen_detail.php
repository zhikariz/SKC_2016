<?php 
// $cari berada di anchor sebelum link

// Buat Array dengan id=isi kelas/kontingen dan value id kelas/kontingen, untuk konversi saat POST
	$kelas_id_conv    = array();
	$kont_id_conv    = array();

	$kelas_id         = $db->fetch_all("kelas_all");
	$kont_id          = $db->fetch_all("kontingen_all");
	foreach($kelas_id as $val){
	  $kelas_id_conv[$val->isi_kelas] = $val->id_kelas;
	}
	foreach ($kont_id as $val) {
	  $kont_id_conv[$val->isi_kontingen] = $val->id_kontingen;
	  $kont_val_conv[$val->id_kontingen]  = $val->isi_kontingen;
	}

	$query 		= $db->custom_query("SELECT peserta.*,kelas_all.isi_kelas, kontingen_all.*, perguruan_all.isi_perguruan
											FROM peserta INNER JOIN kontingen_all 
											ON peserta.id_kontingen=kontingen_all.id_kontingen 
											INNER JOIN kelas_all
											ON kelas_all.id_kelas=peserta.id_kelas
											INNER JOIN perguruan_all
											ON peserta.perguruan=perguruan_all.id_perguruan
											WHERE peserta.id_kontingen='$cari'
											ORDER BY peserta.nama ASC
											");

	$query0 	= $db->custom_query("SELECT * FROM kontingen_all										
											WHERE id_kontingen='$cari'
											");

	$query1 		= $db->custom_query("SELECT COUNT(peserta.id_peserta) AS Beregu
											FROM peserta INNER JOIN kelas_all
											ON peserta.id_kelas=kelas_all.id_kelas
											INNER JOIN kontingen_all 
											ON peserta.id_kontingen=kontingen_all.id_kontingen 
											WHERE peserta.id_kontingen='$cari' and kelas_all.isi_kelas LIKE '%Kata Beregu%' ");

	$query2		= $db->custom_query("SELECT COUNT(peserta.id_peserta) AS Perorangan
											FROM peserta INNER JOIN kelas_all
											ON peserta.id_kelas=kelas_all.id_kelas
											INNER JOIN kontingen_all 
											ON peserta.id_kontingen=kontingen_all.id_kontingen 
											WHERE peserta.id_kontingen='$cari' and kelas_all.isi_kelas LIKE '%Kata Perorangan%' ");

	$query3		= $db->custom_query("SELECT COUNT(peserta.id_peserta) AS Kumite
											FROM peserta INNER JOIN kelas_all
											ON peserta.id_kelas=kelas_all.id_kelas
											INNER JOIN kontingen_all 
											ON peserta.id_kontingen=kontingen_all.id_kontingen 
											WHERE peserta.id_kontingen='$cari' and kelas_all.isi_kelas LIKE '%Kumite%' ");
	$query4		= $db->custom_query("SELECT COUNT(peserta.id_peserta) AS Total
											FROM peserta INNER JOIN kelas_all
											ON peserta.id_kelas=kelas_all.id_kelas
											INNER JOIN kontingen_all 
											ON peserta.id_kontingen=kontingen_all.id_kontingen 
											WHERE peserta.id_kontingen='$cari' ");
	foreach ($query0	as $value) {
		$nama_of 	= $value->nama_official;
		$kontak_of 	= $value->kontak_official;
	}	
	//buat inisialisasi array data
	// $data = array();

	//Hitung Jumlah Putra Dan Putri di Kontingen
	$perorangan 		= $db->custom_query("SELECT DISTINCT peserta.nama FROM peserta 
											INNER JOIN kelas_all ON peserta.id_kelas=kelas_all.id_kelas 
											WHERE kelas_all.isi_kelas NOT LIKE '%Kata Beregu%'
											AND peserta.id_kontingen='$cari'
											ORDER BY peserta.nama ASC
											");

	$perorangan_cwo		= $db->custom_query("SELECT DISTINCT peserta.nama
											FROM peserta INNER JOIN kelas_all ON peserta.id_kelas=kelas_all.id_kelas 
											WHERE peserta.jk='Putra' AND kelas_all.isi_kelas NOT LIKE '%Kata Beregu%'
											AND peserta.id_kontingen='$cari'
											");

	$beregu 			= $db->custom_query("SELECT peserta.info_beregu, kelas_all.isi_kelas FROM peserta 
											INNER JOIN kelas_all ON peserta.id_kelas=kelas_all.id_kelas 
											WHERE kelas_all.isi_kelas LIKE '%Kata Beregu%'
											AND peserta.id_kontingen='$cari'
											");

	$jml_beregu_cwo 	= $db->custom_query("SELECT COUNT(*) AS jumlah FROM peserta 
											INNER JOIN kelas_all ON peserta.id_kelas=kelas_all.id_kelas 
											WHERE kelas_all.isi_kelas LIKE '%Kata Beregu%' 
											AND peserta.id_kontingen='$cari'
											AND peserta.jk='Putra'");
	foreach ($jml_beregu_cwo as $jcwo) {
		$jml_beregu_cwo = $jcwo->jumlah;
	}	 		

	//Jumlah Perorangan Tanpa double
	$jml_perorangan 	= array();
	$jml_perorangan_cwo = array();

	//Jumlah Perorangan All
	foreach ($perorangan as $key)
	{
		array_push($jml_perorangan, $key->nama);
	}	
	$jml_perorangan 	= count($jml_perorangan);	

	//Jumlah Perorangan Cowo
	foreach ($perorangan_cwo as $key)
	{
		array_push($jml_perorangan_cwo, $key->nama);
	}	
	$jml_perorangan_cwo = count($jml_perorangan_cwo);

	// Cari Nama yang sama di beregu
	$nama_sama_diberegu 		= array();
	$nama_sama_diberegu_cwo		= array();
	$jml_beregu					= 0; 		// Jumlah Beregu All J.Kelamin
	foreach ($beregu as $beregukey) 
	{
		$jml_beregu 	+= 1;
		$nama 			= unserialize($beregukey->info_beregu);
		foreach ($nama as $namakey => $namavalue) 
		{
			$nama_at 		= $namavalue[nama];			
			$nama_at 		= addslashes($nama_at);	// Hindari error SQL
			$cari_nama 		= $db->custom_query("SELECT DISTINCT peserta.nama FROM peserta 
												INNER JOIN kelas_all ON peserta.id_kelas=kelas_all.id_kelas 
												WHERE kelas_all.isi_kelas NOT LIKE '%Kata Beregu%' 
												AND peserta.id_kontingen='$cari'
												AND peserta.nama ='$nama_at'");
			$cari_nama_cwo 	= $db->custom_query("SELECT DISTINCT peserta.nama FROM peserta 
												INNER JOIN kelas_all ON peserta.id_kelas=kelas_all.id_kelas 
												WHERE kelas_all.isi_kelas NOT LIKE '%Kata Beregu%'
												AND peserta.id_kontingen='$cari' 
												AND peserta.nama ='$nama_at' 
												AND peserta.jk='Putra'");

			//Masukkan Ke array -> Beregu All J.Kelamin
			foreach ($cari_nama as $carikey) 				
			{
				// echo $carikey->nama."<br>";	
				array_push($nama_sama_diberegu, $carikey->nama);
			}

			//Masukkan Ke array -> Beregu All J.Kelamin
			foreach ($cari_nama_cwo as $carikey) 				
			{
				// echo $carikey->nama."<br>";					
				array_push($nama_sama_diberegu_cwo, $carikey->nama);
			}					
		}
		
	}

	$jml_beregu 		*= 3; // Tiap Regu ada 3 orang, maka dikali 3
	$jml_beregu 		-= count($nama_sama_diberegu);

	$jml_beregu_cwo 	*= 3; // Regu yang J.Kelamain = cowo
	$jml_beregu_cwo 	-= count($nama_sama_diberegu_cwo);

	// Jumlah Peserta
	$jml_peserta 		= $jml_perorangan 		+ $jml_beregu;
	$jml_peserta_cwo 	= $jml_perorangan_cwo 	+ $jml_beregu_cwo;
	$jml_peserta_cwe 	= $jml_peserta 			- $jml_peserta_cwo;

	// END //Hitung Jumlah Putra Dan Putri di Kontingen

			// Detail Data All
			foreach ($query1 as $value) 
			{					
				$det_jml_regu 		= $value->Beregu;
				$det_jml_ang_regu  	= $det_jml_regu * 3;	
			}
			foreach ($query2 as $value) 
			{			
				$det_jml_kata1 = $value->Perorangan;
			}
			foreach ($query3 as $value) 
			{
				$det_jml_kumite = $value->Kumite;						
			}
	?>

	   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1 class="text-primary"><span class="glyphicon glyphicon-globe pull-right"></span><?php echo "Kontingen ".$kont_val_conv[$cari]; ?></h1>     
        <h4 class="page-header text-right">Official : <?php echo $nama_of; ?> - <strong><?php echo $kontak_of; ?></strong></h4> 
        <div class="col-md-12">
        <p class="text-left">
        	<strong>Detail Kontingen <?php echo $kont_val_conv[$cari]; ?> :</strong> <br>
        	Jumlah Kata Beregu : <?php echo $det_jml_ang_regu." Peserta (".$det_jml_regu." Regu)"; ?><br>
        	Jumlah Kata Perorangan : <?php echo $det_jml_kata1; ?> Peserta<br>
        	Jumlah Kumite : <?php echo $det_jml_kumite; ?> Peserta<br><br>
        	Jumlah Putra : <?php echo $jml_peserta_cwo; ?><br>
        	Jumlah Putri : <?php echo $jml_peserta_cwe; ?><br>
        	Jumlah Peserta* : <?php echo $jml_peserta; ?><br>
        	*<small>tanpa double nama</small>
        </p>     

			<!-- Table Peserta All -->
			<h3>Semua Peserta dari <?php echo "Kontingen ".$kont_val_conv[$cari]; ?></h3>			
            <table id="overall" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Tgl Lahir</th>
                        <th>Berat</th>
                        <th>Perguruan</th>
                        <th>JK</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
               <tbody> 
					<?php						
						foreach ($query	as $value) {
							$edit = paramEncrypt("uri=peserta/peserta_edit&id_peserta=".$value->id_peserta);
							$del = paramEncrypt("uri=peserta/peserta_delete&id_peserta=".$value->id_peserta);
							$detail = paramEncrypt("uri=peserta/peserta_detail&id_peserta=".$value->id_peserta);
							$crud_uri = array(	"edit" 		=> $edit,
												"delete"	=> $del,
												"detail"	=> $detail
												);
							
							//Tampilkan Nama Lengkap Bila Beregu
							$info_beregu = unserialize($value->info_beregu);
							$pecah_kelas = explode(" ", $value->isi_kelas);

							echo "
								<tr>
									<td>".$value->id_peserta."</td>

									<td>";
										//Potong untuk logika (Jika Beregu maka Tampilkan Semua Nama)
										if(in_array("Beregu", $pecah_kelas) and in_array("Kata", $pecah_kelas))
										{
											foreach ($info_beregu as $key => $regu) {
												echo $regu[nama]."<br>";
											}
											echo "</td><td>";
											foreach ($info_beregu as $key => $regu) {
												echo $regu[tgl_lahir]."<br>";
											}											
										}								
										else
										{
											echo $value->nama;
											echo "</td><td>";
											echo $value->tgl_lahir;
										}									
							echo "
									</td>
									<td>".$value->berat_badan."</td>
									<td>".$value->isi_perguruan."</td>
									<td>".$value->jk."</td>
									<td>".$value->isi_kelas."
										<span class='pull-right hide-print'>
										<a title='Ubah Data' href='./?".$crud_uri[edit]."' class='link pr-user'><span class='glyphicon glyphicon-pencil btn btn-xs btn-default'></span></a>
										<a title='Hapus Data' onclick=confirmHapus('./?".$crud_uri[delete]."') href='#' class='link pr-admin'><span class='glyphicon glyphicon-trash btn btn-xs btn-danger'></span></a>
										<a title='Detail Data' href='./?".$crud_uri[detail]."' class='link'><span class='glyphicon glyphicon-list-alt btn btn-xs btn-success'></span></a>
										</span>
									</td>
								</tr>
							";
						  } // CLOSE foreach ($query	as $value)

						?>
               </tbody>
            </table></br>
			
        </div> <!-- col-md-12 -->
    </div> <!-- row row-centered -->
</div> <!-- container -->