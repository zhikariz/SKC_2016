<?php
include "lib/config.php";
include "modul/enkripsi/function.php";
//kolom apa saja yang akan ditampilkan
$columns = array(
	'isi_kontingen',
	'jumlah', // Ini yang bikin ngebug, harus nama tabel yang sesuai di DB ga boleh AS
	);

//lakukan query data dari 3 table dengan inner join
	$query = $datatable->get_custom("SELECT kontingen_all.*, COUNT(peserta.id_peserta) AS jumlah 
									FROM peserta INNER JOIN kontingen_all
									ON peserta.id_kontingen=kontingen_all.id_kontingen
									GROUP BY peserta.id_kontingen",$columns); // Kalo dikasih GROUP BY, Lag Search

	//buat inisialisasi array data
	$data = array();

	foreach ($query	as $value) {

		$q_perorangan     = $db->custom_query("SELECT COUNT(peserta.id_peserta) AS Jml, peserta.id_kontingen, kelas_all.* 
		                                        FROM peserta INNER JOIN kelas_all 
		                                        ON peserta.id_kelas=kelas_all.id_kelas 
		                                        WHERE peserta.id_kontingen='$value->id_kontingen' 
		                                        AND kelas_all.isi_kelas NOT LIKE '%Kata Beregu%'
		                                        GROUP BY peserta.id_kelas");

		$q_beregu         = $db->custom_query("SELECT COUNT(peserta.id_peserta) AS Jml, COUNT(peserta.id_peserta) AS Jml_Regu, peserta.id_kontingen, kelas_all.* 
		                                        FROM peserta INNER JOIN kelas_all 
		                                        ON peserta.id_kelas=kelas_all.id_kelas 
		                                        WHERE peserta.id_kontingen='$value->id_kontingen' 
		                                        AND kelas_all.isi_kelas LIKE '%Kata Beregu%'
		                                        GROUP BY peserta.id_kelas");
		//Reset Jumlah disetiap Perulangan
		$count_perorangan 	= 0;
		$count_beregu 		= 0;
		foreach ($q_perorangan as $perorangan) {
			$count_perorangan += $perorangan->Jml;
		}
		if($count_perorangan < 1) {
			$count_perorangan = 0;
		}
		foreach ($q_beregu as $beregu) {
			$count_beregu += $beregu->Jml_Regu;			
		}
		if($count_beregu < 1) {
			$count_beregu = 0;
		}
		
		$count_ang_regu = $count_beregu * 3;

		// Jumlah Semua
		$count_semua    = $count_ang_regu + $count_perorangan;

	//array sementara data
	$ResultData = array();
	//masukan data ke array sesuai kolom table
	$view = paramEncrypt("uri=kontingen/kontingen_search_link&id_kontingen=".$value->id_kontingen);
	$crud_uri 	= array(
						"view" => $view
						);

	$ResultData[] = "<a href='./?".$crud_uri[view]."' class='link'>".$value->isi_kontingen."</a>";
	$ResultData[] = $value->jumlah;
	$ResultData[] = $count_semua." Peserta (".$count_beregu." Beregu[Kata] , ".$count_perorangan." Perorangan [Kata & Kumite] )";

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 

	//memasukan array ke variable $data

	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
