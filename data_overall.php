<?php
include_once "lib/config.php";
include "modul/enkripsi/function.php";
//kolom apa saja yang akan ditampilkan

$columns = array(
	'id_peserta',
	'isi_kontingen', //kontingen
	'nama',
	'tgl_lahir',
	'berat_badan',
	'isi_perguruan',
	'isi_kelas', // kelas
	);

//lakukan query data dari 3 table dengan inner join
	$query 		= $datatable->get_custom("SELECT peserta.*, kelas_all.*, kontingen_all.*, perguruan_all.isi_perguruan
											FROM peserta INNER JOIN kelas_all
											ON kelas_all.id_kelas=peserta.id_kelas
											INNER JOIN kontingen_all
											ON kontingen_all.id_kontingen=peserta.id_kontingen
											INNER JOIN perguruan_all
											ON peserta.perguruan=perguruan_all.id_perguruan
											",$columns);

	//buat inisialisasi array data
	$data = array();

	foreach ($query	as $value) {
		//array sementara data
		$ResultData = array();
		//masukan data ke array sesuai kolom table
		$ResultData[] = $value->id_peserta;
		$ResultData[] = $value->isi_kontingen; //kontingen
		$ResultData[] = $value->nama;
		$ResultData[] = $value->tgl_lahir;
		$ResultData[] = $value->berat_badan." Kg";
		$ResultData[] = $value->isi_perguruan;							
		$ResultData[] = $value->isi_kelas; //kelas

		//bisa juga pake logic misal jika value tertentu maka outputnya

		//kita bisa buat tombol untuk keperluan edit, delete, dll,
		$edit = paramEncrypt("uri=peserta/peserta_edit&id_peserta=".$value->id_peserta);
		$del = paramEncrypt("uri=peserta/peserta_delete&id_peserta=".$value->id_peserta);
		$detail = paramEncrypt("uri=peserta/peserta_detail&id_peserta=".$value->id_peserta);
		$crud_uri = array(
							"edit" 		=> $edit,
							"delete"	=> $del,
							"detail"	=> $detail,
							"del_msg"	=> "confirm return('Hapus Data ".$value->Nama."? ')"

						);
		$ResultData[] = "
			<div class='btn-group hide-print'>
				<a title='Ubah Data' href='./?".$crud_uri[edit]."' class='link pr-admin btn btn-xs btn-default'> <span class='glyphicon glyphicon-pencil'></span> </a>
				<a title='Hapus Data' onclick=confirmHapus('./?".$crud_uri[delete]."') href='#' class='link pr-admin btn btn-xs btn-danger'> <span class='glyphicon glyphicon-trash'></span> </a>
				<a title='Detail Data' href='./?".$crud_uri[detail]."' class='link btn btn-xs btn-success'> <span class='glyphicon glyphicon-list-alt'></span> </a>
			</div>
		";

		//memasukan array ke variable $data

		$data[] = $ResultData;

	} // CLOSE foreach ($query	as $value)

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
