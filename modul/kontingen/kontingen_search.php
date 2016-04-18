<?php

	include_once "lib/config.php";

	$cari_get=$_POST['cari'];

	// Buat Array dengan id=isi kelas/kontingen dan value id kelas/kontingen, untuk konversi saat POST
	$kont_id_conv    = array();

	$kont_id          = $db->fetch_all("kontingen_all");
	foreach ($kont_id as $val) {
	  $kont_id_conv[$val->isi_kontingen] = $val->id_kontingen;     
	}

	// Konversi
	$cari = $kont_id_conv[$cari_get];

	//Include detail report
	include "kontingen_detail.php";	
?>