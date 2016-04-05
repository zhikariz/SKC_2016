<?php
//$uriget in index.php
include "lib/config.php";

$id = $uriget[id_peserta];
$peserta = new Database;

$table 	= "peserta";
$col	= "id_peserta";
$val	= $id;
$q 	    = $peserta->fetch_single_row($table,$col,$val);

  $Nama			      = $q->nama;
  $Tanggal_Lahir	= $q->tgl_lahir;
  $Waktu_Input    = $q->waktu_input;
  $Perguruan		  = $q->perguruan;
  $Berat_Badan	  = $q->berat_badan;
  $JK             = $q->jk;
  $Input_By       = $q->input_by;

  // Konversi id_kelas > isi dansebaliknya
  $kelas_id_conv    = array();
  $kelas_id         = $db->fetch_all("kelas_all");
  foreach($kelas_id as $val){
    // Buat Array dengan id=isi kelas dan value id kelas, untuk konversi saat POST
    $kelas_id_conv[$val->isi_kelas] = $val->id_kelas;

    // Buat Array dengan id=idkelas kelas dan value isi, untuk konversi saat POST
    $kelas_val_conv[$val->id_kelas] = $val->isi_kelas;
  }
  // -- END KONVERSI

  // Konversi id_kelas > isi dansebaliknya
  $kont_id_conv    = array();
  $kont_id         = $db->fetch_all("kontingen_all");
  foreach($kont_id as $val){
    // Buat Array dengan id=isi kelas dan value id kelas, untuk konversi saat POST
    $kont_id_conv[$val->isi_kontingen] = $val->id_kontingen;

    // Buat Array dengan id=idkelas kelas dan value isi, untuk konversi saat POST
    $kont_val_conv[$val->id_kontingen] = $val->isi_kontingen;
  }
  // -- END KONVERSI

  //Tampilkan kelas dan Kontingen
  $Kelas          = $kelas_val_conv[$q->id_kelas];
  $Kontingen      = $kont_val_conv[$q->id_kontingen];
?>

<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1> <span class="label label-success">Detail Data Peserta</span> </a><br><br></h1>
    </div>
</div>

<form class="form-horizontal" role="form" method="post" action="#">
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="id_p">ID Peserta / Waktu Input</label>  
    <div class="col-md-6">
    <input id="id_p" name="id_p" type="text" class="form-control input-md" readonly="" value="<?php echo $id; ?> / <?php echo $Waktu_Input; ?>">      
    </div>
  </div>  

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="kontingen">Kontingen</label>  
    <div class="col-md-6">
    <input readonly id="kontingen_pilih" name="kontingen" type="text" placeholder="Data Tersimpan: <?php echo $Kontingen; ?>" class="form-control input-md" required="" value="<?php echo $Kontingen; ?>">
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="nama">Nama Peserta</label>  
    <div class="col-md-6">
    <input readonly id="nama" name="nama" type="text" placeholder="Data Tersimpan: <?php echo $Nama; ?>" class="form-control input-md" required="" value="<?php echo $Nama; ?>">
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="tgl_lahir">Tanggal Lahir</label>  
    <div class="col-md-6">
      <div class='input-group date' id='datetimepicker10'>
          <input readonly name="tgl_lahir" type='text' class="form-control" placeholder="Data Tersimpan: <?php echo $Tanggal_Lahir; ?>" value="<?php echo $Tanggal_Lahir; ?>" />
          <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar">
              </span>
          </span>
      </div>               
    </div>         
  </div>

  <!-- Appended Input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="berat">Berat Badan</label>
    <div class="col-md-2">
      <div class="input-group">
        <input readonly id="berat" name="berat" class="form-control" placeholder="Data Tersimpan: <?php echo $Berat_Badan; ?>" type="text" required="" value="<?php echo $Berat_Badan; ?>">
        <span class="input-group-addon">Kg</span>
      </div>
      
    </div>
  </div>
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="perguruan">Asal Perguruan</label>  
    <div class="col-md-6">
    <input readonly id="perguruan" name="perguruan" type="text" placeholder="Data Tersimpan: <?php echo $Perguruan; ?>" class="form-control input-md" required="" value="<?php echo $Perguruan; ?>">
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="kelas_pilih">Kelas yang diikuti</label>  
    <div class="col-md-6">
    <input readonly id="kelas_pilih" name="kelas_pilih" type="text" placeholder="Data Tersimpan: <?php echo $Kelas; ?>" class="form-control input-md" required="" value="<?php echo $Kelas; ?>">
      
    </div>
  </div>

  <!-- Multiple Radios (inline) -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="jk">Jenis Kelamin</label>
    <div class="col-md-4">
    <?php       
    	if($JK == "Putri")
      {
        $putri_check = "checked";
        $putra_check = "";
      }
      elseif($JK == "Putra"){
        $putra_check = "checked";
        $putri_check = "";
      }
      else
      {
        $putri_check = "";
        $putra_check = "";        
      }
    ?> 
      <label class="radio-inline" for="jk-0">
        <input readonly type="radio" name="jk" id="jk-0" value="Putra" <?php echo $putra_check; ?>>
        Putra (Pa)
      </label> 
      <label class="radio-inline" for="jk-1">
        <input readonly type="radio" name="jk" id="jk-1" value="Putri" <?php echo $putri_check; ?>>
        Putri (Pi)
      </label>
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="kelas_pilih">Di Input Oleh</label>  
    <div class="col-md-6">
    <input id="input_by" readonly class="form-control input-md" required="" value="<?php echo $Input_By; ?>">
      
    </div>
  </div>

  <!-- Button (Double) -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-6">
      <button onclick="history.back()" type="button" class="btn btn-default">Kembali</button>
    </div>
  </div>        
</form>  
