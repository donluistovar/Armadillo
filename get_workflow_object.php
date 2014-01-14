<?php 
	session_start();
	include_once('helper.php');	
	$object_type='';
	$object_id=0;
	if (isset($_POST['object_id'])) $object_id=$_POST['object_id'];
	if (isset($_POST['object_type'])) $object_type=$_POST['object_type'];	
	if (isset($_GET['object_id'])) $object_id=$_GET['object_id'];
	if (isset($_GET['object_type'])) $object_type=$_GET['object_type'];	
	
	getObjectHtml($object_type,$object_id);
?>