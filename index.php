<?php 
  // Login Cek
  error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);  
  include "lib/config.php";
  session_start();
  if(empty ($_SESSION['user']) and empty($_SESSION['password']))
  {
    include "login.php";
  }
  else {      
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sistem Informasi Pertandingan :: SOLOCUP 2016</title>


    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
    <!-- Datatable css -->
    <link href="assets/css/jquery.dataTables.css" rel="stylesheet">
    <link href="assets/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="assets/css/twitter-typeahead.css" rel="stylesheet">
    <link href="assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <style>
      <?php 
      if ( $_SESSION['status']=="admin") {
        echo "
           .pr-admin, .pr-drower, .pr-user
            {
              visibility: visible 
            }";
      }elseif ($_SESSION['status']=="drower") {
        echo "
            .pr-admin, .pr-user
            {
              visibility: hidden
            }

            .pr-drower
            {
              visibility: visible
            } ";
      }else{
        echo "
          .pr-admin, .pr-drower
          {
            visibility: hidden
          }
          .pr-user
          {
            visibility: visible
          } ";
        }
       ?>
      }
    </style>

  </head>
  <body>
    <!-- JS placed on top, prevent fail load on included page -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery-1.12.0.min.js"></script>

    <!-- datatables js -->
    <script src="assets/js/dataTables.bootstrap.min.js"></script>    
    <script src="assets/js/jquery.dataTables.min.js"></script>
    
    <!-- BS-3 Type Ahead | AutoComplete -->
    <script src="assets/js/bootstrap3-typeahead.min.js"></script>    

    <!-- BS-3 JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- BS-3 Datepicker -->
    <script src="assets/js/moment-with-locales.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.js"></script>
    <script>
        function confirmHapus(message)
        {
          window.confirm('Hapus Data ini?');
        }
    </script>

    <?php
      
      // Encrypt Module || AES 
      include "modul/enkripsi/function.php";

      // Base Url
      $base_uri             = "http://localhost/solocup2/";

      // Modul View
      $link_overall         = paramEncrypt("uri=view/overall"); // default page
      $link_count_peserta   = paramEncrypt("uri=view/count_perkelas"); // Jumlah Peserta Per Kelas
      $link_count_kontingen = paramEncrypt("uri=view/count_perkontingen"); // Jumlah Peserta Per Kontingen

      // Modul kontingen
      $link_manage_kontingen   = paramEncrypt("uri=kontingen/kontingen_view"); // Jumlah Peserta Per Kontingen    
      $link_search_kontingen   = paramEncrypt("uri=kontingen/kontingen_search"); // Jumlah Peserta Per Kontingen    

      // Modul Kelas
      $link_manage_kelas    = paramEncrypt("uri=kelas/kelas_view"); // Jumlah Peserta Per Kontingen

      // Modul Drowing
      $link_drowing         = paramEncrypt("uri=drowing/drowing_kelas"); // Drowing Per kelas > Manage
      $link_drowing_hasil    = paramEncrypt("uri=drowing/drowing_hasil"); // Drowing yang sudah jadi

      // Navigation Bar
      include("modul/view/navbar.php");
      
      // Dinamic Page            
      $uriget = decode($_SERVER['REQUEST_URI']);            
      $uri    = $uriget[uri];
      if(isset($uri))
      {                
        include("modul/".$uri.".php");
      }
      else
      {
        // default page        
        include("modul/view/overall.php");
      }
    ?>
    
    <div id="footer">
      <div class="container">
        <br>
        <p class="text-muted">&copy; 2016 Sistem Informasi Persiapan Pertandingan Karate. <br>
          <small>Create By : 
                  <a href="#">AxQuired24 (Albert S)</a> - 
                  <a href="#">Bangkit S</a> - 
                  <a href="#">Vani A.D.S</a>
          </small>
        </p>        
      </div>
    </div>

  </body>
</html>

<?php 
 } // Tutup Else Login
?>