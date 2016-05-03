<?php
//$uriget in index.php
include "lib/config.php";

$id = $uriget[id_admin];
$admin = new Database;

$table 	= "admin";
$col	  = "id_admin";
$val	  = $id;
$q 	    = $admin->fetch_single_row($table,$col,$val);

$user	  = $q->user;
$pass   = $q->password;
$nama   = $q->nama;
$status = $q->status;


?>

<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1 class="page-header text-center text-primary">
        <span class="pull-right"> <span class="glyphicon glyphicon-pencil"></span></span>
        Edit User<small>  <?php echo $glob_event_name; ?></small>
        </h1>        
    </div>
    <form class="form-horizontal" role="form" method="post" action="#">

      <!-- Text input-->
      <div class="form-group row">
        <label class="col-md-4 control-label" for="usern">Username</label>  
        <div class="col-md-4">
        <input name="usern" type="text" value="<?php echo $user; ?>" placeholder="<?php echo $user; ?>" class="form-control input-md" required="">
          
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group row">
        <label class="col-md-4 control-label" for="passw">Password</label>  
        <div class="col-md-4">
        <input name="passw" type="password" value="<?php echo $password; ?>" placeholder="*****" class="form-control input-md" required="">
          
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group row">
        <label class="col-md-4 control-label" for="isi_kelas">Nama Admin</label>  
        <div class="col-md-4">
        <input name="nama" type="text" value="<?php echo $nama; ?>" placeholder="<?php echo $nama; ?>" class="form-control input-md" required="">
          
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group row">
        <label class="col-md-4 control-label" for="status">Status</label>  
        <div class="col-md-4">
        <select name="status" class="form-control input-md">
          <option value="<?php echo $status; ?>"><?php echo ucwords($status); ?></option>
          <?php 
            $status_ar  = array('admin','drower','user');
            foreach ($status_ar as $status_val) {
              if($status_val == $status)
                { 
                  // skip
                }
              else
              {
                echo "<option value='$status_val'>".ucwords($status_val)."</option>";
              }
            }
          ?>
        </select>
          
        </div>
      </div>                              
      <!-- Button (Double) -->
      <div class="form-group row">
        <label class="col-md-4 control-label" for="button1idsubmit"></label>
        <div class="col-md-4">
          <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
          <button type="reset" id="reset" name="reset" class="btn btn-default">Reset</button>
        </div>
      </div>      
    </form>        
</div>

<?php
if(isset($_POST[submit])){
	$table_up	= "kelas_all";
	$data_up	= array(
                        'isi_kelas'          => $_POST[isi]
                         );
	$prim_col	= "id_kelas";
	// $id didefinisikan diatas;

	$admin 	= new Database;
	$up_kelas = $admin->update($table_up,$data_up,$prim_col,$id);
	echo "
		<script type='text/javascript'>				
			alert('Data diupdate');
		</script>
		<meta http-equiv='refresh' content='0;url=./?".$link_manage_kelas."' />
	";
}

?>