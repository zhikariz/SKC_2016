<style>
  #perkelas3_filter{
    display: none;
  }
</style>
<?php 
  $count_perorangan = 0; // Jumlah Perorangan 
  $count_beregu     = 0; // Jumlah Beregu

  $kelas            = new Database;
  $q_perorangan     = $kelas->custom_query("SELECT COUNT(peserta.id_peserta) AS Jml, kelas_all.* 
                                            FROM peserta INNER JOIN kelas_all 
                                            ON peserta.id_kelas=kelas_all.id_kelas 
                                            WHERE kelas_all.isi_kelas NOT LIKE '%Beregu%'
                                            GROUP BY peserta.id_kelas");

  $q_beregu         = $kelas->custom_query("SELECT COUNT(peserta.id_peserta) AS Jml, COUNT(peserta.id_peserta)/3 AS Jml_Regu, kelas_all.* 
                                            FROM peserta INNER JOIN kelas_all 
                                            ON peserta.id_kelas=kelas_all.id_kelas 
                                            WHERE kelas_all.isi_kelas LIKE '%Beregu%'
                                            GROUP BY peserta.id_kelas");
  
  foreach ($q_perorangan as $perorangan) {
    $count_perorangan += $perorangan->Jml;
  }

  foreach ($q_beregu as $beregu) {
    $count_beregu += $beregu->Jml_Regu;
  }

  // Jumlah Semua
  $count_semua    = $count_beregu + $count_perorangan;

?>
   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
            <div class="row row-centered">
        <h1> <span class="label label-danger">Jumlah Peserta > Kelas</span> <br>
              <small>              
              </small>
        </h1>        
        <br>  Jumlah Pertandingan : <strong><?php echo $count_semua; ?></strong> <br>
              Detail : <?php echo " Jumlah Perorangan : $count_perorangan // Jumlah Regu (Kata Beregu) : $count_beregu"; ?>
        <br>              
        <div class="col-md-12">
            <table id="perkelas3" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Jumlah</th>
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
     $("#perkelas3").dataTable({
           'bProcessing': true,
            'bServerSide': true,

            //disable order dan searching pada tombol aksi
                 "columnDefs": [ {
              "targets": [1],
              "orderable": true,
              "searchable": false

            } ],
            "ajax":{
              url :"data_perkelas.php",
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
    </script>