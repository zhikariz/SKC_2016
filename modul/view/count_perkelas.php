<style>
  #perkelas3_filter{
    display: none;
  }
</style>
   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
            <div class="row row-centered">
        <h1> <span class="label label-danger">Jumlah Peserta > Kelas</span> <br><small>Kelas yang dipertandingkan</small></h1>        
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