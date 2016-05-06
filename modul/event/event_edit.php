<?php
//$uriget in index.php
include "lib/config.php";

$id = 1; // Manual id_event
$event = new Database;

$table= "syst_info";
$col	= "syst_id";
$val	= $id;
$q 	  = $event->fetch_single_row($table,$col,$val);

?>

<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1 class="page-header text-center text-primary">
        <span class="pull-right"> <span class="glyphicon glyphicon-pencil"></span></span>
        Edit Event<small>  <?php echo $glob_event_name; ?></small>
        </h1>            
    </div>
</div>

<form class="form-horizontal" role="form" method="post" action="#">
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="isi">Nama Sistem</label>  
    <div class="col-md-6">
    <input name="syst_name" type="text" placeholder="Data Tersimpan: <?php echo $glob_system_name; ?>" class="form-control input-md" required="" value="<?php echo $glob_system_name; ?>">      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="isi">Nama Event</label>  
    <div class="col-md-6">
    <input name="event_name" type="text" placeholder="Data Tersimpan: <?php echo $glob_event_name; ?>" class="form-control input-md" required="" value="<?php echo $glob_event_name; ?>">      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="isi">Waktu Event</label>  
    <div class="col-md-6">
    <input name="event_date" type="text" placeholder="Data Tersimpan: <?php echo $glob_event_date; ?>" class="form-control input-md" required="" value="<?php echo $glob_event_date; ?>">      
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
	$table_up	= "syst_info";
	$data_up	= array(
                        'syst_name'   => $event->repl_petik($_POST[syst_name]),
                        'event_name'  => $event->repl_petik($_POST[event_name]),
                        'event_date'  => $event->repl_petik($_POST[event_date])
                         );
	$prim_col	= "syst_id";
	// $id didefinisikan diatas;

	$event 	   = new Database;
	$up_event  = $event->update($table_up,$data_up,$prim_col,$id);
	echo "
		<script type='text/javascript'>				
			alert('Data disimpan');
		</script>
		<meta http-equiv='refresh' content='0;url=./?".$link_manage_event."' />
	";
}

?>