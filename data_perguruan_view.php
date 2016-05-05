<?php
include "lib/config.php";
include "modul/enkripsi/function.php";
//kolom apa saja yang akan ditampilkan
$columns = array(
	'id_perguruan',
	'isi_perguruan'
	);

//lakukan query data dari 3 table dengan inner join
	$query = $datatable->get_custom("SELECT * FROM perguruan_all",$columns);

	//buat inisialisasi array data
	$data = array();

	foreach ($query	as $value) {

	//array sementara data
	$ResultData = array();
	//masukan data ke array sesuai kolom table
	$ResultData[] = $value->id_perguruan;
	$ResultData[] = $value->isi_perguruan;

	//bisa juga pake logic misal jika value tertentu maka outputnya

	//kita bisa buat tombol untuk keperluan edit, delete, dll, 
	$edit = paramEncrypt("uri=perguruan/perguruan_edit&id_perguruan=".$value->id_perguruan);
	$del = paramEncrypt("uri=perguruan/perguruan_delete&id_perguruan=".$value->id_perguruan);
	$crud_uri = array(
						"edit" 		=> $edit,
						"delete"	=> $del,
						"del_msg"	=> "confirm return('Hapus Data ".$value->isi."? ')"

					);
	$ResultData[] = "
		<a title='Ubah Data' href='./?".$crud_uri[edit]."' class='link'><span class='glyphicon glyphicon-pencil btn btn-xs btn-default'></span></a>
		<a title='Hapus Data' onclick=confirmHapus('./?".$crud_uri[delete]."') href='#' class='link'><span class='glyphicon glyphicon-trash btn btn-xs btn-danger'></span></a>
	";

	//memasukan array ke variable $data

	$data[] = $ResultData;
}

//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
