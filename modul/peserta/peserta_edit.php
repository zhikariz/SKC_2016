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
  $Berat_Badan	  = $q->berat_badan;
  $JK             = $q->jk;
  $Input_By       = $q->input_by;
  if(empty($q->info_beregu)){
    // Buat Array Kosong untuk hindari error
    $beregu     = array();
    for($i=1; $i<=3; $i++)
    {
      $beregu[$i]['nama'] = "";
      $beregu[$i]['tgl_lahir'] = "";
    }
    $beregu_view = $beregu;     
  }  
  else {
    $beregu_view    = unserialize($q->info_beregu);    
  }  

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
    // Buat Array dengan id=isi kontingen dan value id kontingen, untuk konversi saat POST
    $kont_id_conv[$val->isi_kontingen] = $val->id_kontingen;

    // Buat Array dengan id=idkontingen kontingen dan value isi, untuk konversi saat POST
    $kont_val_conv[$val->id_kontingen] = $val->isi_kontingen;
  }
  // -- END KONVERSI

  // Konversi id_perguruan > isi dansebaliknya
  $konv_val_perguruan   = array();
  $perg_id          = $db->fetch_all("perguruan_all");
  foreach ($perg_id as $val) {
    // Buat Array dengan id=isi perguruan dan value id perguruan, untuk konversi saat POST
    $konv_val_perguruan[$val->isi_perguruan] = $val->id_perguruan;

    // Buat Array dengan id=idperguruan perguruan dan value isi, untuk konversi saat POST
    $konv_id_perguruan[$val->id_perguruan]  = $val->isi_perguruan;
  }  

  //Tampilkan kelas dan Kontingen
  $Kelas          = $kelas_val_conv[$q->id_kelas];
  $Kontingen      = $kont_val_conv[$q->id_kontingen];
  $Perguruan      = $konv_id_perguruan[$q->perguruan];
?>

<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1 class="page-header text-center text-primary">
        <span class="pull-right"> <span class="glyphicon glyphicon-pencil"></span></span>
        Edit Data<small> Peserta</small>
        </h1>        
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
    <input id="kontingen_pilih" name="kontingen" type="text" placeholder="Data Tersimpan: <?php echo $Kontingen; ?>" class="form-control input-md" required="" value="<?php echo $Kontingen; ?>">
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="nama">Nama Peserta</label>  
    <div class="col-md-6">
      <input id="nama" name="nama" type="text" placeholder="Data Tersimpan: <?php echo $Nama; ?>" class="form-control input-md" value="<?php echo $Nama; ?>" required="">
      <span class="help-block">* Untuk Kata Beregu, isi dengan nama panggilan anggota dipisah koma (contoh: Albert,Bangkit,Vani)</span>
    </div> 
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="tgl_lahir">Tanggal Lahir</label>  
    <div class="col-md-6">
      <input id="tgl_lahir" name="tgl_lahir" type="text" placeholder="Data Tersimpan: <?php echo $Tanggal_Lahir; ?>" class="form-control input-md" value="<?php echo $Tanggal_Lahir; ?>" required="" />
      <span class="help-block">* Untuk Kata Beregu, Isi sembarang Tanggal Lahir</span>                     
    </div>         
  </div>

  <!-- Appended Input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="berat">Berat Badan</label>
    <div class="col-md-2">
      <div class="input-group">
        <input id="berat" name="berat" class="form-control" placeholder="Data Tersimpan: <?php echo $Berat_Badan; ?>" type="text" required="" value="<?php echo $Berat_Badan; ?>">
        <span class="input-group-addon">Kg</span>
      </div>
      
    </div>
  </div>
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="perguruan">Asal Perguruan</label>  
    <div class="col-md-6">
    <input id="perguruan_pilih" name="perguruan" type="text" placeholder="Data Tersimpan: <?php echo $Perguruan; ?>" class="form-control input-md" required="" value="<?php echo $Perguruan; ?>">
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="kelas_pilih">Kelas yang diikuti</label>  
    <div class="col-md-6">
    <input id="kelas_pilih" name="kelas_pilih" type="text" placeholder="Data Tersimpan: <?php echo $Kelas; ?>" class="form-control input-md" required="" value="<?php echo $Kelas; ?>">
      
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
        <input type="radio" name="jk" id="jk-0" value="Putra" <?php echo $putra_check; ?>>
        Putra (Pa)
      </label> 
      <label class="radio-inline" for="jk-1">
        <input type="radio" name="jk" id="jk-1" value="Putri" <?php echo $putri_check; ?>>
        Putri (Pi)
      </label>
    </div>
  </div>

  <!-- Notes For Kata Beregu -->
  <fieldset>
    <legend class="text-center"><br>Form* Tambahan untuk Kata Beregu <br>
    <code style="font-size:0.5em">* Selain Kata Beregu, KOSONGi Field Ini</code>
    </legend>  

    <?php 
      foreach ($beregu_view as $key => $val_regu) {
        # Tampilkan Data Beregu
    ?>
      <!-- Anggota Regu <?php echo $key; ?> -->            
      <div class="form-group">
        <label class="col-md-4 control-label" for="beregu<?php echo $key; ?>">Anggota Regu <?php echo $key; ?></label>  
        <div class="col-md-3">
        <input name="beregu<?php echo $key; ?>" type="text" placeholder="Nama Lengkap" class="form-control input-md" value="<?php echo $val_regu[nama]; ?>">              
        </div>

        <div class="col-md-3">
        <input id="tgl_beregu<?php echo $key; ?>" name="tgl_beregu<?php echo $key; ?>" type="text" placeholder="Tanggal Lahir" class="form-control input-md" value="<?php echo $val_regu[tgl_lahir]; ?>">
        </div>                
      </div>    
    <?php
      } // CLOSE foreach ($beregu_view as
    ?>
      <hr>                                    
  </fieldset>          

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="kelas_pilih">Di Input Oleh</label>  
    <div class="col-md-6">
    <input id="input_by" readonly class="form-control input-md" value="<?php echo $Input_By; ?>">
      
    </div>
  </div>

  <!-- Button (Double) -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-6">
      <input type="submit" name="submit" class="btn btn-lg btn-primary" value="Simpan Data">
      <button id="reset" type="reset" name="reset" class="btn btn-lg btn-default">Reset</button>      
      <button onclick="history.back()" type="button" class="btn btn-lg btn-default">Batal</button>
    </div>
  </div>        
