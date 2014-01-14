		<div data-role="dialog" id="hgt32"  style="padding:0px" data-overlay-theme="d" data-theme="b" style="max-width:600px;background-color:transparent; background: transparent !importantl; margin:20px auto;
			position: relative;" class="ui-corner-all" data-close-btn="none">		
			
					<div data-role="header" data-theme="b" >
						<h2>HGT Detection</h1>
						<a href="#help" id='mainHelp' data-role="button" data-icon="info" data-transition="fade">Help</a>
						<a href="#" data-rel="back" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
						</div>
					<div data-role="content" class="jqm-content ui-corner-bottom">	
						<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="e">
						<li data-role="list-divider">HGT Detection option</li>
							<table>				
								<tr>
									<td>
										<td width='60%' ><b>HGT detection mode</b></td>						
									   <td><SELECT name='mode' data-mini="true">	
											<option value='multicheck'>Several HGTs by iteration</option>
											<option value='monocheck' >One HGT by iteration</option>							
										</SELECT></td>	
								</tr>				
								<tr>
									<td>
										<td width='60%' ><b>Scenario</b></td>
										<td>
										<SELECT name='scenario' data-mini="true">
											<option  value='unique' > Unique </option>
											<option  value='multiple' > Multiple </option>
										</SELECT>
										</td>
									</tr>
								</tr>
								<tr>
									<td>
										<td width='60%' ><b>Optimization criterion</b></td>
										<td>
										<SELECT name='optimization' data-mini="true">
											<option  value='bd' name='optimization'> Bipartition dissimilarity</option>
											<option  value='rf' name='optimization'>Robinson and Foulds distance</option>
											<option  value='ls' name='optimization'>Least-squares</option>
										<SELECT>
										</td>					
								</tr>
								<tr>
									<td colspan=2>						
									<div data-role="fieldcontain" >
										<fieldset data-role="controlgroup" >									
											<input type=checkbox name='mafft_nofft' id='mafft_nofft' data-theme="c" data-mini="true">
											<label for="mafft_nofft">Compute HGT bootstrap</label>
										</fieldset>
									</div>
									</td>
								</tr>
							</table>
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
