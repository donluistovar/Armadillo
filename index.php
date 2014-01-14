<?php 
@session_start();
include_once('helper.php');


///////////////////////////////////////////////////////////////////////////////
/// VARIABLES
	$rep="usagers/".session_id();
	$workflow_id=$rep.'/'.'workflow.db';
	$debug=false;     //--Activate or desactivate the debug mode
					  //--Display the properties of object instead of their content
	if ($debug) {
		echo "<script>var debug=true;</script>";		
		}

///////////////////////////////////////////////////////////////////////////////
/// No cache
///
echo '<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />';
		
///////////////////////////////////////////////////////////////////////////////
/// Gestion de session
///
if (isset($_REQUEST['id'])) {
	
	} else {
		//--Create the session directory and clean-up
		$cmd="mkdir \"$rep\"";
		if (!is_dir($rep)) system($cmd,$val);
		//debug echo "$val $rep";
		//--If workflow don't exist, create the default workflow
		$state=get_workflow_state();
		if ($state=="no workflow") {
			
			$cmd="cp test.db $workflow_id";
			system($cmd,$val);
			//--Etienne Lord - create a unique workflow from file
			//create_workflow('data/create_new.workflow');
		}	
		if ($state=="internal error") {
			//echo "Warning. Unable to create <b>user session</b> ";
		}
}

	include("index_mobile.php");
	
 
 
 //--This will launch build script and test some variables to be sure 
//-- Everything is set...
//include_once('test_server.php');
?>