</form>  

<!-- let's begin the script || JS Data Table Easy Config -->
    <script type="text/javascript">
     // Kelas Data Autocomplete
     var kelas_data       = [];
     var kontingen_data   = [];
     var perguruan_data   = [];

    <?php 
      include_once "lib/config.php";
      $kelas_sel  = new Database;
      $kelas_q    = "SELECT * FROM kelas_all";
      $exec       = $kelas_sel->custom_query($kelas_q);
      foreach ($exec as $kelas_nama) {
        $kelas_n = $kelas_nama->isi_kelas;
        echo "kelas_data.push('".$kelas_n."');";
      } // close foreach($exec)       
    ?>
     $('#kelas_pilih').typeahead({        
        local: kelas_data
      });

      // kontingen Data Autocomplete
    <?php 
      $kontingen_sel  = new Database;
      $kontingen_q    = "SELECT * FROM kontingen_all";
      $exec           = $kontingen_sel->custom_query($kontingen_q);

      foreach ($exec as $kontingen_nama) {
        $kontingen_n = $kontingen_nama->isi_kontingen;
        echo "kontingen_data.push('".$kontingen_n."');";
      } // close foreach($exec))
    ?>
     $('#kontingen_pilih').typeahead({        
        local: kontingen_data
      });

    // Perguruan Data Auto Complete / Lengkapan script ada diatas sebelum S_POST
    <?php 
      $perguruan_sel  = new Database;
      $perguruan_q    = "SELECT * FROM perguruan_all";    
      $exec           = $perguruan_sel->custom_query($perguruan_q);
      foreach ($exec as $perguruan_isi) {        
        $perguruan_n  = $perguruan_isi->isi_perguruan;
        echo "perguruan_data.push('".$perguruan_n."');";
      }
    ?>
     $('#perguruan_pilih').typeahead({        
        local: perguruan_data
      });    

      // Datepicker BS 3
  $('#tgl_lahir').datetimepicker({
    viewMode: 'days',
    format: 'YYYY-MM-DD'
  });  

  $('#tgl_beregu1').datetimepicker({
    viewMode: 'days',
    format: 'YYYY-MM-DD'
  });          

  $('#tgl_beregu2').datetimepicker({
    viewMode: 'days',
    format: 'YYYY-MM-DD'
  });          

  $('#tgl_beregu3').datetimepicker({
    viewMode: 'days',
    format: 'YYYY-MM-DD'
  });     

</script>

<!-- Proses update data -->
<?php
if(isset($_POST[submit])){
	$table_up	= "peserta";

  // Serialkan data beregu dalam array(nama,tgl_lahir)
  $beregu     = array();
  for($i=1; $i<=3; $i++)
  {
    $beregu[$i]['nama'] = $_POST['beregu'.$i];
    $beregu[$i]['tgl_lahir'] = $_POST['tgl_beregu'.$i];
  }
  $info_beregu = serialize($beregu);

	$data_up	= array(

                        'nama'          => htmlentities($_POST[nama]),
                        'id_kontingen'  => $kont_id_conv[$_POST[kontingen]],                        
                        'berat_badan'   => $_POST[berat], 
                        'tgl_lahir'     => $_POST[tgl_lahir],
                        'perguruan'     => $konv_val_perguruan[$_POST[perguruan]],
                        'jk'            => $_POST[jk],
                        'info_beregu'   => $info_beregu,
                        'id_kelas'      => $kelas_id_conv[$_POST[kelas_pilih]]
                         );
	$prim_col	= "id_peserta";
	// $id didefinisikan diatas;

	$peserta 	= new Database;
	$up_peserta = $peserta->update($table_up,$data_up,$prim_col,$id);
	echo "
		<script type='text/javascript'>				
			alert('Data diupdate');
		</script>
		<meta http-equiv='refresh' content='0;url=./?".$link_overall."' />
	";
}

?>