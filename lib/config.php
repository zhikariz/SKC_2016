<?php
require_once('lib/aio_config.php');
require_once('lib/Database.php');
require_once('lib/DTable.php');

$db=new Database();
$datatable=New DTable();

if(!function_exists('handleException'))
{
	function handleException( $exception ) {
	  echo  $exception->getMessage();
	}
}

set_exception_handler( 'handleException' );
?>
