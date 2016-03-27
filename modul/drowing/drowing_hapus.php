<?php
//$uriget in index.php
include "lib/config.php";

$id 		 = $uriget[id_drowing];
$drowing 	 = new Database;

$table		 = "drowing";
$where		 = "id_drowing";

$drowing_del = $drowing->delete($table,$where,$id);
echo "
	<script type='text/javascript'>				
		alert('Data dihapus');
	</script>
	<meta http-equiv='refresh' content='0;url=./?".$link_drowing_hasil."' />
";


?>