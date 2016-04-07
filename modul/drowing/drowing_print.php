<?php 
		// Kudu dibuat 
		// nama kelas
		// get pool 
		// penomoran bagan (OK)
		// nama peserta potong

		//Koneksi Database & PHP PDO
		error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
		ini_set( "display_errors", true );
		define( "DB_DSN", "mysql:host=localhost;dbname=skc_solocup" );
		define( "DB_USERNAME", "root" );
		define( "DB_PASSWORD", "root" );
		define('DB_CHARACSET', 'utf8');

		require_once ('../../lib/Database.php');
		require_once ('../../lib/Dtable.php');

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
			${nama_ke_.$index_panggil} = substr(${nama_ke_.$index_panggil},0,25); 	// Maksimal 25 Karakter

			${kontingen_ke_.$index_panggil} = $kont_val_conv[$list_ps[$tbkey+1]['id_kontingen']]; 
			${kontingen_ke_.$index_panggil}	= substr(${kontingen_ke_.$index_panggil},0,25); 	// Maksimal 25 Karakter
			// Maksimal 25 Karakter

			// Nomor 9 tapi di letak di 17, 17 itu urutan ke 9
		}

?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="ProgId" content="Excel.Sheet">
<link rel="stylesheet" href="drowing_print.css">
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>

<body>

<div align="center">
	<div class="row">
		<span class="hide-print">
			<br><br>
			<h3 class="text-center">NOTE: Hasil print optimal menggunakan Chome Versi 49 keatas.</h3>
			<a href="#" onclick="history.back()" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-chevron-left"></span>  Kembali</a>
			<a href="#" onclick="print()" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-print"></span>  Print</a>
		</span>
	</div>
