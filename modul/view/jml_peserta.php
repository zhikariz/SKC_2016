<?php

	//Query Perorangan dan Beregu
	$perorangan 		= $db->custom_query("SELECT DISTINCT peserta.nama, kelas_all.isi_kelas FROM peserta INNER JOIN kelas_all ON peserta.id_kelas=kelas_all.id_kelas WHERE kelas_all.isi_kelas NOT LIKE '%Kata Beregu%'");

	$beregu 			= $db->custom_query("SELECT peserta.info_beregu, kelas_all.isi_kelas FROM peserta INNER JOIN kelas_all ON peserta.id_kelas=kelas_all.id_kelas WHERE kelas_all.isi_kelas LIKE '%Kata Beregu%'");

	//Keluarkan masing2 Value
	$jml_perorangan 	= array();
	foreach ($perorangan as $key) 
	{
		array_push($jml_perorangan, $key->nama);
	}

	echo $jml_perorangan 	= count($jml_perorangan);

	$jml_beregu 		= array();
	$no 				= 0;
	foreach ($beregu as $beregukey) 
	{
		$nama 			= unserialize($beregukey->info_beregu);
		foreach ($nama as $namakey => $namavalue) {
			$nama_at 	= $namavalue[nama];
			$nama_at 	= substr($nama_at, 0, -2);
			//cari 		dari table peserta ketika kolom nama=$nama_at			
			$cari_nama 	= $db->custom_query("SELECT DISTINCT peserta.nama FROM peserta INNER JOIN kelas_all ON peserta.id_kelas=kelas_all.id_kelas WHERE kelas_all.isi_kelas NOT LIKE '%Kata Beregu%' AND nama LIKE '%$nama_at%'");
			foreach ($cari_nama as $carikey) {			
				echo $carikey->nama."<br>";
				$no += 1;
			}
		}
	}

	$jml_perorangan -= $no;
	echo $no." ";
	echo $jml_perorangan;

?>
<strong>Jumlah Seluruh Peserta</strong> : 123 (341 Putra + 311 Putri)