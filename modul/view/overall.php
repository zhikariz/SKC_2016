<?php 
    include "lib/config.php";
?>   
   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1> <span class="label label-danger">Semua Data</span> <a href="#" data-toggle="modal" data-target=".modal-peserta-add" title="Tambah Data" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>  </a><br> <small>Peserta Pertandingan</small> <br></h1>        
        <div class="col-md-12">
          <?php include "jml_peserta.php"; ?>
        </div>

        <div class="col-md-12">
            <table id="overall" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kontingen</th>
                        <th>Nama</th>
                        <th>Lahir</th>
                        <th>Berat</th>
                        <th>Perguruan</th>
                        <th>Kelas</th>
                        <th class="hide-print">Opsi</th>
                    </tr>
                </thead>
               <tbody>                 
               </tbody>
            </table>
        </div> <!-- col-md-12 -->
    </div> <!-- row row-centered -->
</div> <!-- container -->

<!-- Modal kelas_add -->
<div class="modal fade modal-peserta-add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Peserta</h4>
      </div>    
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="#">
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="kontingen_pilih">Kontingen</label>  
            <div class="col-md-6">
            <input id="kontingen_pilih" name="kontingen" type="text" placeholder="Kontingen Asal" class="form-control input-md" required="">
              
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="nama">Nama Peserta</label>  
            <div class="col-md-6">
            <input id="nama" name="nama" type="text" placeholder="Nama Lengkap" class="form-control input-md" required="">
            <span class="help-block">* Untuk Kata Beregu, isi dengan nama panggilan anggota dipisah koma (contoh: Albert,Bangkit,Vani)</span>
            </div>            
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="tgl_lahir">Tanggal Lahir</label>  
            <div class="col-md-6">
                  <input id="tgl_lahir" name="tgl_lahir" type="text" placeholder="1995-09-24 (Contoh Untuk Format 24 September 1995)" class="form-control input-md" required="" />
                  <span class="help-block">* Untuk Kata Beregu, Isi sembarang Tanggal Lahir</span>
            </div>               
          </div>

          <!-- Appended Input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="berat">Berat Badan</label>
            <div class="col-md-2">
              <div class="input-group">
                <input id="berat" name="berat" class="form-control" placeholder="0" value="0" type="text" required="">
                <span class="input-group-addon">Kg</span>
              </div>
              
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="perguruan">Asal Perguruan</label>  
            <div class="col-md-6">
            <input id="perguruan" name="perguruan" type="text" placeholder="Perguruan Asal" class="form-control input-md" required="">
              
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="kelas_pilih">Kelas yang diikuti</label>  
            <div class="col-md-6">
            <input id="kelas_pilih" name="kelas_pilih" type="text" placeholder="Kelas yang diikuti (Ketik kata kuncinya)" class="form-control input-md" required="">
              
            </div>
          </div>

          <!-- Multiple Radios (inline) -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="jk">Jenis Kelamin</label>
            <div class="col-md-4"> 
              <label class="radio-inline" for="jk-0">
                <input type="radio" name="jk" id="jk-0" value="Putra" required>
                Putra (Pa)
              </label> 
              <label class="radio-inline" for="jk-1">
                <input type="radio" name="jk" id="jk-1" value="Putri" required>
                Putri (Pi)
              </label>
            </div>
          </div>


          <!-- Multiple Radios (inline) -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="req_kelas">Jenis Kelas</label>
              <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-danger">
                  <input type="radio" name="req_kelas" class="req_kelas" id="req_sendiri" required> Kumite / Kata Perorangan
                </label>
                <label class="btn btn-danger">
                  <input type="radio" name="req_kelas" class="req_kelas" id="req_beregu" required> Kata Beregu
                </label>
              </div>            
          </div>          

          <!-- Notes For Kata Beregu -->
          <fieldset style="display:none;" id="field_beregu">
            <legend class="text-center"><br>Form* Tambahan untuk Kata Beregu <br>
            <code style="font-size:0.5em">* Selain Kata Beregu, KOSONGi Field Ini</code>
            </legend>  

              <!-- Anggota Regu 1 -->            
              <div class="form-group">
                <label class="col-md-4 control-label" for="beregu1">Anggota Regu 1</label>  
                <div class="col-md-3">
                <input id="beregu1" name="beregu1" type="text" placeholder="Nama Lengkap" class="form-control input-md">              
                </div>

                <div class="col-md-3">
                <input id="tgl_beregu1" name="tgl_beregu1" type="text" placeholder="Tanggal Lahir" class="form-control input-md">
                </div>                
              </div>          

              <!-- Anggota Regu 2 -->            
              <div class="form-group">
                <label class="col-md-4 control-label" for="beregu2">Anggota Regu 2</label>  
                <div class="col-md-3">
                <input id="beregu2" name="beregu2" type="text" placeholder="Nama Lengkap" class="form-control input-md">              
                </div>

                <div class="col-md-3">
                <input id="tgl_beregu2" name="tgl_beregu2" type="text" placeholder="Tanggal Lahir" class="form-control input-md">
                </div>                
              </div>          

              <!-- Anggota Regu 3 -->            
              <div class="form-group">
                <label class="col-md-4 control-label" for="beregu3">Anggota Regu 3</label>  
                <div class="col-md-3">
                <input id="beregu3" name="beregu3" type="text" placeholder="Nama Lengkap" class="form-control input-md">              
                </div>

                <div class="col-md-3">
                <input id="tgl_beregu3" name="tgl_beregu3" type="text" placeholder="Tanggal Lahir" class="form-control input-md">
                </div>                
              </div>  
              <hr>                                    
          </fieldset>          

          <!-- Button (Double) -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-6">
              <input type="submit" name="submit" class="btn btn-lg btn-primary" value="Simpan Data">
              <button id="reset" type="reset" name="reset" class="btn btn-lg btn-default">Reset</button>
            </div>
          </div>        
        </form>              
      </div> <!-- modal-body -->
    </div> <!-- modal-content -->
  </div> <!-- modal-dialog -->
