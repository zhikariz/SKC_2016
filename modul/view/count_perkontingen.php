<style>
  #contoh2_filter{
    display: none;
  }
</style>
   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1> Peserta > Kontingen <br><small>Detail data perkontingen</small></h1>
        <div class="col-md-12">
          <form action="./?<?php echo $link_search_kontingen; ?>" method="post" role="form">
            <div align="row center">            
              <div class="col-lg-6 col-lg-offset-3">
                <div class="input-group">
                  <input id="kontingen_pilih" type="text" name="cari" class="form-control" placeholder="Masukkan Nama Kontingen">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Cari !</button>
                  </span>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->  
          </form>
          <br><br>

            <table id="contoh2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Kontingen</th>
                        <th>Jumlah Tanding</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
               <tbody>                 
               </tbody>
            </table>
        </div> <!-- col-md-12 -->
    </div> <!-- row row-centered -->
</div> <!-- container -->

    <!-- let's begin the script || JS Data Table Easy Config -->
    <script type="text/javascript">
     $("#contoh2").dataTable({
           'bProcessing': true,
            'bServerSide': true,

            //disable order dan searching pada tombol aksi
                 "columnDefs": [ {
                    "targets": [1],
                    "orderable": true,
                    "searchable": false
                  }, {
                    "targets": [2],
                    "orderable": false,
                    "searchable": false
                  }],
            "ajax":{
              url :"data_perkontingen.php",
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

    // search Data Autocomplete
    var kontingen_data = [];

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
      $('#link_<?php echo $kontingen_nama->id_kontingen; ?>').click(function(){
        $('#kontingen_pilih').val('<?php echo $kontingen_n; ?>');
      })
    <?php
        // echo $kelas_n;
      } // close foreach($exec)
    ?>

     $('#kontingen_pilih').typeahead({        
        local: kontingen_data
      }); 

    </script>