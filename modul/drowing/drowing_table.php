<?php
    include "lib/config.php";
    include "modul/drowing/tb.php";
    $id_drowing_get   = $uriget[id_drowing];
    $data_extract     = $db->custom_query("SELECT * FROM drowing WHERE id_drowing='$id_drowing_get'");
    foreach ($data_extract as $data => $val) {
        $list_peserta = $val->list_peserta;
        $id_kelas     = $val->id_kelas;
    }
    // echo $list_peserta;

    $arr_peserta = unserialize($list_peserta);

    // Buat Array dengan id=isi kontingen dan value id kontingen, untuk konversi saat POST
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
?>
   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1> <a href="#" onclick="history.back()" class="link"><span class="glyphicon glyphicon-chevron-left"></span></a> Drowing <br><small><?php echo $kelas_val_conv[$id_kelas]; ?></small></h1>
        
        <?php
        // Pengeluaran Array Unserialize
        foreach ($arr_peserta as $pool => $data_ps) 
        {
            $jml_pool_ini = count($data_ps);

            //Kurangi jumlah apabila ada array kosong
            foreach ($data_ps as $key1 => $value1) 
            {        
                if($value1['id_peserta'] == ""){
                    $jml_pool_ini -= 1;
                }
                else 
                {
                    //pass
                }
            }                    
          
        ?>

        <h3 class="page-header">
           Pool : <?php echo $pool; ?> - <span class="label label-danger"><?php echo $jml_pool_ini; ?></span> Peserta
        </h3>
        <a href="./modul/drowing/drowing_print.php?id_drowing=<?php echo $id_drowing_get;?>&pool=<?php echo $pool;?>" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>  Print Bagan : Pool <?php echo $pool; ?> </a> <br><br>

        <div class="col-md-12">
            <table id="contoh3" class="table" cellspacing="0" border="1" width="100%">
                <thead>
                    <tr>
                        <th>POOL : <?php echo $pool; ?></th>
                        <th>POOL : <?php echo $pool; ?> // Nama</th>
                        <th>Kontingen</th>
                    </tr>
                </thead>
               <tbody>
                
                <?php
                    $tb_pake = ${tbnom.$jml_pool_ini};
                    $no_urut = 0;
                    foreach ($data_ps as $key => $value) {                                            
                ?>
                <tr>
                 <td><?php echo $tb_pake[$no_urut]; ?></td>
                 <td><?php echo $peserta_val_conv[$value['id_peserta']]; ?></td>
                 <td><?php echo $kont_val_conv[$value['id_kontingen']]; ?></td>
                </tr>

        <?php
                $no_urut += 1;
              } // CLOSE foreach ($arr_peserta as $pool => $data_peserta)?>
               </tbody>
            </table>
        </div> <!-- col-md-12 -->
                <?php }; // CLOSE foreach ($data_peserta as $key => $value) ?>

    </div> <!-- row row-centered -->
</div> <!-- container -->