</div>

<?php
  // Input data Peserta

  if($_POST[submit])    
  {

    // Buat Array dengan id=isi kelas/kontingen dan value id kelas/kontingen, untuk konversi saat POST
    $kelas_id_conv    = array();
    $kont_id_conv    = array();

    $kelas_id         = $db->fetch_all("kelas_all");
    $kont_id          = $db->fetch_all("kontingen_all");
    foreach($kelas_id as $val){
      $kelas_id_conv[$val->isi_kelas] = $val->id_kelas;
    }
    foreach ($kont_id as $val) {
      $kont_id_conv[$val->isi_kontingen] = $val->id_kontingen;     
    }

    // Proses Input data Peserta
    $peserta    = new Database;
    $table      = 'peserta';

    // Serialkan data beregu dalam array(nama,tgl_lahir)
    $beregu     = array();
    for($i=1; $i<=3; $i++)
    {
      $beregu[$i]['nama'] = $_POST['beregu'.$i];
      $beregu[$i]['tgl_lahir'] = $_POST['tgl_beregu'.$i];
    }
    $info_beregu = serialize($beregu);

    $val_psrta  = array(
                        'nama'          => htmlentities($_POST[nama]),
                        'id_kontingen'     => $kont_id_conv[$_POST[kontingen]],                        
                        'berat_badan'   => $_POST[berat], 
                        'tgl_lahir'     => $_POST[tgl_lahir],
                        'waktu_input'   => date('Y-m-d h:m:s'),
                        'perguruan'     => $_POST[perguruan],
                        'jk'            => $_POST[jk],
                        'id_kelas'      => $kelas_id_conv[$_POST[kelas_pilih]],
                        'info_beregu'   => $info_beregu,
                        'input_by'      => $_SESSION[nama]
                         );
    $exec     = $peserta->insert($table,$val_psrta);
  } 
?>
<!-- END Modal kelas_add -->

    <!-- let's begin the script || JS Data Table Easy Config -->
    <script type="text/javascript">
     // Kelas Data Autocomplete
     var kelas_data = [];
     var kontingen_data = [];

    <?php 
      include_once "lib/config.php";
      $kelas_sel  = new Database;
      $kelas_q    = "SELECT * FROM kelas_all";
      $exec       = $kelas_sel->custom_query($kelas_q);
      foreach ($exec as $kelas_nama) {
        $kelas_n = $kelas_nama->isi_kelas;
    ?>
      kelas_data.push('<?php echo $kelas_n; ?>');
    <?php
        // echo $kelas_n;
      } // close foreach($exec)
    ?>

     $('#kelas_pilih').typeahead({        
        local: kelas_data
      });

      // kontingen Data Autocomplete
    <?php 
      include_once "lib/config.php";
      $kontingen_sel  = new Database;
      $kontingen_q    = "SELECT * FROM kontingen_all";
      $exec       = $kontingen_sel->custom_query($kontingen_q);
      foreach ($exec as $kontingen_nama) {
        $kontingen_n = $kontingen_nama->isi_kontingen;
    ?>
      kontingen_data.push('<?php echo $kontingen_n; ?>');
    <?php
        // echo $kelas_n;
      } // close foreach($exec)
    ?>

     $('#kontingen_pilih').typeahead({        
        local: kontingen_data
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

     // Data table
     $("#overall").dataTable({
           'bProcessing': true,
            'bServerSide': true,

            //disable order dan searching pada tombol aksi
                 "columnDefs": [ {
              "targets": [7],
              "orderable": false,
              "searchable": false

            } ],
            "ajax":{
              url :"data_overall.php",
            type: "post",  // method  , by default get
            //bisa kirim data ke server
            /*data: function ( d ) {
              
                      d.jurusan = "3223";
                  },*/
          error: function (xhr, error, thrown) {
            console.log(xhr);

            }
          },

        });


      // Munculkan Beregu Field bila di klik
      $('.req_kelas').change(function () {
          if($('#req_beregu').is(':checked')) {
              $('#field_beregu').show();
              $('#beregu1').attr('required','');
              $('#beregu2').attr('required','');
              $('#beregu3').attr('required','');
              $('#tgl_beregu1').attr('required','');
              $('#tgl_beregu2').attr('required','');
              $('#tgl_beregu3').attr('required','');
          } else {
              $('#field_beregu').hide();
              $('#beregu1').removeAttr('required','');
              $('#beregu2').removeAttr('required','');
              $('#beregu3').removeAttr('required','');
              $('#tgl_beregu1').removeAttr('required','');
              $('#tgl_beregu2').removeAttr('required','');
              $('#tgl_beregu3').removeAttr('required','');
          }
      }); 
    </script>

