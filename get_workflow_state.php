<?php 
	session_start();
	include_once('helper.php');
	$arr = array('state' => get_workflow_state());
   	echo json_encode($arr);
?>