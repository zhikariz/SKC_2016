   <!-- Page Content -->
<div class="container">
    <!-- Heading Row -->
    <div class="row row-centered">
        <h1 class="page-header text-center text-primary">        
        <span class="pull-right"> <span class="glyphicon glyphicon-facetime-video"></span></span>
          Manage Event  
          <a href="./?<?php echo $link_manage_event_edit; ?>" title="Edit Event Data" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span>  </a>
        </h1>
		<div class="col-md-8 col-md-offset-2">
			<table class="table table-responsive table-bordered">
				<tr class="bg-primary">
					<td colspan="2"><strong><?php echo $glob_system_name; ?></strong></td>
				</tr>
				<tr>
					<td>Nama Event</td>
				<td><?php echo $glob_event_name; ?></td>
				</tr>
				<tr>
					<td>Diselenggarakan pada</td>
					<td><?php echo $glob_event_date; ?></td>
				</tr>
				<tr class="active">
					<td><strong>Layanan & Bantuan Sistem</strong></td>
					<td>
						<a href="https://github.com/axquired24">AxQuired24</a> / 
						<a href="https://github.com/tanyakenapa10">Bangkit S</a> / 
						<a href="https://github.com/vanisaputra">Vani A.D.S</a>              
					</td>
				</tr>            
				<!-- divider -->
				<tr>
					<td colspan="2">-</td>
				</tr>
	            <tr class="bg-warning">
	              <td align="left" colspan="2"><strong>System Help :</strong> Untuk update sistem :
	                <ul type="square">
	                 <li>Logo Event berada di folder assets/image/event_logo.png <br><strong>Untuk mengganti logo: </strong>Ganti file tersebut dengan gambar baru berekstensi .PNG dengan tinggi <code>53pixel</code> dan lebar bebas</li>
	                 <li>Informasi Event dapat di edit dengan klik tombol edit berwarna kuning diatas</li>
	                </ul>
	              </td>
	            </tr>				
			</table>
		</div>
	</div>
</div>