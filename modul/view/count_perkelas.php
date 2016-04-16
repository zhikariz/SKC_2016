<style>
  #perkelas3_filter{
    display: none;
  }
</style>
<?php 
  $count_perorangan = 0; // Jumlah Perorangan 
  $count_beregu     = 0; // Jumlah Beregu

  // Inisialisasi Mengeluarkan semua id kelas
  $arr_id_kelas     = array();

  $kelas            = new Database;
  $q_perorangan     = $kelas->custom_query("SELECT COUNT(peserta.id_peserta) AS Jml, kelas_all.* 
                                            FROM peserta INNER JOIN kelas_all 
                                            ON peserta.id_kelas=kelas_all.id_kelas 
                                            WHERE kelas_all.isi_kelas NOT LIKE '%Kata Beregu%'
                                            GROUP BY peserta.id_kelas");

  $q_beregu         = $kelas->custom_query("SELECT COUNT(peserta.id_peserta) AS Jml, COUNT(peserta.id_peserta) AS Jml_Regu, kelas_all.* 
                                            FROM peserta INNER JOIN kelas_all 
                                            ON peserta.id_kelas=kelas_all.id_kelas 
                                            WHERE kelas_all.isi_kelas LIKE '%Kata Beregu%'
                                            GROUP BY peserta.id_kelas");

  $q_id_kelas       = $kelas->custom_query("SELECT DISTINCT id_kelas FROM peserta");
  
  foreach ($q_perorangan as $perorangan) {
    $count_perorangan += $perorangan->Jml;
  }

  foreach ($q_beregu as $beregu) {
    $count_beregu += $beregu->Jml_Regu;
  }

  // Jumlah Semua
  $count_semua    = $count_beregu + $count_perorangan;


  // Gabungkan semua id_kelas
  foreach ($q_id_kelas as $keyid) {
    if(empty($keyid->id_kelas))
    {
      //pass
    }
    else
    {
      array_push($arr_id_kelas, $keyid->id_kelas);
    }
  }
  $id_kelas_all   = implode(",", $arr_id_kelas);  
  $id_kelas_all   = "(".$id_kelas_all.")";

  $q_empty_kelas       = "SELECT isi_kelas FROM kelas_all WHERE id_kelas NOT IN ".$id_kelas_all;
  $q_empty_kelas       = $kelas->custom_query($q_empty_kelas);
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
              Kelas yang kosong :
              <?php 
                foreach ($q_empty_kelas as $keyKelas) {
                  echo "<strong>".$keyKelas->isi_kelas."</strong>, ";
                }
              ?>
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