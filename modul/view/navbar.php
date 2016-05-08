<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./?<?php echo $link_info_event; ?>"><?php echo $glob_event_name; ?></a>
    </div>
    <!-- <p class="navbar-text visible-lg">SOLOCUP 2016</p> -->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="./?<?php echo $link_overall; ?>"><span class="glyphicon glyphicon-th"></span> Semua Data</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Lihat Detail<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="./?<?php echo $link_info_event; ?>"><span class="glyphicon glyphicon-info-sign"> </span> Informasi Event</a></li>
            <li class="divider"></li>            
            <li><a href="./?<?php echo $link_count_peserta; ?>"><span class="glyphicon glyphicon-folder-open"> </span> Jumlah Per Kelas</a></li>
            <li><a href="./?<?php echo $link_count_kontingen; ?>"><span class="glyphicon glyphicon-globe"> </span> Jumlah Per Kontingen</a></li>            
          </ul>
        </li>
        <li class="dropdown pr-drower">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Drowing <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li class="pr-drower"><a href="./?<?php echo $link_drowing; ?>"><span class="glyphicon glyphicon-move"></span> Kelola Drowing</a></li>        
            <li class="divider"></li>
            <li class="pr-drower"><a href="./?<?php echo $link_drowing_hasil; ?>"><span class="glyphicon glyphicon-fullscreen"></span> Lihat Hasil Drowing</a></li>             
          </ul>
        </li>        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Manage <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li class="pr-admin"><a href="./?<?php echo $link_manage_event; ?>"><span class="glyphicon glyphicon-facetime-video"></span> Manage Event</a></li>
            <li class="pr-admin divider"></li>           
            <li class="pr-admin"><a href="./?<?php echo $link_manage_user; ?>"><span class="glyphicon glyphicon-user"></span> Manage User</a></li>
            <li class="pr-admin divider"></li>
            <li class="pr-admin"><a href="./?<?php echo $link_manage_kontingen; ?>"><span class="glyphicon glyphicon-globe"> </span> Manage Kontingen</a></li> 
            <li class="pr-admin divider"></li>
            <li class="pr-user"><a href="./?<?php echo $link_manage_kelas; ?>"><span class="glyphicon glyphicon-folder-open"> </span> Manage Kelas</a></li>
            <li class="divider pr-admin"></li>
            <li class="pr-admin"><a href="./?<?php echo $link_manage_perguruan; ?>"><span class="glyphicon glyphicon-flag"> </span> Manage Perguruan</a></li>                        
          </ul>
        </li>      
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-success"><?php echo ucwords($_SESSION['status']); ?></span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#"><span class="glyphicon glyphicon-user"> </span> <?php echo $_SESSION['nama']; ?></a></li>
            <li class="divider"></li>
            <li><a href="./?<?php echo $link_system_help; ?>"><span class="glyphicon glyphicon-question-sign"> </span> Petunjuk / Bantuan Sistem</a></li>
            <li class="divider"></li>            
            <li><a href="./login/logout.php"><span class="glyphicon glyphicon-log-out"> </span> Logout</a></li>
            <!-- <li class="divider"></li> -->
            <!-- <li><a href="#">Petunjuk</a></li> -->
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>