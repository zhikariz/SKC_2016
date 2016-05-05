<?php 
  // Informasi Pertandingan : Jumlah Kelas
  $count_perorangan = 0; // Jumlah Perorangan 
  $count_beregu     = 0; // Jumlah Beregu

  // Inisialisasi Mengeluarkan semua id kelas
  $arr_id_kelas     = array();

  $kelas            = new Database;

  $q_kumite     = $kelas->custom_query("SELECT COUNT(peserta.id_peserta) AS Jml, kelas_all.* 
                                            FROM peserta INNER JOIN kelas_all 
                                            ON peserta.id_kelas=kelas_all.id_kelas 
                                            WHERE kelas_all.isi_kelas LIKE '%Kumite%'
                                            GROUP BY peserta.id_kelas");

  $q_kata_perorangan     = $kelas->custom_query("SELECT COUNT(peserta.id_peserta) AS Jml, kelas_all.* 
                                            FROM peserta INNER JOIN kelas_all 
                                            ON peserta.id_kelas=kelas_all.id_kelas 
                                            WHERE kelas_all.isi_kelas LIKE '%Kata Perorangan%'
                                            GROUP BY peserta.id_kelas");

  $q_kata_beregu         = $kelas->custom_query("SELECT COUNT(peserta.id_peserta) AS Jml, COUNT(peserta.id_peserta) AS Jml_Regu, kelas_all.* 
                                            FROM peserta INNER JOIN kelas_all 
                                            ON peserta.id_kelas=kelas_all.id_kelas 
                                            WHERE kelas_all.isi_kelas LIKE '%Kata Beregu%'
                                            GROUP BY peserta.id_kelas");
  $q_id_kelas       = $kelas->custom_query("SELECT DISTINCT id_kelas FROM peserta");

  foreach ($q_kumite as $kumite) {
    $count_kumite += $kumite->Jml;
  }

  foreach ($q_kata_perorangan as $kata_perorangan) {
    $count_kata_perorangan += $kata_perorangan->Jml;
  }

  foreach ($q_kata_beregu as $kata_beregu) {
    $count_kata_beregu += $kata_beregu->Jml_Regu;
  }

  // Jumlah Semua
  $count_semua    = $count_kata_beregu + $count_kata_perorangan + $count_kumite;

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
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1 class="page-header text-center text-primary">        
        <span class="pull-right"> <span class="glyphicon glyphicon-info-sign"></span></span>
          <?php echo $glob_event_name; ?> <small>Pusat Informasi</small>           
        </h1>            
        <div class="col-md-8 col-md-offset-2">
          <?php include "jml_peserta.php"; ?>
          <table class="table table-responsive table-bordered">
            <tr class="bg-primary">
              <td colspan="2"><strong><?php echo $glob_system_name; ?></strong></td>
            </tr>
            <tr>
              <td>Nama Event</td>
              <td><?php echo $glob_event_name; ?></td>
            </tr>
            <tr>
              <td>Diselenggarakan pada</td>
              <td><?php echo $glob_event_date; ?></td>
            </tr>
            <tr class="active">
              <td><strong>Layanan & Bantuan Sistem</strong></td>
              <td>
                <a href="https://github.com/axquired24">AxQuired24</a> / 
                <a href="https://github.com/tanyakenapa10">Bangkit S</a> / 
                <a href="https://github.com/vanisaputra">Vani A.D.S</a>              
              </td>
            </tr>            
            <!-- divider -->
            <tr>
              <td colspan="2">-</td>
            </tr>

            <tr class="bg-primary">
              <td colspan="2"><strong>Informasi Jumlah Peserta</strong></td>
            </tr>
            <tr>
              <td>Peserta Putra</td>
              <td><?php echo $jml_peserta_cwo; ?> Orang</td>
            </tr>
            <tr>
              <td>Peserta Putri</td>
              <td><?php echo $jml_peserta_cwe; ?> Orang</td>
            </tr>
            <tr class="active">
              <td><strong>Jumlah Total Peserta</strong></td>
              <td><strong><?php echo $jml_peserta; ?> Orang</strong></td>
            </tr>            
            <tr class="bg-warning">
              <td colspan="2">Informasi Detail : Jumlah Peserta 
              <a href="./?<?php echo $link_count_peserta; ?>" class="link">Tiap Kelas</a> / 
              <a href="./?<?php echo $link_count_kontingen; ?>" class="link">Tiap Kontingen</a></td>
            </tr>
            <!-- divider -->
            <tr>
              <td colspan="2">-</td>
            </tr>

            <tr class="bg-primary">
              <td colspan="2"><strong>Informasi Pertandingan</strong></td>
            </tr>
            <tr>
              <td>Kumite</td>
              <td><?php echo $count_kumite; ?></td>
            </tr>
            <tr>
              <td>Kata Perorangan</td>
              <td><?php echo $count_kata_perorangan; ?></td>
            </tr>
            <tr>
              <td>Kata Beregu</td>
              <td><?php echo $count_kata_beregu; ?></td>
            </tr>
            <tr class="active">
              <td><strong>Jumlah Pertandingan</strong></td>
              <td><strong><?php echo $count_semua; ?></strong></td>
            </tr>            
            <tr class="bg-warning">
              <td align="left" colspan="2">
                <p style="margin-left:30%" >
                  Kelas yang tidak dipertandingkan <strong>(Kosong)</strong> :
                  <ul style="margin-left:27%" type="square">
                    <?php 
                      foreach ($q_empty_kelas as $keyKelas) {
                        echo "<li>".$keyKelas->isi_kelas."</li>";
                      }
                    ?>
                  </ul>
                </p>
              </td>
            </tr>
            <!-- divider -->
            <tr>
              <td colspan="2">-</td>
            </tr>

            <tr class="bg-danger">
              <td align="left" colspan="2"><strong>NOTE :</strong> Kesalahan Jumlah Peserta bisa disebabkan oleh :
                <ul type="square">
                 <li>Kesalahan Input Kelas</li>
                 <li>Nama Lengkap di Kolom Tambahan untuk kelas Kata Beregu tidak terisi</li>
                 <li>Kesalahan Input Jenis Kelamin</li>
                 <li>Nama sama yang diinputkan tidak sama persis, typo, dsb. (Contoh : Bangkit Sanyoto & Bangkit Sanyot)</li>
                </ul>
              </td>
            </tr>            
          </table>
        </div>
    </div>
</div>