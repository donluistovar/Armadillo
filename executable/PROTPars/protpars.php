<div data-role="dialog" id="protparspars"  style="padding:0px" data-overlay-theme="d" data-theme="b" style="max-width:600px;background-color:transparent; background: transparent !importantl; margin:20px auto;
position: relative;" class="ui-corner-all" data-close-btn="none">		
					<div data-role="header" data-theme="b" >
						<h2>ProtPars (Phylip)</h1>
						<a href="#help" id='mainHelp' data-role="button" data-icon="info" data-transition="fade">Help</a>
						<a href="#" data-rel="back" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
				<div data-role="content" class="jqm-content ui-corner-bottom">
	
		<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="a">
		<li data-role="list-divider">Compute options</li>				
			<table width='100%'>	
			<tr>
				<td>Search option</td>
				<td>
				<select name='S' data-mini='true'>
					<option value='1' selected>More thorough search</option>
					<option value='2'>Rearrange on one best tree</option>
					<option value='3'>Less thorough search</option>
				</select>
			</tr>
			<tr>
				<td width='50%'>Number of trees to save </td>				
				<td width='50%'><input type="range" name="gapext" id="gapext" value="1" min="0" max="10000" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>													
			</tr>
			<tr>
				<td >Use Threshold parsimony</td>
				<td >
					<select name="T" id="select-choice-mini" data-mini="true" data-inline="true">				
						<option value='yes'>Yes</option>
						<option value='no' selected>No, use ordinary parsimony</option></select>
					</select>	
				</td>
			</tr>
				<tr>
				<td width='50%'>Number of steps up per site</td>				
				<td width='50%'><input type="range" name="gapext" id="gapext" value="2" min="1" max="100" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>													
			</tr>		 
			
				<tr>
					<td >Use which genetic code</td>
					
						<td >
							<select name='C'  id="C" data-mini="true" data-inline="true">
							<option value='u'>Universal</option>
							<option value='m'>Mitochondrial</option>
							<option value='v'>Vertabrate mitochondrial</option>
							<option value='f'>Fly mitochondrial</option>
							<option value='y'>Yeast mitochondrial</option>
							</select>
						</td>			 			
					</tr>
		
			
			</table>
				
		

		  		  </ul>
			
</div>
<div style='text-align:right'><a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c">Reset</a>    
<a href="#" data-role="button" data-inline="true" data-rel="back" data-transition="flow" data-theme="b">Done</a>  
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
	.ui-dialog-contain {
	width: 92.5%;	
	margin: 50px auto 15px auto;
	padding: 0;
	position: relative;
	top: -15px;
	}
	
</style>	

				</div> <!-- end data-role -->