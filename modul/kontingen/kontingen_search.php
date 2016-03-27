<?php

include_once "lib/config.php";
// include "modul/enkripsi/function.php";

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

	$query 		= $db->custom_query("SELECT peserta.*,kelas_all.isi_kelas, kontingen_all.isi_kontingen
											FROM peserta INNER JOIN kontingen_all 
											ON peserta.id_kontingen=kontingen_all.id_kontingen 
											INNER JOIN kelas_all
											ON kelas_all.id_kelas=peserta.id_kelas
											WHERE peserta.id_kontingen='$cari'
											ORDER BY peserta.nama ASC
											");

	$query1 		= $db->custom_query("SELECT COUNT(peserta.id_peserta) AS Beregu
											FROM peserta INNER JOIN kelas_all
											ON peserta.id_kelas=kelas_all.id_kelas
											INNER JOIN kontingen_all 
											ON peserta.id_kontingen=kontingen_all.id_kontingen 
											WHERE peserta.id_kontingen='$cari' and kelas_all.isi_kelas LIKE '%Beregu%' ");

	$query2		= $db->custom_query("SELECT COUNT(peserta.id_peserta) AS Perorangan
											FROM peserta INNER JOIN kelas_all
											ON peserta.id_kelas=kelas_all.id_kelas
											INNER JOIN kontingen_all 
											ON peserta.id_kontingen=kontingen_all.id_kontingen 
											WHERE peserta.id_kontingen='$cari' and kelas_all.isi_kelas LIKE '%Perorangan%' ");

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
	//buat inisialisasi array data
	$data = array();
	?>

	   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1><span class="label label-danger"><?php echo "Kontingen ".$cari=$_POST['cari'] ; ?></span></a> </br></h1><br>        
        <div class="col-md-12">
            <table id="overall" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
							//array sementara data
							echo "
								<tr>
									<td>".$value->id_peserta."</td>
									<td>".$value->nama."</td>
									<td>".$value->tgl_lahir."</td>
									<td>".$value->berat_badan."</td>
									<td>".$value->perguruan."</td>
									<td>".$value->isi_kelas."</td>
								</tr>
							";
						  } // CLOSE foreach ($query	as $value)

						?>
               </tbody>
            </table></br>

			<h3>Keterangan Jumlah Peserta</h3>
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
							$jml_ang_regu  	= $value->Beregu;
							$jml_regu 		= $jml_ang_regu / 3;
							echo "<tr>
									<td>".$value->Beregu." Peserta (".$jml_regu." Regu)</td>
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
							//array sementara data
							echo "
									<td>".$value->Total."</td>
								 </tr> "; 
								}
						?>

            </table>
        </div> <!-- col-md-12 -->
    </div> <!-- row row-centered -->
</div> <!-- container -->