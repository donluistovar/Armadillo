 /*! Armadillo Workflow- v2.0 - 2012-10-19
  * http://adn.bioinfo.uqam.ca/armadillo
  * Copyright (c) 2012 Etienne Lord
  */
	
    //////////////////////////////////////////////////////////////////////////////////////
    /// GLOBAL VARIABLES AND OBJECTS
    ///
 			
			   var bound=false;
			   var initialized=false;
			   var pjs = null;
			   var upload_data='';    //--Last upload type
			   var buffers=[];     //--Canvas buffers array
			   var drawingBuffer=0; //--Current drawing buffer
			   var canvas=null;	
			   var selected_properties=null; //--Current selected object (for popup)
			   var debug=false;
			   
	
	//-- Assign a fake session_id if not defined...
	
	if (typeof session_id === "undefined") {
		var session_id='demo';
	}
	
			
	
	//////////////////////////////////////////////////////////////////////////////////////
    /// BINDING FUNCTION FOR ARMADILLO
    /// -@pjs transparent=true; 
			   
			   function bindJavascript() {
				 
				 
				 pjs = Processing.getInstanceById('armadillo');
				 if(pjs!=null) {					
					pjs.bindJavascriptPjs(this);
					bound = true; 					
				 }				 
				 if(!bound&&!initialized) setTimeout(bindJavascript, 250);
			   }
			   
			   bindJavascript();			   
			   
			   function testLocalStorage()  
				{  
				if (localStorage)  
					return true; 
				else  
					return false;  
				}  
			   
				// function double_buffer() {
				 // if(!bound&&!initialized) return;				
					// //var p = Processing.instances[0];
					 // //var context = p.externals.context;
					// //var p2 = Processing.getInstanceById('canvas-id');
					// var canvas = pjs.externals.canvas;
					// //console.log(canvas);
					// // if (buffers[drawingBuffer]==null) {												
											
						// // //canvas= buffers[drawingBuffer].getContext('2d');
						// // if (drawingBuffer==0) {
							// // var canvas = document.getElementById('armadillo');
						// // } else {
							// // var canvas = document.getElementById('armadillo2');
						// // }
						// // buffers[drawingBuffer]=canvas;	
						
						// // //pjs.externals.canvas=canvas;
						// // //pjs.println('creating '+drawingBuffer);
						// // console.log(buffers[drawingBuffer]);
						// // drawingBuffer=1-drawingBuffer;
						// // //console.log(canvas);
					// // } else {
						// // //pjs.println('buffering for '+drawingBuffer);
						 
						 // // //buffers[0].style.visibility='visible';
						 // // //buffers[1].style.visibility='hidden';
						// // buffers[1-drawingBuffer].style.visibility='visible';
						// // buffers[drawingBuffer].style.visibility='hidden';
						// // // //canvas= buffers[drawingBuffer].getContext('2d');
						 // // pjs.externals.canvas=buffers[drawingBuffer];
						 // // drawingBuffer=1-drawingBuffer;
						 
					// // }
					// //pjs.println('Drawing buffer for '+drawingBuffer);
				// }
	
	//////////////////////////////////////////////////////////////////////////////////////
    ///  ARMADILLO FUNCTIONS
    ///
	 
			
				
				 
	 		 //--This function create the dialog for configuring the obj 
			   function showDialog(obj, x,y) {
					//--Show the correct page according to the object					
					// $("#popupSaveLoad").popup('close');
				
						
					 // $.ajax({
						  // type: "POST",
						  // data: {'workflow':filename},
						  // url: "loadWorkflow.php"
						// }).done(function( msg ) {
						  // if (msg!="internal error") {
						  // showPopup('Loading workflow '+filename);
						  	// pjs.loadWorkflow(msg,'Current workflow');
						  	// hidePopup();
						  // } else {
							// showPopupError(msg);
							// hidePopup();
						  // }
						// });	
					
					//$( "#chooseData #uploadData" ).trigger( "collapse" );	
					//$( "#chooseData #usingData" ).trigger( "expand" );	
					//$( "#chooseData #usingData").addClass('ui-disabled');	
					
					var type=obj.get('outputType');		
					
					var popup_text=pjs.generate_popupUploadDataOption(type);
					//alert(pjs.return_workflow_thumb());
					$("#chooseData #chooseDataimage").html('<img src="'+pjs.return_workflow_thumb()+'"/>');
					
					if (popup_text!="") {
						//$( "#chooseData #usingData" ).removeClass('ui-disabled');
					}
					//alert(popup_text);
					//$("#popupInsertDataUpload").popup();
					
					//alert($("#popupInsertDataUpload #select-choice-0").html());
					//$("#popupInsertDataUpload #insert").html("<div data-role='fieldcontain'><label for='select-choice-0' class='select'></label><select name='select-choice-0' id='select-choice-0'  data-native-menu='false'>"+popup_text+"</select></div>");
					
					$("#chooseData #select-choice-10").html(popup_text);					
					$.mobile.changePage('#chooseData', 'pop', true, true);
					
					// $.mobile.changePage('popupTest.html', {
						// transition : 'pop',
						// role       : 'dialog'//this means you don't have to declare `data-role="dialog"` on the page if you don't want to
					// });
					
					//$('#dialog').
					//$("#dialog").html('<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a><form><div style="padding:10px 20px;"><h3>Please sign in</h3><label for="un" class="ui-hidden-accessible">Username:</label><input type="text" name="user" id="un" value="" placeholder="username" data-theme="a" /><button type="submit" data-theme="b">Sign in</button></div></form>');					
					//$("#dialog").popup({title:name, position:[x-(150), y]});	
					//$( "#dialog" ).popup( "open" );
					//$("#popupDialog #popupContent").html("<div data-role='fieldcontain'><label for='select-choice-10' class='select'>Choose unaligned sequences</label><select name='select-choice-10' id='select-choice-10' multiple='multiple' data-native-menu='false'><option>Choose unaligned sequences</option><option value='1'>Searching Ncbi for Adiponectin on 2011-11-23 12:05:41 (12sequences) </option></select></div>");
					//$('#popupDialog #popupContent #select-choice-10').selectmenu('open');		
					//$('#popupDialog #popupContent #select-choice-10').selectmenu('refresh', true);
					//$("#popupDialog #popupContent").popup('refresh');
					//$( "#popupDialog h2" ).html(name);
					//$( "#popupDialog" ).popup( "open" );
					//console.dir(obj);	
			   }
		
				function deleteSelection() {
					pjs.deleteSelected();
				}
				 
			    function deleteAll() {
					pjs.deleteAll();
					$( "#popupDeleteAll" ).popup( "close" );
				}
		
				function resetState() {
					pjs.resetState();
					$( "#popupResetState" ).popup( "close" );
				}
				
				function editSelected() {
					pjs.editSelected() ;
				}
				
				function showSaveLoad() {					
					//$("#popupSaveLoad #basic").val(pjs.getName());
					$("#popupSaveLoad").popup('open');
				}
				
				function loadWorkflow(filename) {
					
					$("#popupSaveLoad").popup('close');
				
						
					 $.ajax({
						  type: "POST",
						  data: {'workflow':filename},
						  url: "loadWorkflow.php"
						}).done(function( msg ) {
						  if (msg!="internal error") {
						    showPopup('Loading workflow '+filename);
						  	pjs.loadWorkflow(msg,'Current workflow');
						  	hidePopup();
						  } else {
							showPopupError(msg);
							hidePopup();
						  }
						});	
				
				
				}
				
				function saveWorkflow() {					
					//--Send workflow to the server
					var t=pjs.saveWorkflow();					
					 $.ajax({
						  type: "POST",
						  url: "save_workflow.php",
						  data: {"workflow":t}
						}).done(function( msg ) {
						  openWebPage(msg);
						});	
					
				}
				
				function send_to_trex(tree) {
					var http='http://132.208.143.25/~trex/send.php?newick='+tree;
					window.open(http, "_blank");
				}
				
				function get_webinfo() {								
					 $.ajax({
						  type: "GET",
						  url: "get_workflow_webinfo.php"
						}).done(function( msg ) {
						  openWebPage(msg);
						});	
					
				}
				
				function get_workflow_latest() {					
						
						showPopup('Loading current workflow');	
					//--Load workflow listing
					$.ajax({
								  type: "GET",
								  url: "get_workflow_list.php"
								}).done(function( msg ) {										
										$("#select-choice-1").html(msg);
										$("#select-choice-1").selectmenu('refresh', true);
										
								});
							
					//--Get latest workflow
					 $.ajax({
							  type: "GET",
							  url: "get_workflow_latest.php"
							}).done(function( msg ) {
							  if (msg!="internal error") {
								//--Load the workflow
								pjs.loadWorkflow(msg,'Current workflow');							
								//--Setup the different workflow list
								hidePopup();
							  } else {
								showPopupError(msg);
								hidePopup();
							  }
							});	
					
				}
				
				function getWorkflowState() {									
					 $.ajax({
						  type: "GET",
						  url: "get_workflow_state.php"
						}).done(function( msg ) {
						  var obj = jQuery.parseJSON(msg);						
						  if (obj.state=="ready") {
						  		 $('#RunButton').removeClass('ui-disabled');
						  		 get_workflow_latest();
						  } else {
						  	//--Test for any error...							
						   $.ajax({
						 		 type: "GET",
						 		 url: "test_server.php"
								}).done(function(msg) { showPopupError(msg); });
						  }	
						});	
					
				}
				
				function openWebPage(data) {
					 var workflow =  window.open('','Workflow windows','width=600,height=600');
						 var html = '<html><head><title>Workflow</title></head><body>'+data+'</body></html>';
						 workflow.document.open();
						 workflow.document.write(html);
						 workflow.document.close();	
				}
				
				function setEditButton(mode) {
					if (mode==true) {
						 $('#EditButton').removeClass('ui-disabled');			
					} else {
						 $('#EditButton').addClass('ui-disabled');		
					}
				}
				
				function setDeleteButton(mode) {
					if (mode==true) {
						 $('#DeleteButton').removeClass('ui-disabled');
					} else {
						 $('#DeleteButton').addClass('ui-disabled');
					}
				}
				
				function addProgram(filename) {
					pjs.addProgram(filename);
					$( "#popupInsertProgram" ).popup( "close" );
				}
				
				function addDataEmpty(type,filename,parent) {
					pjs.addData(type,"",0);					
					$.mobile.changePage('#one', 'pop', true, true);
				}
				
				function showProperties(properties) {	
					
					//--CASE 1. SHOW properties
					if (typeof debug !== 'undefined' && debug==true) {
						$("#popupProperties h2").html(properties.getName()+" properties");
						$("#popupProperties #listProperties").html(properties.getHtmlProperties());					
						$("#popupProperties").popup("open");
					} else if (properties.isSet('EditorWeb')) {
						
						//--Set the selected properties
						selected_properties=properties;						
					   $.mobile.changePage(properties.get('EditorWeb'));					
					}
					//--CASE 2. SHOW result 
					else {
						var type=properties.get('outputType');	
						var object_id=properties.get('output_'+type.toLowerCase()+'_id');
						var upload={'object_type':type, 'object_id':object_id};						
						$.mobile.loading( 'show'); 
						$.ajax({
								  type: "POST",
								  data: upload, 
								  url: "get_workflow_object.php"
								}).done(function( msg ) {										
										$("#displayResults #results").html(msg);
										if (type == 'Tree') {											
											$("#displayResults #view_trex").attr("href","javascript:send_to_trex('"+msg+"');");
											$("#displayResults #view_trex").removeClass('ui-disabled');
										} else {
											$("#displayResults #view_trex").addClass('ui-disabled');
										}
										$.mobile.changePage('#displayResults', 'pop', true, true);
										
										
								}).error(function(msg) {
									console.log(msg);
								});
					}
					
				}
				
				function debugUpload() {
					$('#file_upload').uploadifive('debug');
				}
				
				function addData2(type,filename,parent) {
					//alert("add data");
					
					$( "#popupInsertData").popup( "close" );
					
					var popup_text=pjs.generate_popupUploadDataOption(type);
					//alert(popup_text);
					//$("#popupInsertDataUpload").popup();
					$("#popupInsertDataUpload h2").html(type);		
					//alert($("#popupInsertDataUpload #select-choice-0").html());
					//$("#popupInsertDataUpload #insert").html("<div data-role='fieldcontain'><label for='select-choice-0' class='select'></label><select name='select-choice-0' id='select-choice-0'  data-native-menu='false'>"+popup_text+"</select></div>");
					
					$("#popupInsertDataUpload #select-choice-0").html(popup_text);
					$("#popupInsertDataUpload #insert").trigger( "create" );
					//$("#popupInsertDataUpload #select-choice-0").selectmenu('data-native-menu='false').trigger('create');
					//$("#popupInsertDataUpload #select-choice-0").selectmenu();
					// $( "#popupInsertDataUpload #uploadData" ).trigger( "collapse" );	
					// $( "#popupInsertDataUpload #usingData" ).trigger( "collapse" );	
					// $( "#popupInsertDataUpload #usingData").addClass('ui-disabled');	
					
					
					//$("#popupInsertDataUpload #select-choice-0").selectmenu('refresh');
					//$("#popupInsertDataUpload #select-choice-0").selectmenu('refresh', true);
					
					//$("#popupInsertDataUpload #select-choice-0").appendTo( ".ui-page" ).trigger( "refresh" );
					//$("#popupInsertDataUpload #select-choice-0").selectmenu('open');
					$("#popupInsertDataUpload #emptyData").attr("href","javascript:addDataEmpty('"+type+"','','');");					
					//$("#popupInsertDataUpload #emptyData").text("Insert empty "+type);
					//$('#popupInsertDataUpload #emptyData').button('refresh');
					upload_data={ 'type' : type, 'object_id':'0', 'session_id':session_id};
					//console.dir(upload_data);
					// $('#popupInsertDataUpload #file_upload').uploadifive({
						// 'removeCompleted' : true,
						// 'uploadScript' : 'uploadify/uploadify.php',
						// 'checkScript' : 'uploadify/check-exists.php',	
						// 'multi'        : false,						
						// 'queueSizeLimit' : 1,
						// 'wmode'          : 'transparent',
						// 'fileSizeLimit' : '20MB',
						// 'auto':false,
						// 'method'   : 'post',
						// 'formData' : upload_data,
						// 'onSelectError' : function() {
							// alert('The file ' + file.name + ' returned an error and was not added to the queue.');
						// },
						// 'onFallback' : function() {
							// alert('Error. Unable to upload files. Please contact the administrator.');
						// },
						// 'onCancel' : function(file) {
							// //alert('The file ' + file.name + ' was cancelled.');
						// },
						// 'onUploadComplete' : function(file, data) {							
							// try {
							// var obj = jQuery.parseJSON(data);							
							// var obj_id=$('#popupInsertDataUpload option:selected').text();
							// $("#popupInsertDataUpload").popup('close');						
							// pjs.addData(obj.type,obj.name,obj_id);
							// $("#popupInsertDataUpload #file_upload").uploadifive('destroy');							
							// } catch(exception) {$("#popupInsertDataUpload").popup('close');	}
						// },
						 // 'onError'      : function(errorType) {
							// //alert('The error was: ' + errorType);
						// },
						// 'onCheck'      : function(file, exists) {							
							// if (exists) {
								// //alert('The file ' + file.name + ' exists on the server.');
							// }
						// }
					// });
					// setTimeout( function(){ $( '#popupInsertDataUpload' ).popup( 'open' ) }, 100 );					
				 }
				
				
				function addData(type,filename,parent) {
					
					var popup_text=pjs.generate_popupUploadDataOption(type);					
					 $("#chooseUpload h2").html(type);							
					// $("#popupInsertDataUpload #select-choice-0").html(popup_text);
					// $("#popupInsertDataUpload #insert").trigger( "create" );					
					// $("#popupInsertDataUpload #select-choice-0").selectmenu('refresh');
					// $("#popupInsertDataUpload #select-choice-0").selectmenu('refresh', true);
					 $("#chooseUpload #emptyData").attr("href","javascript:addDataEmpty('"+type+"','','');");					
					upload_data={ 'type' : type, 'object_id':'0', 'session_id':session_id};					
					//console.dir(upload_data);
					//console.dir($('#chooseUpload #file_upload'));
					$( "#chooseUpload #uploadData" ).trigger( "collapse" );	
					$( "#chooseUpload #usingData" ).trigger( "collapse" );	
					$( "#chooseUpload #usingData").addClass('ui-disabled');	
										
					var popup_text=pjs.generate_popupUploadDataOption(type);
					
					//$("#chooseData #chooseDataimage").html('<img src="'+pjs.return_workflow_thumb()+'"/>');
					$("#chooseUpload #select-choice-10").html(popup_text);
					$.mobile.changePage('#chooseUpload', 'pop', true, true);
				}
				
				
				
				function showPopupError(text) {
				
					$("#popupInfo #popupInfoContent").html(text);
					$("#popupInfo").popup({ history: false});
					$("#popupInfo").popup('open');
				}
				
				function showPopup(text) {
					
					$("#popupInfo #popupLoadingContent").html(text);
					$("#popupLoading").popup({ history: false});
					$("#popupLoading").popup('open');		
				}
				
				function hidePopup() {
					$("#popupLoading").popup('close');		
				}
				
				function showPopuplogo(){
					$("#popuplogo").popup({ history: false});
					$("#popuplogo").popup('open');	
				}
				
				function hidePopuplogo(){
					$("#popuplogo").popup('close');		
				}
				
				function showBubble(text, element) {
					$(element).CreateBubblePopup({
									position : 'top',
									align	 : 'left',
									alwaysVisible:true,
									innerHtml: text,
									innerHtmlStyle: {
														color:'black', 
														'text-align':'center'
													},					
									themeName: 	'all-yellow',
									themePath: 	'jquerybubblepopup-themes'
								 
								});
						$(element).ShowBubblePopup();	
						//$(element).FreezeBubblePopup();
						
				}
				
				function uploadFile(type, filename) {					
					//$('#chooseUpload #file_upload').uploadifive('upload');					
				}
				
				function uploadFile2(type, filename) {										
					//$('#popupInsertDataUpload #file_upload').uploadifive('upload');					
				}
				
				function uploadWorkflow() {
					//$('#file_upload2').uploadifive('upload');					
				}

				function uploadData(type, filename) {
					//$('#file_upload3').uploadifive('upload');
					
				}
				
	//////////////////////////////////////////////////////////////////////////////////////
    /// JQUERY
    ///
			$(document).bind('mobileinit',function(){
				$.mobile.selectmenu.prototype.options.nativeMenu = false;
			});
				   
		 	$(document).bind('pageinit', function(){	
				
				$('.workflow').dblclick(function() {
				  if (pjs!=null) {					
					pjs.double_clicked(true);
					//pjs.println(pjs.double_click+" "+pjs.armadillo.simplegraph);
					
				  }
				});
				//--Upload data
				// $('#chooseUpload #file_upload').uploadifive({
						// 'removeCompleted' : true,
						// 'uploadScript' : 'uploadify/uploadify.php',
						// 'checkExisting' : 'uploadify/check-exists.php',						
						 // 'wmode'          : 'transparent',
						// 'fileSizeLimit' : '20MB',
						// 'auto':false,
						// 'method'   : 'post',
						// 'formData' : upload_data,
						// 'onSelectError' : function() {
							// alert('The file ' + file.name + ' returned an error and was not added to the queue.');
						// },
						// 'onCancel' : function(file) {
							// alert('The file ' + file.name + ' was cancelled.');
						// },
						// 'onUploadComplete' : function(file, data) {
							// console.dir(data);
							// var obj = jQuery.parseJSON(data);							
							// var obj_id=$('#chooseUpload #popupInsertDataUpload option:selected').text();							
							// pjs.addData(obj.type,obj.name,obj_id);
							// $.mobile.changePage('#one', 'pop', true, true);
						// },
						 // 'onError'      : function(errorType) {
							// alert('The error was: ' + errorType);
						// },
						// 'onCheck'      : function(file, exists) {
							// alert('possible exists');
							// if (exists) {
								// alert('The file ' + file.name + ' exists on the server.');
							// }
						// }
					// });
				
				
				//--Upload workflow	
				// $('#file_upload2').uploadify({
						// 'removeCompleted' : true,
						// 'multi'    : false,
						// 'cancelImage':'images/uploadify-cancel.png',
						// 'swf'      : 'uploadify/uploadify.swf',
						// 'uploader' : 'uploadify/uploadify.php',
						// 'checkExisting' : 'uploadify/check-exists.php',
						// 'debug'    : true,
						// 'wmode'          : 'transparent',
						// 'fileSizeLimit' : '100MB',
						// 'auto':false,
						// 'formData':	{ 'type' : 'Workflow', 'object_id':'0', 'session_id':session_id},
						// 'method'   : 'post',						
						// 'onSelectError' : function() {							
						// },
						// 'onCancel' : function(file) {
							// //alert('The file ' + file.name + ' was cancelled.');
						// },
						// 'onUploadSuccess' : function(file, data, response) {													
							// var obj = jQuery.parseJSON(data);
						
							// //--load workflow
							// setTimeout( function(){ loadWorkflow(obj.name); }, 100 );			
													
							// },
						// 'onUploadError' : function(file, errorCode, errorMsg, errorString) {
							
						// },
						// 'onCheck'      : function(file, exists) {
							// if (exists) {
								// alert('The file ' + file.name + ' exists on the server.');
							// }
						// }
					// });
				
				// <form method="POST" enctype="multipart/form-data" action="fup.cgi">
// File to upload: <input type="file" name="upfile"><br>
// Notes about the file: <input type="text" name="note"><br>
// <br>
// <input type="submit" value="Press"> to upload the file!
// </form>
				
				//--Upload data
				// $('#file_upload3').uploadifive({
						// 'removeCompleted' : true,
						// 'multi'    : false,
						// 'cancelImage':'images/uploadify-cancel.png',						
						// 'uploadScript' : 'uploadify/uploadify.php',
						// 'checkExisting' : 'uploadify/check-exists.php',
						// 'buttonText'   :'SELECT',
						// 'debug'    : false,
						// 'wmode'          : 'transparent',
						// 'fileSizeLimit' : '100MB',
						// 'queueSizeLimit' : 1,
						// 'queueID':'upload_queue',
						// 'auto':false,
						// 'formData':	{ 'type' : 'Alignement', 'object_id':'0', 'session_id':session_id},
						// 'method'   : 'post',						
						// 'onSelectError' : function() {							
						// },
						// 'onCancel' : function(file) {
							// //alert('The file ' + file.name + ' was cancelled.');
						// },
						// 'onUploadSuccess' : function(file, data, response) {													
							// var obj = jQuery.parseJSON(data);						
							// //--load workflow
							// alert(obj.armadillo_filename);
							// var obj_id=$('#popupInsertDataUpload option:selected').text();
							// $("#popupInsertDataUpload").popup('close');
							// //console.log(obj_id);
							// pjs.addData(obj.type,obj.name,obj_id);
						// },
						// 'onUploadError' : function(file, errorCode, errorMsg, errorString) {
							// alert('error:'+errorCode);
						// },
						// 'onAddQueueItem' : function(file) {							
							// $('#chooseData #textarea').addClass('ui-disabled');	
						// },
						// 'onCancel': function() {
							// $('#chooseData #textarea').removeClass('ui-disabled');	
						// }
					// });
				
				//--Disable some buttons if not selected
				$('#EditButton').addClass('ui-disabled');
				$('#DeleteButton').addClass('ui-disabled');
			    $('#RunButton').addClass('ui-disabled');
				// $('#displayResults #view_trex').bind( "click", function(event, ui) {					
				// });
				
				//--Events
				$("#select-choice-1").bind( "change", function(event, ui) {
					var workflow_id=$("#select-choice-1").val();
						 	upload_data={'workflow_id':workflow_id, 'workflow':'workflow.db'};
							showPopup("Loading workflow");
						 $.ajax({
							  type: "POST",
							  data:upload_data,		
							  url: "loadWorkflow.php"
							}).done(function( msg ) {							
							  if (msg!="internal error") {
								//--Load the workflow								
								pjs.loadWorkflow(msg,'Current workflow');							
								//--Setup the different workflow list
								hidePopup();
							  } else {
								showPopupError(msg);
								hidePopup();
							  }
							});	
				});

				$( document ).on( "swipeleft swiperight", "#page1", function( e ) {
				// We check if there is no open panel on the page because otherwise
				// a swipe to close the left panel would also open the right panel (and v.v.).
				// We do this by checking the data that the framework stores on the page element (panel: open).
				if ( $.mobile.activePage.jqmData( "panel" ) !== "open" ) {
					if ( e.type === "swipeleft"  ) {
						$( "#mypanel" ).panel( "open" );
					} else if ( e.type === "swiperight" ) {
						$( "#mypanel" ).panel( "open" );
					}
				}
			});
				
				
			});
					
			$(document).ready(function() {  
					
			$.mobile.ajaxEnabled = false;

			
			//$.mobile.defaultPageTransition = 'none';
			//$.mobile.transitionFallbacks='none';
						//double_buffer();	
			//--Show help
  				//showBubble('First time?','#mainHelp');  				
  				//--verifyState  				
				//-->This load the workflow from db
  				//getWorkflowState();
				
  				//get_webinfo();
  					//setTimeout( function(){ $('#error_dialog').popup('close') }, 100 );
  					
  				//$("#err_").popup("open");
				// if ($.browser.flash != true)  {					
					// $('popupRequiredFlash').popup();  
					// $('popupRequiredFlash').popup('open');  
				// }
				
			});
			
			