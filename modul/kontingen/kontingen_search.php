<?php

include_once "lib/config.php";

	$cari_get=$_POST['cari'];

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
	}

	// Konversi
	$cari = $kont_id_conv[$cari_get];

	$query 		= $db->custom_query("SELECT peserta.*,kelas_all.isi_kelas, kontingen_all.*
											FROM peserta INNER JOIN kontingen_all 
											ON peserta.id_kontingen=kontingen_all.id_kontingen 
											INNER JOIN kelas_all
											ON kelas_all.id_kelas=peserta.id_kelas
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
	foreach ($query0 as $values) {
		$nama_of 	= $values->nama_official;
		$kontak_of 	= $values->kontak_official;
	}		
	//buat inisialisasi array data
	$data = array();
	?>

	   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1><span class="label label-danger"><?php echo "Kontingen ".$cari=$_POST['cari'] ; ?></span></h1>     
        <h4 class="page-header text-right">Official : <?php echo $nama_of; ?> - <strong><?php echo $kontak_of; ?></strong></h4>           
        <div class="col-md-12">
			
			<!-- Table Detail Jumlah -->
			<table id="overall" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
			        <tr>
			            <th>Jumlah Kata Beregu</th>
			            <th>Jumlah Kata Perorangan</th>
			            <th>Jumlah Kumite</th>
			            <th>Total Jumlah Peserta</th>
			        </tr>
			    </thead>

					<?php
						foreach ($query1 as $value) {
							//array sementara data
							$jml_regu 		= $value->Beregu;
							$jml_ang_regu  	= $jml_regu * 3;							
							echo "<tr>
									<td>".$jml_regu." Regu (".$jml_ang_regu." Peserta)</td>
								   "; 
								}
						foreach ($query2 as $value) {
							//array sementara data
							echo "
									<td>".$value->Perorangan."</td>
								   "; 
								}
						foreach ($query3 as $value) {
							//array sementara data
							echo "
									<td>".$value->Kumite."</td>
								 "; 
								}
						foreach ($query4 as $value) {
							// Total Peserta Di Kontingen Ini
							$total_pes = ($value->Total - $jml_regu) + $jml_ang_regu;
							echo "
									<td>".$total_pes."</td>
								 </tr> "; 
								}
						?>
			</table>

			<!-- Table Peserta All -->
			<h3>Semua Peserta dari <?php echo "Kontingen ".$cari=$_POST['cari'] ; ?></h3>			
            <table id="overall" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Tgl Lahir</th>
                        <th>Berat</th>
                        <th>Perguruan</th>
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
							//array sementara data
							echo "
								<tr>
									<td>".$value->id_peserta."</td>
									<td>".$value->nama."</td>
									<td>".$value->tgl_lahir."</td>
									<td>".$value->berat_badan."</td>
									<td>".$value->perguruan."</td>
									<td>".$value->isi_kelas."
										<span class='pull-right hide-print'>
										<a title='Ubah Data' href='./?".$crud_uri[edit]."' class='link pr-admin'><span class='glyphicon glyphicon-pencil btn btn-xs btn-default'></span></a>
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