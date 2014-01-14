<div data-role="dialog" id="nj"  style="padding:0px" data-overlay-theme="d" data-theme="b" style="max-width:600px;background-color:transparent; background: transparent !importantl; margin:20px auto;
			position: relative;" class="ui-corner-all" data-close-btn="none">		
			
					<div data-role="header" data-theme="b" >
						<h2>Neighbor Joining</h1>
						<a href="#help" id='mainHelp' data-role="button" data-icon="info" data-transition="fade">Help</a>
						<a href="#" data-rel="back" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
						</div>
					<div data-role="content" class="jqm-content ui-corner-bottom">	
						<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="e">
						<li data-role="list-divider">Neighbor Joining option</li>
						<table>				
			 			<tr>
							<td width='30%'>Tree reconstruction method</td>
								<td><select name='method' data-mini='true'>						
									<option name=2 value=2>Neighbor Joining - Saitou and Nei (1987)</option>
									<option name=1 value=1>ADDTREE - Sattath and Tversky (1977)</option>
									<option name=3 value=3>Unweighted Neighbor Joining - Gascuel (1997)</option>
									<option name=4 value=4>Circular order reconstruction - Makarenkov, Leclerc (1997)</option>
									<option name=5 value=5>Weighted least-squares method MW - Makarenkov, Leclerc (1999)</option>
									<option name=6 value=6>BioNJ - Gascuel (1997)</option>
							</select></td>
			 			</tr>
					<tr>
					 <td width='30%'>Select model of evolution:</td>
					 <td>
						<select name='menuS' data-mini='true'>						
							<option name='blosum' value='32887' >Uncorrected Distances</option>
							<option name='blosum' value='32888' >Jukes-Cantor</option>
							<option name='blosum' value='32889'  >Tajima-Nei</option>
							<option name='blosum' value='32890'  >Kimura 2-Parameters</option>
							<option name='blosum' value='32891' >Tamura</option>
							<!-- <option name='blosum' value='32892'  >Jin-Nei Gamma</option> -->
							<option name='blosum' value='32893'   >Kimura Protein</option>
							<option name='blosum' value='32894'  >LogDet</option>
							<option name='blosum' value='32895' >F84</option>
						</select>
					 </td>
					</tr>
					<tr>
					<td>Gap penalty</td>
					
					<td><input type="range" name="gap" id="pois" value="0" min="0" max="20" step="1" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>
					</tr>
					<tr>
							<td>Missing bases option</td>
							<td><select name='menuS' data-mini='true' >	
								<option value='0' name='PEMV' >Ignore missing bases</option>
								<option value='1' name='PEMV' >PEMV estimation of missing bases values</option>
							</td>
					</tr>
		
					<tr>
					<td><b>Validation</b></td>
					
						<td><select name='menuValidation' data-mini='true' >	
						<option value='0' name='bootStrap' >Bootstrap</option>
						<option  value='1' name='bootStrap' >Jackknife</option>
						<option  value='2' name='bootStrap'>No branch validation</option>
						</td>
					</tr>  
					  <td>
						Number of replicates
					  </td>
						<td>
						<input type="range" name="pois" id="pois" value="100" min="50" max="10000" step="50" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d">
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
	min-width:800px;
	margin: 50px auto 15px auto;
	padding: 0;
	position: relative;
	top: -15px;
	}
	
</style>	