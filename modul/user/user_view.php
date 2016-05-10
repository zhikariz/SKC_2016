   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1 class="page-header text-center text-primary">
        <span class="pull-right"> <span class="glyphicon glyphicon-user"></span></span>
        Manage User <small> <?php echo $glob_event_name; ?></small> 
        <a href="#" data-toggle="modal" data-target=".modal-admin-add" title="Tambah User" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span>  </a>
        </h1>        
        <div class="col-md-12">
            <table id="user_view" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
               <tbody>                 
               </tbody>
            </table>
        </div> <!-- col-md-12 -->
    </div> <!-- row row-centered -->
</div> <!-- container -->

<!-- Modal kelas_add -->
<div class="modal fade modal-admin-add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Admin</h4>
      </div>    
      <div class="modal-body">
        <form method="post" action="#">

          <!-- Text input-->
          <div class="form-group row">
            <label class="col-md-4 control-label" for="usern">Username</label>  
            <div class="col-md-4">
            <input name="usern" type="text" placeholder="Username" class="form-control input-md" required="">
              
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group row">
            <label class="col-md-4 control-label" for="passw">Password</label>  
            <div class="col-md-4">
            <input name="passw" type="password" placeholder="Password" class="form-control input-md" required="">
              
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group row">
            <label class="col-md-4 control-label" for="isi_kelas">Nama Admin</label>  
            <div class="col-md-4">
            <input name="nama" type="text" placeholder="Nama Admin" class="form-control input-md" required="">
              
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group row">
            <label class="col-md-4 control-label" for="status">Status</label>  
            <div class="col-md-4">
            <select name="status" class="form-control input-md">
              <option value="admin">Admin</option>
              <option value="drower">Drower</option>
              <option value="user">User</option>
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
    </div>
  </div>
</div>

<?php
  include "lib/config.php";

  if($_POST[submit])
  {
    $admin    = new Database;
    $table    = 'admin';
    $admin_isi  = array(
              'user'=>$_POST[usern],
              'password'=>$_POST[passw],
              'nama'=>$_POST[nama],
              'status'=>$_POST[status]
               );

    $exec     = $admin->insert($table,$admin_isi);
  } 
?>
<!-- END Modal kelas_add -->

    <!-- let's begin the script || JS Data Table Easy Config -->
    <script type="text/javascript">
     $("#user_view").dataTable({
           'bProcessing': true,
            'bServerSide': true,

            //disable order dan searching pada tombol aksi
                 "columnDefs": [ {
              "targets": [4],
              "orderable": false,
              "searchable": false

            } ],
            "ajax":{
              url :"data_user_view.php",
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