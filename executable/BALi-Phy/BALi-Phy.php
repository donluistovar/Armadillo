	<div data-role="dialog" id="baliphy"  style="padding:0px" data-overlay-theme="d" data-theme="b" style="max-width:600px;background-color:transparent; background: transparent !importantl; margin:20px auto;
			position: relative;" class="ui-corner-all" data-close-btn="none">		
			
					<div data-role="header" data-theme="b" >
						<h2>Bali-Phy</h1>
						<a href="#help" id='mainHelp' data-role="button" data-icon="info" data-transition="fade">Help</a>
						<a href="#" data-rel="back" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
						</div>
					<div data-role="content" class="jqm-content ui-corner-bottom">	
						<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="e">
						<li data-role="list-divider">Bali-Phy option</li>
							<table>				
								<tr>									
										<td width='60%' ><b>Iterations to run (default=100000)</b></td>						
									   <td><SELECT name='mode' data-mini="true">	
											<option value='100'>100</option>
											<option value='1000'>1 000</option>
											<option value='10000'>1 0000</option>
											<option value='100000'>100 000</option>
											<option value='1000000'>1 000 000</option>
										</SELECT></td>	
								</tr>		
								<tr>				
										<td width='50%'>Iterations to refine initial tree (default=3)</td>
										<td width='50%' align=left><input type="range" name="window" id="window" value="3" min="0" max="7" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>
								</tr>	
								<tr>				
										<td width='50%'>Factor by which to subsample (default=1)</td>
										<td width='50%' align=left><input type="range" name="window" id="window" value="1" min="0" max="20" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>
								</tr>	
								<tr>
									   <td width='60%' ><b>Branch prior</b></td>						
									   <td><SELECT name='mode' data-mini="true">	
											<option value='default'>default</option>
											<option value='exponential'>Exponential</option>
											<option value='gamma'>Gamma</option>											
										</SELECT></td>									
								</tr>
								<tr>
									   <td width='60%' ><b>Indel model</b></td>						
									   <td><SELECT name='mode' data-mini="true">	
											<option value='default'>default</option>
											<option value='RS05'>RS05</option>
											<option value='RS07-no-T'>RS07-no-T</option>											
											<option value='RS07'>RS07</option>
										</SELECT></td>									
								</tr>
								<tr>
									   <td width='60%' ><b>Substitutionl model</b></td>						
									   <td><SELECT name='mode' data-mini="true">	
											<option value='EQU'>EQU</option>
											<option value='HKY'>HKY</option>
											<option value='TN'>TN</option>																						
											<option value='TN+F=constant'>TN+F=constant</option>
											<option value='TN+F=nucleotides'>TN+F=nucleotides</option>
											<option value='GTR'>GTR</option>											
											<option value='JTT'>JTT</option>
											<option value='WAG'>WAG</option>
											<option value='LG'>LG</option>											
											<option value='HKYx3'>HKYx3</option>
											<option value='TNx3'>TNx3</option>
											<option value='GTRx3'>GTRx3</option>											
											<option value='M0'>M0</option>
											<option value='M0[HKY]'>M0[HKY]</option>
											<option value='M0[TN]'>M0[TN]</option>
											<option value='M0[TN]+M2'>M0[TN]+M2</option>
											<option value='M2'>M2</option>
											<option value='WAG+log-normal+INV'>WAG+log-normal+INV</option>
										</SELECT></td>									
								</tr>
								<tr>
									   <td width='60%' ><b>The alphabet</b></td>						
									   <td><SELECT name='mode' data-mini="true">	
											<option value='DNA' selected>DNA</option>
											<option value='RNA'>RNA</option>
											<option value='Amino-Acids'>Amino-Acids</option>											
											<option value='Amino-Acids+stop'>Amino-Acids+stop</option>
											<option value='Triplets'>Triplets</option>
											<option value='Codons'>Codons</option>
											<option value='Codons+stop'>Codons+stop</option>
										</SELECT></td>									
								</tr>
				</table>		 
		  </ul>
		  </div>	<!-- end content -->		
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