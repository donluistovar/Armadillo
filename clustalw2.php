

		<div data-role="dialog" id="clustalw2"  style="padding:0px" data-overlay-theme="d" data-theme="b" style="max-width:600px;background-color:transparent; background: transparent;!important" class="ui-corner-all" data-close-btn="none">		
		<form>
					<div data-role="header" data-theme="b" >
						<h2>ClustalW2</h1>
						<a href="#" data-rel="back" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
					
					<!-- <div data-role="content" data-theme="d" class="ui-corner-bottom ui-content"> -->
		<div data-role="content" class="jqm-content ui-corner-bottom">
	
		<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="a">
		<li data-role="list-divider">Multiple sequence alignment options</li>				
			<table width='100%'>									
				<tr>
					<td width='50%'>Gap Opening (0-100)</td>				
					<td width='50%'><input type="range" name="gapext" id="gapext" value="1" min="0" max="100" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>													
				</tr>
				<tr>
					<td width='50%'>Gap Extention (0-100)</td>				
					<td width='50%'><input type="range" name="gapext" id="gapext" value="1" min="0" max="100" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>													
				</tr>			
			<tr>
				<td >Protein weight matrix</td>
				<td >
					<select name="matrix" id="select-choice-mini" data-mini="true" data-inline="true">					
						<option name='blosum' value='blosum' >BLOSUM series</option>
						<option name='pam' value='pam'  >PAM series</option>
						<option name='gonnet' value='gonnet'   >Gonnet series</option>
						<option name='id' value='id'  >Identity matrix</option>
					</select>
				</td>
				<td >DNA weight matrix</td>
				<td >
					<select name="dnamatrix" id="select-choice-mini" data-mini="true" data-inline="true">													
						<option name='iub' value='iub'  >IUB</option>
						<option name='clustalw' value='clustalw'   >ClustalW</option>
					</select>
				</td>
		  </tr>
		  <tr>
				<td>Pairwise alignments</td>
				<td  align='left'>
						<!-- <input type='radio' value='0' name='quicktree' id='alignment_type1' checked="checked">
						<label for="alignment_type1">Slow</label>
						<input type='radio' value='1' name='quicktree' id='alignment_type2' >
						<label for="alignment_type2">Fast</label> -->
							<select name="PairwiseAlignmentFast" id="PairwiseAlignmentFast" data-role="slider" data-mini="true">
								<option value="0">Slow</option>
								<option value="1">Fast</option>
							</select> 
				</td>
				<td > Use Negative Matrix</td>                   
				<td align='left'>
					<select name="slider-flip-m" id="slider-flip-m" data-role="slider" data-mini="true">
						<option name=1 value='OFF'>OFF</option>
						<option name=2 value='ON' >ON</option>
					</select>
				</td>
		  </tr>	
		  </table>
		  </li>
		  </ul>
		<div id ='slow' style='display:none'>
		<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="e">
		   <li data-role="list-divider">Slow Pairwise Alignment parameter</li>			
		  <table width='100%'>
			<tr>
				<td width='50%'>Gap opening penalty (0-100)</td>				
				<td width='50%'><input type="range" name="pwgapopen" id="pwgapopen" value="1" min="0" max="100" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>									
			</tr>
			<tr>
				<td  width='50%'>Gap extension penalty (0-100)</td>
				<td width='50%'><input type="range" name="pwgapext" id="pwgapext" value="1" min="0" max="100" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>									
		  </tr>
			<tr>					
				<td >DNA weight matrix</td>
				<td >
				<select name="pwdnamatrix" id="select-choice-mini" data-mini="true" data-inline="true">																						
						<option name='iub' value='iub'   >IUB</option>
						<option name='clustalw' value='clustalw'   >ClustalW</option>
					</select>
				</td>
		   </tr>
		   <tr>		
		 		<td >Protein weight matrix</td>
				<td >
				<select name="pwmatrix" id="select-choice-mini" data-mini="true" data-inline="true">																											
						<option name='blosum' value='blosum'   >BLOSUM series</option>
						<option name='pam' value='pam'   >PAM series</option>
						<option name='gonnet' value='gonnet'   >Gonnet series</option>
						<option name='id' value='id'   >Identity matrix</option>
					</select>
				</td>
		  </tr>
		  </table>
		 </li>
		 </ul>
		</div>
		 <div id ='fast' style=''>
		 <ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="e">
		   <li data-role="list-divider">Fast Pairwise Alignment parameters</li>
		    <table width='100%'>
			<tr>
				<td width='30%'>Gap Penalty (1-500)</td>				
				<td width='70%'><input type="range" name="pairgap" id="pairgap" value="1" min="1" max="500" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>									
			</tr>	
				<td width='30%'>K-Tuple Size (1-2)</td>		
				<td><select name="ktuple" id="ktuple" data-role="slider" data-mini="true" data-theme="d">
					<option value="1">1</option>
								<option value="2">2</option>
							</select> 
				</td>			
			</tr>
			<tr>				
				<td width='30%'>Top Diagonals (1-50)</td>
				<td width='30%' align=left><input type="range" name="topdiags" id="topdiags" value="1" min="1" max="50" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>
			</tr>
			<tr>
				<td width='30%'>Windows Size (1-50)</td>
				<td width='30%' align=left><input type="range" name="window" id="window" value="1" min="1" max="50" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>
			</tr>
		  </table>
		  </li>
		  </ul>
		  </div>
		</form>
</div>
<script>
	
	
	
	
	
	$(document).bind('pageinit', function(){
				
	//===================================================
	//--Defautl properties 	
	//===================================================
	if (selected_properties.getBoolean('PairwiseAlignmentFast')) {
		$("#slow").hide();
		$("#fast").show();
		$("#PairwiseAlignmentFast").val('1');
		$("#PairwiseAlignmentFast").slider("refresh");
	} else {
		$("#slow").show();
		$("#fast").hide();
		$("#PairwiseAlignmentFast").val('0');
		$("#PairwiseAlignmentFast").slider("refresh");
	}		
	
	//===================================================
	// TOOL LOGIC 
	//===================================================	
		
		$( "#PairwiseAlignmentFast" ).bind( "change", function(event, ui) {
			if ($("#PairwiseAlignmentFast").val()==1) {
				$("#slow").hide();
				$("#fast").show();
				selected_properties.put('PairwiseAlignmentFast', 'true');
			} else {
				$("#slow").show();
				$("#fast").hide();
				selected_properties.put('PairwiseAlignmentFast', false);
			}
		});
	
		
	$('#window').bind( "change", function(event) {
		console.log($(this).val());
	});
	
	// $( 'quicktree' ).bind( "slidechange", function(event, ui) {
		// console.log($(this));
	// });
	
	// $('quicktree').bind( "change", function(event, ui) {
		// console.log($(this));
	// });
	
	// $('pwgapopen').function() {
		// console.log('hello');
	// }
	
	 // $('div[data-role="dialog"]').live('pagebeforeshow', function(e, ui) {
	// ui.prevPage.addClass("ui-dialog-background ");
	// });
	
    // $('div[data-role="dialog"]').live('pagehide', function(e, ui) {
	// $(".ui-dialog-background ").removeClass("ui-dialog-background ");
	// });
	
	

});
</script>
<style>
	 .transparent_class {
        filter:alpha(opacity=50); /* for IE4 - IE7 */
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)"; /* IE8 */
        -moz-opacity:0.5;
        -khtml-opacity: 0.5;
        opacity: 0.5;
   }
	
	
</style>	

				</div> <!-- end data-role -->
				<!-- </div> <!-- End page -->



