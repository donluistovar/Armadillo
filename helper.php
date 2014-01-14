<?php
/**
 *  Armadillo Workflow Platform v2.0 - Online
 *  A simple pipeline system for phylogenetic analysis
 *  
 *  Copyright (C) 2009-2012  Etienne Lord
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 * 
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */	
	
///////////////////////////////////////////////////////////////////////////////
/// THIS FILES CONTAINS THE EXECUTION FUNCTION FOR ARMADILLO
///

// 
// The "User space" is define as usagers/".session_id()
//
	
	// Transforme un Array en une Table HTML 	
	Function variable_to_html($variable) {
		if ($variable === true) {
			return 'true';
		} else if ($variable === false) {
			return 'false';
		} else if ($variable === null) {
			return 'null';
		} else if (is_array($variable)) {
			$html = "<table border=\"1\">\n";
			$html .= "<thead><tr><td><b>KEY</b></td><td><b>VALUE</b></td></tr></thead>\n";
			$html .= "<tbody>\n";
			foreach ($variable as $key => $value) {
				$value = variable_to_html($value);
				$html .= "<tr><td>$key</td><td>$value</td></tr>\n";
			}
			$html .= "</tbody>\n";
			$html .= "</table>";
			return $html;
		} else {
			return strval($variable);
		}
	}	
		
		/* FROM http://stackoverflow.com/questions/5501427/php-filesize-mb-kb-conversion   */
		function filesize_formatted($size)
		{
			//$size = filesize($path);
			$units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
			$power = $size > 0 ? floor(log($size, 1024)) : 0;
			return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
		}
	
		function startsWith($haystack, $needle)
		{
			return !strncmp($haystack, $needle, strlen($needle));
		}

		function endsWith($haystack, $needle)
		{
			$length = strlen($needle);
			if ($length == 0) {
				return true;
			}

			return (substr($haystack, -$length) === $needle);
		}
	
	//<!----------------------------------------------------//
	// Load a file 
	//----------------------------------------------------->	
	Function loadFile($filename) {
	if (file_exists($filename)) {		
							//--WE READ TO COPY SINCE THE copy() function might be disable...
							$f=fopen($filename,'rb');
							$data='';
							while(!feof($f)) $data.=fread($f,1024);
							fclose($f); 
					return $data;
		} else {
			return "";
		}
	}
	
	//<!----------------------------------------------------//
	// Save to a file 
	//----------------------------------------------------->	
	Function saveFile($variable,$filename) {	 
	 $fh = fopen($filename,'w') or die("can't open file ".$filename);	
	 fwrite($fh, "$variable\n");	 
	 fclose($fh);
	}

	//<!----------------------------------------------------//
	// Save log (debug)
	//----------------------------------------------------->	
	Function saveLog($variable) {
	 $myFile = "usagers/".session_id()."/log.txt";
	 $fh = fopen($myFile, 'a') or die("can't open file ".$myFile);
	 fwrite ($fh, date('l jS \of F Y h:i:s A')); 
	 fwrite($fh, " $variable\n");	 
	 fclose($fh);
	 }
	
	//<!----------------------------------------------------//
	// Force redirect through writing to html
	//----------------------------------------------------->	
	Function redirect($page) {
		echo "<script type='text/javascript'>window.location = '$page';</script>";
		exit();
	}
	
	///////////////////////////////////////////////////////////////////
	/// Armadillo
	///Note: internal error, 
	
	//--Get the state of the workflow
	Function get_workflow_state() {
		$rep="usagers/".session_id();	
		$workflow_id=$rep.'/'.'workflow.db';
		$state=$rep.'/'.'state.txt';
		
		$cmd="java -jar Armadillo.jar webstate $workflow_id >$state"; 
		//echo $cmd;
		$retour = 0;
		system($cmd,$retour);
		
		//-- Reading the output			
		if ($retour==0) {
			$data=loadFile($state);
			$status=explode('\t',$data);
			return $status[0];
		} else {
			return "internal error";
		}
	}
	
	//--Load the first workflow into Armadillo
	Function create_workflow($workflow_file) {
		$rep="usagers/".session_id();	
		$workflow_id=$rep.'/'.'workflow.db';
		$state=$rep.'/'.'state.txt';
		
		$cmd="java -jar Armadillo.jar webcreate $workflow_id $workflow_file>$state"; 
		//echo $cmd;
		$retour = 0;
		echo system($cmd,$retour);	
		//-- Reading the output			
		if ($retour==0) {
			$data=loadFile($state);
			$status=explode('\t',$data);
			return $status[0];
		} else {
			return "internal error";
		}
	}
	
	//--Load the first workflow into Armadillo
	Function webinfo() {
		$rep="usagers/".session_id();	
		$workflow_id=$rep.'/'.'workflow.db';
		$state=$rep.'/'.'state.txt';
		
		$cmd="java -jar Armadillo.jar webinfo $workflow_id >$state"; 
		//echo $cmd;
		$retour = 0;
		system($cmd,$retour);	
		//-- Reading the output			
		if ($retour==0) {
			$data=loadFile($state);
			return $data;
		} else {
			return "internal error";
		}
	}
	 
	 //--Load the first workflow into Armadillo
	Function getLatestWorkflow() {
		$rep="usagers/".session_id();	
		$workflow_id=$rep.'/'.'workflow.db';
		$workflow=$rep.'/'.'workflow.txt';
		
		$cmd="java -jar Armadillo.jar getLatest $workflow_id 0 $workflow"; 
		//echo $cmd;
		$retour = 0;
		 system($cmd,$retour);	
		//-- Reading the output			
		if ($retour==0) {
			//$data=loadFile($state);
			return $workflow;
		} else {
			return "internal error";
		}
	}
	
	Function loadWorkflow($filename,$workflow_id) {
		$rep="usagers/".session_id();	
		$workflow_filename=$rep.'/'.$filename;
		$workflow_output=$rep.'/'.'workflow.txt';		
		if ($workflow_id==0) {
			$cmd="java -jar Armadillo.jar getLatest $workflow_filename 0 $workflow_output"; 
		} else {		
			$cmd="java -jar Armadillo.jar getWorkflow $workflow_filename $workflow_id $workflow_output"; 
		}
		//echo $cmd;
		$retour = 0;
		 system($cmd,$retour);	
		//-- Reading the output			
		if ($retour==0) {			
			return $workflow_output;
		} else {
			return "internal error";
		}
	}
	
	Function getListObject($type) {
		$rep="usagers/".session_id();	
		$workflow_id=$rep.'/'.'workflow.db';
		$output_filename=$rep.'/'.'list.txt';
		
		$cmd="java -jar Armadillo.jar list$type $workflow_id $output_filename"; 		
		$retour = 0;
		 system($cmd,$retour);	
		//-- Reading the output			
		if ($retour==0) {			
			echo loadFile($output_filename);
		} else {
			echo "internal error";
		}
	}
	
	//--Get the list of workflow in the workflow.db
	Function getListWorkflow() {
		getListObject("Workflow");		
	}
	
	Function getListWorkflowFilename($filename) {
		$rep="usagers/".session_id();	
		$workflow_id=$rep.'/'.$filename;
		$output_filename=$rep.'/'.'list.txt';
		
		$cmd="java -jar Armadillo.jar listWorkflowJSON $workflow_id $output_filename"; 		
		$retour = 0;		
		 system($cmd,$retour);	
		 if ($retour==0) {
			return loadFile($output_filename);
		 }
	}
	
	Function getListWorkflowFiles() {
		//--Return a list of workflow.db...
	}
	
	Function getObject($object_type,$object_id) {
		$rep="usagers/".session_id();	
		$workflow_id=$rep.'/'.'workflow.db';
		$output_filename=$rep.'/'.'object.txt';
		
		$cmd="java -jar Armadillo.jar get$object_type $workflow_id $object_id $output_filename"; 		
		$retour = 0;
		 system($cmd,$retour);	
		//-- Reading the output			
		if ($retour==0) {			
			echo loadFile($output_filename);
		} else {
			echo "internal error";
		}
	}
	
	Function RunWorkflow($f, $id) {
		$rep="usagers/".session_id();	
		echo $f;
		echo $rep;		
		$workflow_id=$rep.'/'.$f;
		$output_filename=$rep.'/'.'object.txt';
		$output_log=$rep.'/'.'log.txt';
		
		$cmd="java -jar Armadillo.jar $workflow_id $id >> $output_log"; 		
		echo "<br>".$cmd."<br>";
		$retour = 0;
		 system($cmd,$retour);	
		//-- Reading the output			
		if ($retour==0) {			
			//echo loadFile($output_filename);
		} else {
			echo "internal error";
		}
	}
	
	
	Function getObjectHtml($object_type,$object_id) {
		$rep="usagers/".session_id();	
		$workflow_id=$rep.'/'.'workflow.db';
		$output_filename=$rep.'/'.'object.txt';
		
		$cmd="java -jar Armadillo.jar getHtml$object_type $workflow_id $object_id $output_filename"; 		
		$retour = 0;
		 system($cmd,$retour);	
		//-- Reading the output			
		if ($retour==0) {			
			echo loadFile($output_filename);
		} else {
			echo "internal error";
		}
	}
	
	
	
?>