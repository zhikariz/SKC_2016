<?php
	require_once ( 'lib/config.php' );
	$event 		= new Database;
	$event_inf 	= $event->fetch_all('syst_info');
	foreach ($event_inf as $row_event) 
	{
		// Nama Event
		$GLOBALS["glob_event_name"] 	= $row_event->event_name;

		// Nama Sistem
		$GLOBALS["glob_system_name"] 	= $row_event->syst_name;	

		// Waktu Event
		$GLOBALS["glob_event_date"] 	= $row_event->event_date;

		// Notes Event
		$GLOBALS["glob_event_notes"] 	= $row_event->event_notes;

		// System Help
		$GLOBALS["glob_system_help"]	= $row_event->syst_help;

	}	


?>