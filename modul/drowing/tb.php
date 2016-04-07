<?php
	// Key utama untuk urutan tabel samping
	$tbnom1 		= array(1);
	$tbnom2 		= array(1,2);
	$tbnom3 		= array(3,1,2);
	$tbnom4 		= array(1,2,3,4);
	$tbnom5 		= array(3,4,5,1,2);
	$tbnom6 		= array(5,1,2,6,3,4);
	$tbnom7 		= array(7,1,2,3,4,5,6);
	$tbnom8 		= array(1,2,3,4,5,6,7,8);
	$tbnom9 		= array(3,4,5,6,7,8,9,1,2);
	$tbnom10 	= array(5,6,7,1,2,8,9,10,3,4);
	$tbnom11 	= array(7,8,9,1,2,10,3,4,11,5,6);
	$tbnom12 	= array(9,1,2,10,3,4,11,5,6,12,7,8);
	$tbnom13 	= array(11,1,2,12,3,4,13,5,6,7,8,9,10);
	$tbnom14 	= array(13,1,2,3,4,5,6,14,7,8,9,10,11,12);
	$tbnom15 	= array(15,1,2,3,4,5,6,7,8,9,10,11,12,13,1);
	$tbnom16 	= array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);

	// Key Urutan peletakan bagan, tanpa tabel samping
	$tb_bagan1 		= array(31);
	$tb_bagan2 		= array(29,30);
	$tb_bagan3 		= array(26,25,29);
	$tb_bagan4 		= array(28,27,26,25);
	$tb_bagan5 		= array(23,24,28,27,26);
	$tb_bagan6 		= array(19,20,23,24,28,26);
	$tb_bagan7 		= array(19,20,21,22,23,24,28);
	$tb_bagan8 		= array(17,18,19,20,21,22,23,24);
	$tb_bagan9 		= array(15,16,17,18,19,20,21,22,23);
	$tb_bagan10 	= array(7,8,15,16,17,18,19,21,22,23);
	$tb_bagan11 	= array(7,8,11,12,15,16,17,18,19,21,23);
	$tb_bagan12 	= array(3,4,7,8,11,12,15,16,17,19,21,23);
	$tb_bagan13 	= array(3,4,7,8,11,12,13,14,15,16,17,19,21);
	$tb_bagan14 	= array(3,4,5,6,7,8,11,12,13,14,15,16,17,21);
	$tb_bagan15 	= array(3,4,5,6,7,8,9,10,11,12,13,14,15,16,17);
	$tb_bagan16 	= array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);	

	//Key untuk warna2 drowing
	$tb1 	= array(1 => 'label-primary'
					);
	$tb2 	= array(
					1 => 'label-success',
					2 => 'label-primary');
	$tb3 	= array(
					1 => 'label-success',
					2 => 'label-primary',
					3 => 'label-danger' );
	
	$tb4 	= array(1 => 'label-warning',
					2 => 'label-success',
					3 => 'label-primary',
					4 =>'label-danger');

	$tb5 	= array(1 => 'label-warning',
					2 => 'label-success',
					3 => 'label-primary',
					4 => 'label-danger',
					5 => 'label-danger');

	$tb6 	= array(1 => 'label-warning',
					2 => 'label-success',
					3 => 'label-success',
					4 => 'label-primary',
					5 => 'label-danger',
					6 => 'label-danger');

	$tb7 	= array(1 => 'label-warning',
					2 => 'label-success',
					3 => 'label-success',
					4 => 'label-primary',
					5 => 'label-primary',
					6 => 'label-danger',
					7 => 'label-danger');

	$tb8 	= array(1 => 'label-warning',
					2 => 'label-warning',
					3 => 'label-success',
					4 => 'label-success',
					5 => 'label-primary',
					6 => 'label-primary',
					7 => 'label-danger',
					8 => 'label-danger');

	$tb9 	= array(1 => 'label-warning',
					2 => 'label-warning',
					3 => 'label-success',
					4 => 'label-success',
					5 => 'label-primary',
					6 => 'label-primary',
					7 => 'label-danger',
					8 => 'label-danger',
					9 => 'label-danger');

	$tb10 	= array(1 => 'label-warning',
					2 => 'label-warning',
					3 => 'label-success',
					4 => 'label-success',
					5 => 'label-success',
					6 => 'label-primary',
					7 => 'label-primary',
					8 => 'label-danger',
					9 => 'label-danger',
					10 => 'label-danger');

	$tb11 	= array(1 => 'label-warning',
					2 => 'label-warning',
					3 => 'label-success',
					4 => 'label-success',
					5 => 'label-success',
					6 => 'label-primary',
					7 => 'label-primary',
					8 => 'label-primary',
					9 => 'label-danger',
					10 => 'label-danger',
					11 => 'label-danger');

	$tb12 	= array(1 => 'label-warning',
					2 => 'label-warning',
					3 => 'label-warning',
					4 => 'label-success',
					5 => 'label-success',
					6 => 'label-success',
					7 => 'label-primary',
					8 => 'label-primary',
					9 => 'label-primary',
					10 => 'label-danger',
					11 => 'label-danger',
					12 => 'label-danger');

	$tb13 	= array(1 => 'label-warning',
					2 => 'label-warning',
					3 => 'label-warning',
					4 => 'label-success',
					5 => 'label-success',
					6 => 'label-success',
					7 => 'label-primary',
					8 => 'label-primary',
					9 => 'label-primary',
					10 => 'label-danger',
					11 => 'label-danger',
					12 => 'label-danger',
					13 => 'label-danger');

	$tb14 	= array(1 => 'label-warning',
					2 => 'label-warning',
					3 => 'label-warning',
					4 => 'label-success',
					5 => 'label-success',
					6 => 'label-success',
					7 => 'label-success',
					8 => 'label-primary',
					9 => 'label-primary',
					10 => 'label-primary',
					11 => 'label-danger',
					12 => 'label-danger',
					13 => 'label-danger',
					14 => 'label-danger');

	$tb15 	= array(1 => 'label-warning',
					2 => 'label-warning',
					3 => 'label-warning',
					4 => 'label-success',
					5 => 'label-success',
					6 => 'label-success',
					7 => 'label-success',
					8 => 'label-primary',
					9 => 'label-primary',
					10 => 'label-primary',
					11 => 'label-primary',
					12 => 'label-danger',
					13 => 'label-danger',
					14 => 'label-danger',
					15 => 'label-danger');

	$tb16 	= array(1 => 'label-warning',
					2 => 'label-warning',
					3 => 'label-warning',
					4 => 'label-warning',
					5 => 'label-success',
					6 => 'label-success',
					7 => 'label-success',
					8 => 'label-success',
					9 => 'label-primary',
					10 => 'label-primary',
					11 => 'label-primary',
					12 => 'label-primary',
					13 => 'label-danger',
					14 => 'label-danger',
					15 => 'label-danger',
					16 => 'label-danger');

?>