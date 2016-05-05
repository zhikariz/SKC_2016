<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1 class="page-header text-center text-primary">        
        <span class="pull-right"> <span class="glyphicon glyphicon-info-sign"></span></span>
          <?php echo $glob_event_name; ?> <small>Pusat Informasi</small>           
        </h1>            
        <div class="col-md-6 col-md-offset-3">
          <?php include "jml_peserta.php"; ?>
          <table class="table table-responsive table-bordered">
            <tr class="bg-primary">
              <td colspan="2"><strong>Informasi Jumlah Peserta</strong></td>
            </tr>
            <tr>
              <td>Jumlah Total Peserta</td>
              <td><?php echo $jml_peserta; ?> Orang</td>
            </tr>
            <tr>
              <td>Peserta Putra</td>
              <td><?php echo $jml_peserta_cwo; ?> Orang</td>
            </tr>
            <tr>
              <td>Peserta Putri</td>
              <td><?php echo $jml_peserta_cwe; ?> Orang</td>
            </tr>
            <tr class="bg-warning">
              <td colspan="2">Informasi Detail : Jumlah Peserta 
              <a href="./?<?php echo $link_count_peserta; ?>" class="link">Tiap Kelas</a> / 
              <a href="./?<?php echo $link_count_kontingen; ?>" class="link">Tiap Kontingen</a></td>
            </tr>
            <tr class="bg-primary">
              <td colspan="2"><strong>Informasi Pertandingan</strong></td>
            </tr>
            <tr>
              <td>Jumlah Total Peserta</td>
              <td><?php echo $jml_peserta; ?> Orang</td>
            </tr>
            <tr>
              <td>Peserta Putra</td>
              <td><?php echo $jml_peserta_cwo; ?> Orang</td>
            </tr>
            <tr>
              <td>Peserta Putri</td>
              <td><?php echo $jml_peserta_cwe; ?> Orang</td>
            </tr>            
          </table>
        </div>
    </div>
</div>