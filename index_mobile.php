
<!doctype html>
<html lang="en" xmlns:ng="http://angularjs.org" ng-app="myApp"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8">          
		<link rel="stylesheet" type="text/css" href="css/styles.css" />				
		<link rel="shortcut icon" href="data/favicon.ico" />  
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/controler/mainCtrl.js"></script>
		<!-- Import angular and bootsnip..
		<link rel="stylesheet" href="css/jasny-bootstrap.css" />
		<script type="text/javascript"  src="js/jasny-bootstrap.js"></script>. -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.0.1-p7/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.0.1-p7/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.0.1-p7/js/bootstrap.min.js"></script>		
	
		<!-- <script src="json2.js"></script> -->    
		<!-- session_id & debug-->
		<script>var session_id='<?php echo session_id(); ?>';</script>
        <?php //if (isset($_REQUEST['debug'])) 
		echo '<script> var debug=true;</script>'; ?>
		
        <script src="js/processing-1.4.1.js"></script>
        <script src="js/armadillo.js"></script>
			
		<script type="text/javascript">
			var myApp = angular.module('myApp',[]);			
		</script>	
		
    </head>
    
    <body  ng-controller='MainCtrl'>    
        <style>
            canvas {margin:  0px;padding: 0px;background-color: white;display: block;}
			 /* .workflow_wrapper { position: relative;} */
			 /* .workflow_wrapper .workflow {margin:  0px;padding: 0px; position: absolute;top: 20px;left: 20px;;display: inline;}*/
			
            .over { border: 2px dashed #000;}
            #popupHeader h2 {text-align: center;}
			
            .ui-icon-MultipleSequences {
				background-image: url("data/icons/icons.MultipleSequences_16x16.png");
			}
			#upload_queue {				
				overflow: auto;				
				padding: 0 100px 3px;
				width: 500px;
			}


        </style>
        <div data-role="page" id="one">
			<!-- Side panel -->
			<div data-role="panel" id="mypanel">	
				<div data-role="content" class="jqm-content ui-corner-bottom">
				
				
				</div>
			</div><!-- /panel -->
		
		
		
		
            <div data-role="header" style="padding:0px" data-theme="b">
                <a href="#help" id='mainHelp' data-role="button" data-icon="info" data-transition="fade">Help</a>
                <a href="javascript:showSaveLoad();" data-rel="popup" data-role="button" data-transition="fade">Workflow</a> 
                <h1>Armadillo Workflow Server <i>v2.0</i></h1>
            </div><!-- /header -->
            
            <div data-role="content" data-theme="a" style="margin:  0px;padding: 0px;">
            	<!-- Main canvas -->
				
				<canvas class="workflow" id="armadillo" data-processing-sources="armadillo.pjs util.pjs workflow_object_script_big.pjs workflow_object_if.pjs workflow_object_variable.pjs workflow_drag_connector.pjs workflow_object_aggregator.pjs workflow.pjs workflow_object_output_database.pjs workflow_object_output_big.pjs workflow_object_output.pjs workflow_connector_edge.pjs workflow_selection.pjs RunProgram.pjs workflow_properties_dictionnary.pjs pvertex.pjs workflow_properties.pjs workflow_object.pjs workflow_image.pjs workflow_connector.pjs" width="0" height="0"></canvas>         
				
				<!-- properties dialog -default-->
				<div data-role="popup" id="popupDialog" data-overlay-theme="a" data-theme="c" style="max-width:400px;" class="ui-corner-all">
					<div data-role="header" data-theme="a" class="ui-corner-top">
						<div id='popupHeader'><h2>Default</h2></div>
						<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
					<div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
						<h3 class="ui-title">Are you sure you want to delete this page?</h3>
						<div id='popupContent'><p>This action cannot be undone.</p></div>
						<a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c">Reset</a>    
						<a href="#" data-role="button" data-inline="true" data-rel="back" data-transition="flow" data-theme="b">Done</a>  
					</div>
					</div>

				<!-- properties dialog -ResetState-->
				<div data-role="popup" id="popupResetState" data-position-to="window" data-overlay-theme="a" data-theme="c" style="max-width:400px;" class="ui-corner-all">
					<div data-role="header" data-theme="a" class="ui-corner-top">
						<div id='popupHeader'><h2>Reset Workflow State?</h2></div>
						<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
					<div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
						<p style='text-align:center;'><h3 class="ui-title">Are you sure you want to reset the workflow state?</h3></p>
						<p style='text-align:center;'>This will remove all execution trace.</p>
						<p style='text-align:center;'>This action cannot be undone.</p>
						<p style='text-align:center;'>
						<a href="javascript:resetState();" data-role="button" data-inline="true"  data-theme="c">Reset</a>    
						<a href="#" data-role="button" data-inline="true" data-transition="flow" data-rel="back" data-theme="b">Cancel</a>  
						</p>
					</div>
				</div>
				
				<!-- properties dialog -popupDeleteAll-->
				<div data-role="popup" id="popupDeleteAll" data-position-to="window" data-overlay-theme="a" data-theme="c" style="max-width:400px;" class="ui-corner-all">
					<div data-role="header" data-theme="a" class="ui-corner-top">
						<div id='popupHeader'><h2>Remove all objects in the workflow?</h2></div>
						<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
					<div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
						<p style='text-align:center;'><h3 class="ui-title">Are you sure you want to remove all objects in the workflow?</h3>
						This will remove all execution trace.
						This action cannot be undone.						
						<a href="javascript:deleteAll();" data-role="button" data-inline="true"  data-theme="c">Yes</a>    
						<a href="#" data-role="button" data-inline="true" data-transition="flow" data-rel="back" data-theme="b">Cancel</a>  
						</p>
					</div>
				</div>
				
				<!-- properties dialog -popupProperties-->
				<div data-role="popup" id="popupProperties" data-position-to="window" data-overlay-theme="a" data-theme="c" style="max-width:600px;" class="ui-corner-all">
					<div data-role="header" data-theme="a" class="ui-corner-top">						
						<div id='popupHeader'><h2>Properties</h2></div>
						<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
					<div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">						
						<div id='listProperties' style="position:relative;width:500px;height:300px; overflow: scroll;"></div>
					</div>
				</div>
				
				<!-- properties dialog -popupInsertData (step 1) -->
				<div data-role="popup" id="popupInsertData" data-position-to="window" data-overlay-theme="a" data-theme="c" style="max-width:500px;" class="ui-corner-all">
					<div data-role="header" data-theme="a" class="ui-corner-top">
						<a href="#help" data-role="button" data-inline="true" data-icon="info" data-transition="fade" data-theme="b">Help</a>
						<div id='popupHeader'><h2>Insert Data</h2></div>
						<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
					<div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
						<h3 class="ui-title">Select the data type to insert into the workflow</h3>
						<ul data-role="listview" data-inset="true" style="min-width:400px;" data-theme="b">
							<!-- <li data-role="divider" data-theme="a">Popup API</li> -->
							<li><a href="javascript:addData2('MultipleSequences','test.fasta','');" >Sequences <i>(Unaligned sequences)</i></a></li>
							<li><a href="javascript:addData2('Alignment','test.fasta','');">Alignment <i>(Aligned sequences)</i></a></li>
							<li><a href="javascript:addData2('Tree','test.fasta','');">Tree <i>(Phylogenetic tree in newick format)</i></a></li>
							<li><a href="javascript:addData2('Matrix','test.fasta','');">Matrix <i>(text file)</i></a></li>
						</ul>
					</div>
				</div>
				
				<!-- properties dialog -popupInsertDataUpload (step 2)-->
				<div data-role="popup" id="popupInsertDataUpload" data-position-to="window" data-overlay-theme="a" data-theme="c" style="min-width:500px;max-width:500px;" class="ui-corner-all">
					<div data-role="header" data-theme="a" class="ui-corner-top">
						<a href="#help" data-role="button" data-inline="true" data-icon="info" data-transition="fade" data-theme="b">Help</a>
						<div id='popupHeader'><h2>Insert Data</h2></div>
						<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
					
					<div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
					
								<div data-role="collapsible" data-theme="e" data-content-theme="c" data-collapsed="false" data-collapsed-icon="info" data-expanded-icon="info" data-iconpos="right">
									<h3>Note</h3>
									<p>Select either data form an existing <b>dataset</b> or <b>upload new data</b> below. Alternatively, you can also insert an <b>empty object</b> into the workflow.</p>						
								</div>
								
								<div data-role="collapsible" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d" data-collapsed="false"  id='usingData'>
										<h3>Choose from existing data</h3>
										<div data-role='fieldcontain' style='width:800px;'>
											<label for='select-choice-10' class='select' id='labelTitle'>Choose unaligned sequences</label>
											<select name='select-choice-10' id='select-choice-10' multiple='multiple' data-native-menu='false' >								
											</select>
										</div>
								</div>	
								
								<div data-role="collapsible" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d" id='uploadData'>	
									<h3>Upload new data file (maximum file size is 20 mb)</h3>
									<!-- <form><input id="file_upload" name="file_upload" type="file" multiple="true"></form> -->
								</div>		
											
									<p style='text-align:center;'>	
									<a href="javascript:uploadFile2('','');" data-role="button" data-inline="true" data-transition="flow" data-theme="b" style='text-align:center;'>Insert</a>  
									<a href="javascript:addDataEmpty('','','');" id='emptyData' data-role="button" data-inline="true" data-transition="flow" data-theme="c" style='text-align:center;'>Insert empty object</a>  							
									</p> 						
					</div> <!--content popup -->						
