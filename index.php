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

		// 
		// The "User space" is define as usagers/".session_id()
		//
		
///////////////////////////////////////////////////////////////////////////////
/// No cache
///
echo '<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />';
		
///////////////////////////////////////////////////////////////////////////////
/// Gestion de session
///


if(isset($_REQUEST['action'])){
		//--Look for privilege here
		$operation = $_REQUEST['action'];			
		if ($operation=="upload") {		
				//echo phpinfo();
				echo "test";
				echo variable_to_html($_POST);
				echo variable_to_html($_FILES);
				echo variable_to_html($_REQUEST);
				echo variable_to_html($_GET);
				//--Do something with the file and load the new workflow...
				if (isset($_FILES['fileupload'])&&$_FILES['fileupload']['error']==0) {
					
				
					$filename="usagers/".session_id()."/".$_FILES['fileupload']["name"];			
				
                    move_uploaded_file($_FILES["fileupload"]["tmp_name"],$filename);					
						//--Set as current workflow
						$fp=fopen("usagers/".session_id()."/current_workflow.txt", 'w');
						fputs($fp, $_FILES['fileupload']["name"]);
						fclose($fp);
							
						if (endsWith($_FILES['fileupload']["name"],".db")) {
							$workflow="usagers/".session_id()."/workflow.db";
							$cmd="cp $filename $workflow";
							system($cmd,$val);
						}
						//loadWorkflow($filename,$workflow_id);
						
						//$cmd="cp test.db $workflow_id";
						//$rep="usagers/".session_id();	
						//$workflow_id=$rep.'/'.'workflow.db';
						
						//system($cmd,$val);
					
					
				}
				//exit();
				
		}
		
}


if (isset($_REQUEST['id'])) {
	
	} else {
		//--Create the session directory and clean-up
		$cmd="mkdir \"$rep\"";
		if (!is_dir($rep)) system($cmd,$val);
		//debug echo "$val $rep";
		//--If workflow don't exist, create the default workflow
		$state=get_workflow_state();
		
		//--We need to load the workflow from a list...
		
		//echo "<script>console.log($state);</script>";
		
		if ($state=="no workflow") {
			echo "no workflow";
			//exit();
			//$cmd="cp test.db $workflow_id";
			//system($cmd,$val);
			//--Etienne Lord - create a unique workflow from file
			//create_workflow('data/create_new.workflow');
		}	
		if ($state=="internal error") {
			//echo "Warning. Unable to create <b>user session</b> ";
		}
}

if (isset($_REQUEST['listfiles'])) {		
			error_reporting(E_ALL);
			$tmp=array();
			//--Use the client id
							
			 if ($handle = opendir("usagers/".session_id()."/")) {
				 $total=0;
				 $totalsize=0;
				
				while (false !== ($entry = readdir($handle))) {
					if ($entry != "." && $entry != "..") {
						$size=filesize("usagers/".session_id()."/".$entry);
						$total++;
						$totalsize+=$size;
						$path_parts = pathinfo($entry);
						array_push($tmp, array('filename'=>$path_parts['basename'],'extension'=>$path_parts['extension'], 'link'=>"usagers/".session_id()."/".$entry));
						//echo "$entry <br>";
					}
				}
				array_push($tmp, array('filename'=>'total', 'size'=>$totalsize));
				closedir($handle);
			 }
			echo json_encode($tmp);
			exit();
		 }

	include("index_mobile.php");
	
 
 
 //--This will launch build script and test some variables to be sure 
//-- Everything is set...
//include_once('test_server.php');
?>

