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

	foreach ($query	as $value) 
	{
		//Query Perorangan dan Beregu
		$perorangan 		= $db->custom_query("SELECT DISTINCT peserta.nama FROM peserta 
												INNER JOIN kelas_all ON peserta.id_kelas=kelas_all.id_kelas 
												WHERE kelas_all.isi_kelas NOT LIKE '%Kata Beregu%'
												AND peserta.id_kontingen='$value->id_kontingen'
												");

		$perorangan_cwo		= $db->custom_query("SELECT DISTINCT peserta.nama 
												FROM peserta INNER JOIN kelas_all ON peserta.id_kelas=kelas_all.id_kelas 
												WHERE peserta.jk='Putra' AND kelas_all.isi_kelas NOT LIKE '%Kata Beregu%'
												AND peserta.id_kontingen='$value->id_kontingen'
												");

		$beregu 			= $db->custom_query("SELECT peserta.info_beregu, kelas_all.isi_kelas FROM peserta 
												INNER JOIN kelas_all ON peserta.id_kelas=kelas_all.id_kelas 
												WHERE kelas_all.isi_kelas LIKE '%Kata Beregu%'
												AND peserta.id_kontingen='$value->id_kontingen'
												");

		$jml_beregu_cwo 	= $db->custom_query("SELECT COUNT(*) AS jumlah FROM peserta 
												INNER JOIN kelas_all ON peserta.id_kelas=kelas_all.id_kelas 
												WHERE kelas_all.isi_kelas LIKE '%Kata Beregu%' 
												AND peserta.id_kontingen='$value->id_kontingen'
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
													AND peserta.id_kontingen='$value->id_kontingen'
													AND peserta.nama ='$nama_at'");
				$cari_nama_cwo 	= $db->custom_query("SELECT DISTINCT peserta.nama FROM peserta 
													INNER JOIN kelas_all ON peserta.id_kelas=kelas_all.id_kelas 
													WHERE kelas_all.isi_kelas NOT LIKE '%Kata Beregu%'
													AND peserta.id_kontingen='$value->id_kontingen' 
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

	//array sementara data
	$ResultData = array();
	//masukan data ke array sesuai kolom table
	$view = paramEncrypt("uri=kontingen/kontingen_search_link&id_kontingen=".$value->id_kontingen);
	$crud_uri 	= array(
						"view" => $view
						);

	$ResultData[] = "<a href='./?".$crud_uri[view]."' class='link'>".$value->isi_kontingen."</a>";
	$ResultData[] = $value->jumlah;
	$ResultData[] = $jml_peserta." Peserta (Putra: ".$jml_peserta_cwo.", Putri: ".$jml_peserta_cwe.")";

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 

	//memasukan array ke variable $data

	$data[] = $ResultData;
} // Close ($query	as $value)

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