</div>  
				
				
				   <!-- properties dialog -popupInsertDataUpload-->
				<div data-role="popup" id="popupInsertDataUpload" data-position-to="window" data-overlay-theme="a" data-theme="c" style="min-width:500px;max-width:500px;" class="ui-corner-all">
					<div data-role="header" data-theme="a" class="ui-corner-top">
						<a href="#help" data-role="button" data-inline="true" data-icon="info" data-transition="fade" data-theme="b">Help</a>
						<div id='popupHeader'><h2>Insert Data</h2></div>
						<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
					<div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
						<h3 class="ui-title" style='text-align:center;'>Select the files to insert into the workflow.<br>Note the maximum file size is (20 mb).</h3>
						  <form>
        					<!-- <input type="file" name="file_upload" id="file_upload" data-ajax="false" /><br>  -->
							 <!-- <input id="file_upload" name="file_upload" type="file" multiple="true">	-->
						</form>
								<div id="insert" data-role='fieldcontain'>
        						
								<label for='select-choice-0' class='select'></label>
								<select name='select-choice-0' id='select-choice-0'  data-native-menu='false'>
								
								</select>
								
								</div>
								
						<p style='text-align:center;'>	
						<a href="javascript:uploadFile2('','');" data-role="button" data-inline="true" data-transition="flow" data-theme="b" style='text-align:center;'>Insert</a>  
						<a href="javascript:addDataEmpty('','','');" id='emptyData' data-role="button" data-inline="true" data-transition="flow" data-theme="c" style='text-align:center;'>Insert empty</a>  							
						</p>
    				  
					</div>
				</div>			
				
			<!-- properties dialog -popupInsertProgram-->
			<div data-role="popup" id="popupInsertProgram" data-position-to="window" data-overlay-theme="a" data-theme="c" style="max-width:400px;" class="ui-corner-all">
									<div data-role="collapsible-set" data-theme="b" data-content-theme="c" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d" style="margin:0; width:400px;">
					<div data-role="header" data-theme="a" class="ui-corner-top">
						<a href="#help" data-role="button" data-inline="true" data-icon="info" data-transition="fade" data-theme="b">Help</a>
						<div id='popupHeader'><h2>Insert Program</h2></div>
						<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
					<div data-role="content" data-theme="b" class="ui-corner-bottom ui-content">
						<h3 class="ui-title">Select the program to insert into the workflow</h3>					
					<div data-role="collapsible" data-inset="false" data-iconpos="right">						
						<h2 title='Align your sequences'>Multiple Sequence Alignment (MSA)</h2>
						<ul data-role="listview">
							<li><a href="javascript:addProgram('data/properties/CLUSTALW2.properties');" data-rel="dialog" title='ClustalW'>ClustalW2</a></li>
							<li><a href="javascript:addProgram('data/properties/Muscle.properties');">Muscle</a></li>
							<li><a href="javascript:addProgram('data/properties/bali-phy.properties');" data-rel="dialog">BAli-phy</a></li>
						</ul>
					</div><!-- /collapsible -->
					<div data-role="collapsible" data-inset="false"  data-iconpos="right">
						<h2>Phylogenetic Tree Inference</h2>
						<ul data-role="listview">
							<li><a href="javascript:addProgram('data/properties/PhyML.properties');" data-rel="dialog">PhyML</a></li>
							<li><a href="javascript:addProgram('data/properties/RAxML.properties');" data-rel="dialog">RAxML</a></li>
							<li><a href="javascript:addProgram('data/properties/mrbayes.properties');" data-rel="dialog">MrBayes</a></li>
							<li><a href="javascript:addProgram('data/properties/Garli.properties');" data-rel="dialog">Garli</a></li>
							<li><a href="javascript:addProgram('data/properties/NJ.properties');" data-rel="dialog">BIONJ</a></li>
							<li><a href="javascript:addProgram('data/properties/DNAPars.properties');" data-rel="dialog">DNAPars (PHYLIP)</a></li>
							<li><a href="javascript:addProgram('data/properties/ProtPars.properties');" data-rel="dialog">PROTPars (PHYLIP)</a></li>
						</ul>
					</div><!-- /collapsible -->
					<div data-role="collapsible" data-inset="false"  data-iconpos="right">
						<h2>Horizontal Gene Transfert (HGT)</h2>
						<ul data-role="listview">
							<li><a href="javascript:addProgram('data/properties/HGT32.properties');" data-rel="dialog">HGT-Detector</a></li>						
							<li><a href="javascript:addProgram('data/properties/LatTrans.properties');" data-rel="dialog">LatTrans</a></li>
						</ul>
					</div><!-- /collapsible -->				
					<div data-role="collapsible" data-inset="false"  data-iconpos="right">
						<h2>Miscellaneous</h2>
						<ul data-role="listview">
							<li><a href="javascript:addProgram('data/properties/Comments.properties');" data-rel="dialog">Comments</a></li>												
						</ul>
					</div><!-- /collapsible -->
				</div>	
				</div>
			</div>	
				
			<!-- properties dialog -popupSaveLoad-->
                <div data-role="popup" id="popupSaveLoad" data-position-to="window" data-overlay-theme="a" data-theme="c" style="max-width:400px;min-width:400px;" class="ui-corner-all">
                    <div data-role="header" data-theme="a" class="ui-corner-top">
						<a href="#help" data-role="button" data-inline="true" data-icon="info" data-transition="fade" data-theme="b">Help</a>
							<div id='popupHeader'><h2>Workflow options</h2></div>
                        <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                    </div>
					
					<p style='text-align:center;'><label for="basic"><b>Workflow name</b></label>
					<input type="text" name="name" id="basic" value="" data-mini="true" /></p>					
					<div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
                    <h3 class="ui-title">Load a workflow</h3>
						
						<form method="POST" data-ajax="false" action="index.php?action=upload"  enctype="multipart/form-data">							
							<div class="fileinput fileinput-new" data-provides="fileinput">
								  <div class="input-group">
									<div class="form-control uneditable-input span3" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
									<span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input data-role="none" type="file" name="fileupload" id="fileupload"></span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								  </div>
								</div>	
								<!-- <input id="file_upload5" name="file_upload5" type="file" multiple="false"> -->
								
								<!-- <div class="fileinput fileinput-new" data-provides="fileinput">						  
										 <div id="image_fr" class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 300px;"></div>
										 
										  <div>
											<span class="btn btn-default btn-file"><span class="fileinput-new">Select français </span><span class="fileinput-exists">Change</span><input type="file" name="file_fr" data-role="none"></span>
											<a target="_self"  class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
										  </div>
								</div>	-->	
								
								 <input type="submit" class="btn btn-default" value="Load"> 
								 <!-- <button class="btn btn-large btn-primary" data-role='none'>Create publicite</button> -->
								<!-- <a href="javascript:loadWorkflow();" data-role="button" data-inline="true" data-transition="flow" data-theme="b" style='text-align:center;'>Load</a> --> 						
								<!-- <p style='text-align:center;'><a href="javascript:saveWorkflow();" data-role="button" data-inline="true"  data-theme="b" style='align:center'>Save</a> </p> -->
						</form>
							
						<!-- <h3 class="ui-title">Download the workflow and results</h3>   		-->
						<!-- <p style='text-align:center;'><a href="javascript:saveWorkflow();" data-role="button" data-inline="true"  data-theme="b" style='align:center'>Save</a> </p>-->
						<!-- <label for="basic"><b>Share or conserve this workflow</b></label> -->
						<!-- <input type="text" name="name" id="basic" value=<?php //echo "trex.labunix.uqam.ca/".session_id(); ?>" data-mini="true" /> -->  
                    </div>
                </div>
                
             <!-- properties dialog -popupInfo-->
                <div data-role="popup" id="popupInfo" class="ui-content" data-theme="e" data-position-to="window" style="max-width:500px;">
         			 <div data-role="header" data-theme="e" class="ui-corner-top" >
							<div id='popupHeader' ><h2>Warning</h2></div>
                      </div>
					<div data-role="content" id='popupInfoContent' data-theme="e">
					</div>	
						<a href="docs-transitions.html" data-role="button" data-theme="b" data-icon="alert" data-rel="back">Ok</a>   
				</div>
				
				    <!-- properties dialog -popupLoading-->
                <div data-role="popup" id="popupLoading" class="ui-content" data-theme="e" data-position-to="window" style="max-width:500px;">					
					<div data-role="content" id='popupLoadingContent' data-theme="e">
						Loading workflow
					</div>
				</div>
				
				
				  <!-- properties dialog -popupArmadillo-->
				<div id="popuplogo" data-role="popup" data-theme="none" data-position-to="window" align="center" data-shadow="false">
		  			<img src="data/images/splash1.png" class="popphoto">
				</div>
				
				    <!-- properties dialog -popupSimpleUpload-->
				<div data-role="popup" id="popupSimpleUpload" data-position-to="window" data-overlay-theme="a" data-theme="c" style="max-width:400px;" class="ui-corner-all">
					<div data-role="header" data-theme="a" class="ui-corner-top">
						<a href="#help" data-role="button" data-inline="true" data-icon="info" data-transition="fade" data-theme="b">Help</a>
						<div id='popupHeader'><h2>Upload file</h2></div>
						<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
					<div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
						<h3 class="ui-title" style='text-align:center;'>Select the files.<br> Note the maximum file size is (20 mb).</h3>
						  <form enctype='multipart/form-data'>
        					<input type="file" name="file_upload2" id="file_upload2" /><br>
						<p style='text-align:center;'>	
						<a href="javascript:uploadFile('','');" data-role="button" data-inline="true" data-transition="flow" data-theme="b" style='text-align:center;'>Insert</a>  						
						</p>
    				    </form>
					</div>
				</div>

				<!-- dialog -->
            	 <div data-role="popup" id="dialog" data-position-to="window" class="ui-corner-all" data-overlay-theme="b" class="ui-content"></div> 	
			
			<!--content -->
			</div> 
             <!-- footer -->
            <div data-role="footer" class="ui-bar" data-position="fixed" data-theme="b" align=center >
                <div data-role="controlgroup" data-type="horizontal">
					<!-- Saved workflow -->
					<!--<select name="select-choice-1" id="select-choice-1" data-native-menu="false" tabindex="-1" data-icon='arrow-u' title='Select the current workflow'>
						 <option value="0">Current workflow</option>		
					</select>-->	
					<a href="javascript:results();" data-role="button" data-icon="star" id='ResultsButton' title='Get the results associated with this workflow'>Results</a>
                    <a href="javascript:location.reload();" data-role="button" data-icon="refresh" title='Refresh the current workflow from server'>Reload</a>                  
  				   <a href="javascript:editSelected();" data-role="button" data-icon="star" id='EditButton' title='Edit the properties of the selected object'>Edit</a>
                    <a href="javascript:deleteSelection();" data-role="button" data-icon="delete" id='DeleteButton' title='Delete the selected objects'>Delete</a>
                    <?php if ($debug) echo '<a href="javascript:propertiesSelected();"  data-rel="popup" data-role="button" data-icon="plus" id="propertiesSelectedButton" title="Sho wproperties">Show properties</a>';?>
					<?php if ($debug) echo "<a href=\"javascript:(function(){var script=document.createElement('script');script.src='http://github.com/mrdoob/stats.js/raw/master/build/stats.min.js';document.body.appendChild(script);script=document.createElement('script');script.innerHTML='var interval=setInterval(function(){if(typeof Stats==\'function\'){clearInterval(interval);var stats=new Stats();stats.domElement.style.position=\'fixed\';stats.domElement.style.left=\'0px\';stats.domElement.style.top=\'0px\';stats.domElement.style.zIndex=\'10000\';document.body.appendChild(stats.domElement);setInterval(function(){stats.update();},1000/60);}},100);';document.body.appendChild(script);})();\"  data-rel='popup' data-role='button' data-icon='plus' id='statsButton' title='Show stats'>Stats</a>";?>		
					<!-- <a href="#popupDeleteAll" data-rel="popup" data-role="button" data-icon="delete" id='DeleteAllButton' title='Remove all objects in the workflow'>Clear All</a> -->
                    <!-- <a href="#popupResetState" data-rel="popup" data-role="button" data-icon="refresh" id='ResetButton' title='Reset the workflow execution status'>Reset Workflow state</a> -->
                     <a href="#mypanel"  data-rel="panel" data-role="button" data-icon="plus" id='openPanel' title='Insert/Upload new data into the workflow'>Data</a>
					<a href="#popupInsertData"  data-rel="popup" data-role="button" data-icon="plus" id='InsertDataButton' title='Insert/Upload new data into the workflow'>Insert Data</a>
                    <a href="#popupInsertProgram" data-rel="popup" data-role="button" data-icon="plus" id='InsertProgramButton' title='Insert new program into the workflow'>Insert Program </a>
                    <a href="#newickstring" data-role="button" data-icon="arrow-r" data-transition="fade" data-iconpos="right" id='RunButton' title='Execute the current workflow'>Run</a>
                
                </div>
            </div> <!-- footer -->
         
		 </div> <!-- end page one -->
		 
		 <!-- PAGE THREE RESULTS DATA -->
		 <div data-role="page" id="displayResults">   
				<div data-role="header" style="padding:0px" data-theme="b">
					<a href="#help" id='mainHelp' data-role="button" data-icon="info" data-transition="fade">Help</a>              
					<h1>Armadillo Workflow Server <i>v2.0</i></h1>
				</div><!-- /header -->
				 <div data-role="content" class="ui-body">				
					<div class="content-primary">
					<div id="results" ></div>				
					<a href="#" data-role="button" data-inline="true" data-transition="flow" data-rel="back" data-theme="a">Done</a>												
					<a href="javascript:send_to_trex(tree);" data-role="button" data-inline="true" data-transition="flow" data-theme="b" data-icon="forward" id='view_trex'>View tree on Trex server</a>												
					</div><!--end content primary-->				
				</div>
		</div><!-- end page displayResults -->
		 
		 <!-- PAGE TWO SELECT DATA -->
		 <div data-role="page" id="chooseData">   
			<div data-role="header" style="padding:0px" data-theme="b">
                <a href="#help" id='mainHelp' data-role="button" data-icon="info" data-transition="fade">Help</a>              
                <h1>Armadillo Workflow Server <i>v2.0</i></h1>
            </div><!-- /header -->
           <div data-role="content" class="ui-body">				
				<div class="content-primary">
					<div data-role="collapsible" data-corners="false" data-theme="b" data-content-theme="d" data-collapsed="false" data-iconpos="right">
						<h3>Choose data</h3>
						<p>Choose <b>existing data</b> below for the following object:</p>
						<a href="#" data-role="button" data-rel="back" data-mini="true" id="chooseDataimage" style='width:230px; align:center;'></a>
					</div>					
						<div data-role="collapsible" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d" data-collapsed="false"  id='usingData'>
							<h3>Choose from existing data</h3>
							<div data-role='fieldcontain' style='width:800px;'>
								<label for='select-choice-10' class='select' id='labelTitle'>Choose unaligned sequences</label>
								<select name='select-choice-10' id='select-choice-10' multiple='multiple' data-native-menu='false' >								
								</select>
							</div>
						</div>	
						<br>						
				    <div data-role="collapsible" data-theme="e" data-content-theme="c" data-collapsed="false" data-collapsed-icon="info" data-expanded-icon="info" data-iconpos="right">
						<h3>Note</h3>
						<p>To add new data to the workflow, please use the <img src='images/insert_data_button.png'/>  <b>button</b> from the main workflow view.</p>						
					</div>				
				<a href="#" data-role="button" data-inline="true" data-transition="flow" data-rel="back" data-theme="a">Done</a>												

				</div>		<!--end content primary-->				
			</div><!--end content buddy-->				
		</div><!-- end page chooseData -->
		
		
		
	</body>
</html>	          
