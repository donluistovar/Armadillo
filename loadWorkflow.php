<?php 
	session_start();
	include_once('helper.php');
	$filename=$_POST['workflow'];
	$workflow_id=0;
	if (isset($_POST['workflow_id'])) $workflow_id=$_POST['workflow_id'];
	
	echo loadWorkflow($filename,$workflow_id);
?>