   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1 class="page-header text-center text-primary">
        <span class="pull-right"> <span class="glyphicon glyphicon-fullscreen"></span></span>
        Hasil Drowing<small> Klik untuk melihat bagan</small>
        </h1>    
        <div class="col-md-12">
            <table id="contoh3" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID Drowing</th>
                        <th>Kelas Drowing</th>
                        <th>Jumlah Peserta</th>
                        <th>Jumlah Pool</th>
                        <th>Opsi</th>
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
     $("#contoh3").dataTable({
           'bProcessing': true,
            'bServerSide': true,

            //disable order dan searching pada tombol aksi
                 "columnDefs": [ {
	                 	
	              "targets": [2,3,4],
	              "orderable": false,
	              "searchable": false
	            } ],
            "ajax":{
              url :"data_hasil_drowing.php",
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