<table border="0" cellpadding="0" cellspacing="0" width="2015" class="xl8714518" style="border-collapse:collapse;table-layout:fixed;width:1513pt">
 <colgroup><col class="xl8714518" width="43">
 <col class="xl8714518" width="258">
 <col class="xl8714518" width="45">
 <col class="xl8714518" width="44">
 <col class="xl8714518" width="261">
 <col class="xl8714518" width="44">
 <col class="xl8714518" width="43">
 <col class="xl8714518" width="260">
 <col class="xl8714518" width="50">
 <col class="xl8714518" width="39">
 <col class="xl8714518" width="279">
 <col class="xl8714518" width="50">
 <col class="xl8714518" width="49">
 <col class="xl8714518" width="260">
 <col class="xl8714518" width="45">
 <col class="xl8714518" width="124">
 <col class="xl8714518" width="121">

 </colgroup><tbody><tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" width="43" style="height:15.95pt;width:32pt">&nbsp;</td>
  <td class="xl6614518" width="258" style="width:194pt">&nbsp;</td>
  <td class="xl6614518" width="45" style="width:34pt">&nbsp;</td>
  <td class="xl6614518" width="44" style="width:33pt">&nbsp;</td>
  <td class="xl6614518" width="261" style="width:196pt">&nbsp;</td>
  <td class="xl6614518" width="44" style="width:33pt">&nbsp;</td>
  <td class="xl6614518" width="43" style="width:32pt">&nbsp;</td>
  <td class="xl6614518" width="260" style="width:195pt">&nbsp;</td>
  <td class="xl6614518" width="50" style="width:38pt">&nbsp;</td>
  <td class="xl6614518" width="39" style="width:29pt">&nbsp;</td>
  <td class="xl6514518" width="279" style="width:209pt">&nbsp;</td>
  <td class="xl6514518" width="50" style="width:38pt">&nbsp;</td>
  <td class="xl6514518" width="49" style="width:37pt">&nbsp;</td>
  <td class="xl6514518" width="260" style="width:195pt">&nbsp;</td>
  <td class="xl6614518" width="45" style="width:34pt">&nbsp;</td>
  <td class="xl6614518" width="124" style="width:93pt">&nbsp;</td>
  <td class="xl6614518" width="121" style="width:91pt">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl8814518" style="border-bottom:.5pt solid black;
  height:31.9pt"><?php echo $no_tanding_1; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_1;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7314518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none"><?php echo $kontingen_ke_1;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7314518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td rowspan="2" class="xl8314518"><?php echo $no_tanding_17; ?> </td>
  <td class="xl7014518" width="261" style="border-left:none;width:196pt"><?php echo $nama_ke_17;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7314518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt"><?php echo $no_tanding_2; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_2;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl7014518" width="261" style="border-top:none;border-left:none;
  width:196pt"><?php echo $kontingen_ke_17;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td colspan="4" rowspan="2" class="xl8614518"><?php echo $kelas; ?></td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none"><?php echo $kontingen_ke_2;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7514518" style="border-top:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt;box-sizing: border-box">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td rowspan="2" class="xl8414518"><?php echo $no_tanding_28; ?> </td>
  <td class="xl7014518" width="260" style="border-left:none;width:195pt"><?php echo $nama_ke_28;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7314518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt;box-sizing: border-box"><?php echo $no_tanding_3; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_3;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl7014518" width="260" style="border-top:none;border-left:none;
  width:195pt"><?php echo $kontingen_ke_28;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7314518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none;box-sizing: border-box"><?php echo $kontingen_ke_3;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7714518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7514518" style="border-top:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7314518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt;box-sizing: border-box">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td rowspan="2" class="xl8314518"><?php echo $no_tanding_18; ?> </td>
  <td class="xl7014518" width="261" style="border-left:none;width:196pt"><?php echo $nama_ke_18;?></td>
  <td class="xl7414518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt;box-sizing: border-box"><?php echo $no_tanding_4; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_4;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl7014518" width="261" style="border-top:none;border-left:none;
  width:196pt"><?php echo $kontingen_ke_18;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none;box-sizing: border-box"><?php echo $kontingen_ke_4;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td rowspan="2" class="xl9014518">POOL : <?php echo $pool_get; ?></td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt;box-sizing: border-box">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td rowspan="2" class="xl8314518"><?php echo $no_tanding_29; ?> </td>
  <td class="xl8314518" style="border-left:none"><?php echo $nama_ke_29;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl9114518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt;box-sizing: border-box"><?php echo $no_tanding_5; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_5;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl8314518" style="border-top:none;border-left:none"><?php echo $kontingen_ke_29;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none;box-sizing: border-box"><?php echo $kontingen_ke_5;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7814518" style="border-top:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt;box-sizing: border-box">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td rowspan="2" class="xl8314518"><?php echo $no_tanding_19; ?> </td>
  <td class="xl7014518" width="261" style="border-left:none;width:196pt"><?php echo $nama_ke_19;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt;box-sizing: border-box"><?php echo $no_tanding_6; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_6;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl7014518" width="261" style="border-top:none;border-left:none;
  width:196pt"><?php echo $kontingen_ke_19;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none;box-sizing: border-box"><?php echo $kontingen_ke_6;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7514518" style="border-top:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7714518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt;box-sizing: border-box">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td rowspan="2" class="xl8414518"><?php echo $no_tanding_27; ?> </td>
  <td class="xl8314518" style="border-left:none"><?php echo $nama_ke_27;?></td>
  <td class="xl7414518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt;box-sizing: border-box"><?php echo $no_tanding_7; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_7;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl8314518" style="border-top:none;border-left:none"><?php echo $kontingen_ke_27;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none;box-sizing: border-box"><?php echo $kontingen_ke_7;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7714518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt;box-sizing: border-box">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td rowspan="2" class="xl8314518"><?php echo $no_tanding_20; ?> </td>
  <td class="xl7014518" width="261" style="border-left:none;width:196pt"><?php echo $nama_ke_20;?></td>
  <td class="xl7414518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt"><?php echo $no_tanding_8; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_8;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl7014518" width="261" style="border-top:none;border-left:none;
  width:196pt"><?php echo $kontingen_ke_20;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none"><?php echo $kontingen_ke_8;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td rowspan="2" class="xl8514518"><?php echo $no_tanding_31; ?> </td>
  <td class="xl7114518" style="border-left:none"><?php echo $nama_ke_31;?></td>
  <td class="xl6714518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt"><?php echo $no_tanding_9; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_9;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl7114518" style="border-top:none;border-left:none"><?php echo $kontingen_ke_31;?></td>
  <td class="xl6714518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none"><?php echo $kontingen_ke_9;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td rowspan="2" class="xl8314518"><?php echo $no_tanding_21; ?> </td>
  <td class="xl7014518" width="261" style="border-left:none;width:196pt"><?php echo $nama_ke_21;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt"><?php echo $no_tanding_10; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_10;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl7014518" width="261" style="border-top:none;border-left:none;
  width:196pt"><?php echo $kontingen_ke_21;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none"><?php echo $kontingen_ke_10;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7514518" style="border-top:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td rowspan="2" class="xl8414518"><?php echo $no_tanding_26; ?> </td>
  <td class="xl7014518" width="260" style="border-left:none;width:195pt"><?php echo $nama_ke_26;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt"><?php echo $no_tanding_11; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_11;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl7014518" width="260" style="border-top:none;border-left:none;
  width:195pt"><?php echo $kontingen_ke_26;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none"><?php echo $kontingen_ke_11;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7714518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7514518" style="border-top:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td rowspan="2" class="xl8314518"><?php echo $no_tanding_22; ?> </td>
  <td class="xl7014518" width="261" style="border-left:none;width:196pt"><?php echo $nama_ke_22;?></td>
  <td class="xl7414518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt"><?php echo $no_tanding_12; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_12;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl7014518" width="261" style="border-top:none;border-left:none;
  width:196pt"><?php echo $kontingen_ke_22;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7914518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none"><?php echo $kontingen_ke_12;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl8014518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td rowspan="2" class="xl8414518"><?php echo $no_tanding_30; ?> </td>
  <td class="xl8314518" style="border-left:none"><?php echo $nama_ke_30;?></td>
  <td class="xl7414518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt"><?php echo $no_tanding_13; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_13;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl8314518" style="border-top:none;border-left:none"><?php echo $kontingen_ke_30;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none"><?php echo $kontingen_ke_13;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td rowspan="2" class="xl8314518"><?php echo $no_tanding_23; ?> </td>
  <td class="xl7014518" width="261" style="border-left:none;width:196pt"><?php echo $nama_ke_23;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl8114518">&nbsp;</td>
  <td class="xl8214518"></td>
  <td class="xl8114518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl8114518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt"><?php echo $no_tanding_14; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_14;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl7014518" width="261" style="border-top:none;border-left:none;
  width:196pt"><?php echo $kontingen_ke_23;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6814518">Juara</td>
  <td class="xl6814518">Nama</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518" align="right">Kontingen</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none"><?php echo $kontingen_ke_14;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7514518" style="border-top:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7714518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl8114518"></td>
  <td class="xl9214518" colspan="2"></td>
  
  <td class="xl6914518"></td>
  <td class="xl9314518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td rowspan="2" class="xl8414518"><?php echo $no_tanding_25; ?> </td>
  <td class="xl8314518" style="border-left:none"><?php echo $nama_ke_25;?></td>
  <td class="xl7414518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6814518">1</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt"><?php echo $no_tanding_15; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_15;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl8314518" style="border-top:none;border-left:none"><?php echo $kontingen_ke_25;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl8114518">&nbsp;</td>
  <td class="xl9214518">&nbsp;</td>
  <td class="xl6914518">&nbsp;</td>
  <td class="xl6914518">&nbsp;</td>
  <td class="xl9314518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none"><?php echo $kontingen_ke_15;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl7614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6814518">2</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td class="xl7214518">&nbsp;</td>
  <td rowspan="2" class="xl8314518"><?php echo $no_tanding_24; ?> </td>
  <td class="xl7014518" width="261" style="border-left:none;width:196pt"><?php echo $nama_ke_24;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl8114518">&nbsp;</td>
  <td class="xl6914518">&nbsp;</td>
  <td class="xl6914518">&nbsp;</td>
  <td class="xl6914518">&nbsp;</td>
  <td class="xl6914518">&nbsp;</td>
  <td class="xl6914518">&nbsp;</td>
  <td class="xl6914518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td rowspan="2" height="42" class="xl7414518" style="height:31.9pt"><?php echo $no_tanding_16; ?></td>
  <td class="xl7414518" style="border-left:none"><?php echo $nama_ke_16;?></td>
  <td class="xl7414518" style="border-left:none">&nbsp;</td>
  <td class="xl7014518" width="261" style="border-top:none;border-left:none;
  width:196pt"><?php echo $kontingen_ke_24;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6814518">3</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6914518">&nbsp;</td>
  <td class="xl6914518">&nbsp;</td>
  <td class="xl6914518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl7414518" style="height:15.95pt;border-top:none;
  border-left:none"><?php echo $kontingen_ke_16;?></td>
  <td class="xl8314518" style="border-top:none;border-left:none">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl8114518">&nbsp;</td>
  <td class="xl6914518">&nbsp;</td>
  <td class="xl6914518">&nbsp;</td>
  <td class="xl6914518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
 </tr>
 <tr height="21" style="mso-height-source:userset;height:15.95pt">
  <td height="21" class="xl6614518" style="height:15.95pt">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6614518">&nbsp;</td>
  <td class="xl6814518">3</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
  <td class="xl6814518">&nbsp;</td>
 </tr>

</tbody></table>
</div>
<!-- <script type="text/javascript" src="../assets/js/jquery-1.12.0.min.js"></script> -->
<script>
		//print document
		window.print();
</script>
</body></html>