<?php
//$uriget in index.php
include "lib/config.php";

$id 		 = $uriget[id_admin];
$admin 	 	 = new Database;

$table		 = "admin";
$where		 = "id_admin";

$admin_del = $admin->delete($table,$where,$id);
echo "
	<script type='text/javascript'>				
		alert('Data dihapus');
	</script>
	<meta http-equiv='refresh' content='0;url=./?".$link_manage_user."' />
";


?>