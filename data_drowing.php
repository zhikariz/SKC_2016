<?php
include "lib/config.php";
include "modul/enkripsi/function.php";
//kolom apa saja yang akan ditampilkan
$columns = array(
	'isi_kelas',
	'Jumlah', // Ini yang bikin ngebug, harus nama tabel yang sesuai di DB ga boleh AS

	);

//lakukan query data dari 3 table dengan inner join
	$query = $datatable->get_custom("SELECT kelas_all.*, COUNT(peserta.nama) AS Jumlah 
									FROM kelas_all INNER JOIN peserta 
									ON kelas_all.id_kelas=peserta.id_kelas 									 
									GROUP BY isi_kelas",$columns); // Kalo dikasih GROUP BY, Lag
									// WHERE kelas_all.isi LIKE 'Kumite%'

	
	// Cek keadaan Array di drowing
	$list_id_kelas = array();
	$cek_id_ada = $db->fetch_col('drowing',array('id_kelas'));
	foreach ($cek_id_ada as $cek_kelas => $valued) {
		array_push($list_id_kelas, $valued->id_kelas);
	}

	//buat inisialisasi array data
	$data = array();

	foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();
	//masukan data ke array sesuai kolom table
	$ResultData[] = $value->isi_kelas;
	$ResultData[] = $value->Jumlah;

	// Link view
	$view = paramEncrypt("uri=drowing/drowing_test&id_kelas=".$value->id_kelas);
	$crud_uri = array(
						"view" 		=> $view						
					);

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
		if(in_array($value->id_kelas,$list_id_kelas))
		{
			$labelnya = "<a title='Sudah Dikelola' class='btn btn-xs btn-warning'> <span class='glyphicon glyphicon-ok'></span> Sudah dikelola</a>";
		} // Close if(in_array($id_kelas_get))	
		else
		{
			$labelnya = "<a title='Lihat Drowing' href='./?".$crud_uri[view]."' class='btn btn-xs btn-success'><span class='glyphicon glyphicon-pencil'></span> Kelola Drowing</a>";
		}

	$ResultData[] = "
		<span class='hide-print'>
		".$labelnya."				
		</span>
	";
	//memasukan array ke variable $data

	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
