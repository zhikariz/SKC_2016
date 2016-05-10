<?php 
		//Koneksi Database & PHP PDO
    require_once ('../../lib/aio_config.php');

		require_once ('../../lib/Database.php');
		require_once ('../../lib/Dtable.php');
		require_once ('../enkripsi/function.php');

		$db=new Database();
		$datatable=New Dtable();

		if(!function_exists('handleException'))
		{
			function handleException( $exception ) {
			  echo  $exception->getMessage();
			}
		}

		set_exception_handler( 'handleException' );
		//END Koneksi		

		// Konversi id ke val , peserta, kontingen, kelas
	    $kont_val_conv    = array();
	    $kelas_val_conv    = array();

	    $kont_val          = $db->fetch_all("kontingen_all");
	    $kelas_val          = $db->fetch_all("kelas_all");
	    $peserta_val        = $db->custom_query("SELECT id_peserta, nama FROM peserta");

	    foreach ($kont_val as $id) {
	      $kont_val_conv[$id->id_kontingen] = $id->isi_kontingen;     
	    }           

	    foreach ($kelas_val as $id) {
	      $kelas_val_conv[$id->id_kelas] = $id->isi_kelas;     
	    }               

	    // load semua data nama
	    foreach ($peserta_val as $id) {
	      $peserta_val_conv[$id->id_peserta] = $id->nama;     
	    }
	    // -- END KONVERSI 		

		// Panggil Array dari DB
		$id_drowing 		= $_GET[id_drowing];		
	    $data_extract     	= $db->custom_query("SELECT * FROM drowing WHERE id_drowing='$id_drowing'");
	    foreach ($data_extract as $data => $val) {
	        $list_peserta 	= $val->list_peserta;
	        $id_kelas     	= $val->id_kelas;
	    }

	    //Kembalikan ke bentuk array
	    $arr_peserta 	  	= unserialize($list_peserta);

		//Pool yang akan di print
		$pool_get 				= $_GET[pool];    
		$kelas 					= $kelas_val_conv[$id_kelas];
		
		
		// print_r($arr_peserta); // Print array struktur

		//hitung jml peserta di pool ini (termasuk nilai kosong)
        $jml_pool_ini = count($arr_peserta[$pool_get]);

        //Kurangi jumlah apabila ada array kosong
        foreach ($arr_peserta[$pool_get] as $key1 => $value1) 
        {        
            if($value1['id_peserta'] == ""){
                $jml_pool_ini -= 1;
            }
        }        

        // Jumlah Peserta di pool ini 
        $jml_peserta 	= $jml_pool_ini;       
			
		// Tabel urutan peletakan nama	
        include "tb.php";

		// Set Semua nama kontingen dan peserta di $nama_ke dan $kontingen_ke (31 variabel masing2) menjadi NULL/""
		for($k=1; $k<=31; $k++)
		{
			${no_tanding_.$k} = "";
			${nama_ke_.$k} = "";
			${kontingen_ke_.$k} = "";
		}

		// Set nama_ke dan kontingen_ke berdasarkan value berurutan	
		$tbnom_pake 	= ${tbnom.$jml_pool_ini};
		$tb_bagan_pake 	= ${tb_bagan.$jml_peserta};
		$list_ps = $arr_peserta[$pool_get];
		foreach ($tb_bagan_pake as $tbkey => $tbval) {
			// Set nama dan kontingen
			$index_panggil 		= $tb_bagan_pake[$tbnom_pake[$tbkey]-1];
			${no_tanding_.$tbval} = $tbkey + 1;			
			
			// echo $tbnom_pake[$tbkey]."<br>";
			// $nama_ke_17 			   = $peserta_val_conv[$list_ps[$tbkey]['id_peserta']]; $nama_ke_3 = "TIga"; $nama_ke_4 = "Empat"; $nama_ke_19 = "Sembilas";			
			${nama_ke_.$index_panggil} = $peserta_val_conv[$list_ps[$tbkey+1]['id_peserta']]; 
			${kontingen_ke_.$index_panggil} = $kont_val_conv[$list_ps[$tbkey+1]['id_kontingen']]; 
			// Maksimal 25 Karakter

			// Nomor 9 tapi di letak di 17, 17 itu urutan ke 9

      // Hilangkan Nama Pool Saat di Print
      $pool_get         = str_replace("A-", " ", $pool_get);
		}

	$edit_link  = paramEncrypt("uri=drowing/drowing_test_edit&id_drowing=".$id_drowing."&id_kelas=".$id_kelas);
	$edit_link 	= "<a title='Edit Drowing' href='../../?".$edit_link."' class=' btn btn-lg btn-warning'><span class='glyphicon glyphicon-pencil'></span> Edit Drowing ini</a>";

    $pecah_kelas        = explode(" ", $kelas);

    $re_kelas   = $pecah_kelas;
    $rear_kelas = "";    
    for($d=0; $d<count($re_kelas);$d++)
    {
      if($d == 4)
      {
        $rear_kelas .= "<br>".$re_kelas[$d]." ";
      }
      else
      {
        $rear_kelas .= $re_kelas[$d]." ";
      }
    } // close for $d

    // $kelas sudah dipecah bila lebih dari karakter akan di enter
    $kelas = $rear_kelas;     

    if( in_array("Kata", $pecah_kelas))
    {
      include "drowing_print_kata.php";
    }
    elseif (in_array("Kumite", $pecah_kelas))
    {
      include "drowing_print_kumite.php";
    }
    else
    {
      // None
      echo "Nama Kelas Harus Mengandung 'Kumite' atau 'Kata'";
    }
?>