<?php
//$uriget in index.php
include "lib/config.php";

$id         = $uriget[id_perguruan];
$perguruan  = new Database;

$table 	    = "perguruan_all";
$col	      = "id_perguruan";
$val	      = $id;
$q 	        = $perguruan->fetch_single_row($table,$col,$val);

$isi	      = $q->isi_perguruan;

?>

<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1 class="page-header text-center text-primary">
        <span class="pull-right"> <span class="glyphicon glyphicon-pencil"></span></span>
        Edit Perguruan<small>  <?php echo $glob_event_name; ?></small>
        </h1>            
    </div>
</div>

<form class="form-horizontal" role="form" method="post" action="#">
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="isi">Nama Perguruan</label>  
    <div class="col-md-6">
    <input id="isi" name="isi" type="text" placeholder="Data Tersimpan: <?php echo $isi; ?>" class="form-control input-md" required="" value="<?php echo $isi; ?>">
      
    </div>
  </div>

  <!-- Button (Double) -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-6">
      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
      <button onclick="history.back()" id="reset" type="reset" name="reset" class="btn btn-default">Batal</button>
    </div>
  </div>        
</form>    

<?php
if(isset($_POST[submit])){
	$table_up	= "perguruan_all"; 
	$data_up	= array(
                        'isi_perguruan'          => $perguruan->repl_petik($_POST[isi])
                         );
	$prim_col	= "id_perguruan";
	// $id didefinisikan diatas;

	$perguruan 	= new Database;
	$up_perguruan = $perguruan->update($table_up,$data_up,$prim_col,$id);
	echo "
		<script type='text/javascript'>				
			alert('Data diupdate');
		</script>
		<meta http-equiv='refresh' content='0;url=./?".$link_manage_perguruan."' />
	";
}

?>