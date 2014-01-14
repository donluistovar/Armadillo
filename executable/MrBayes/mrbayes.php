	<div data-role="dialog" id="mrbayes"  style="padding:0px" data-overlay-theme="d" data-theme="b" style="max-width:600px;background-color:transparent; background: transparent !importantl; margin:20px auto;
			position: relative;" class="ui-corner-all" data-close-btn="none">		
			
					<div data-role="header" data-theme="b" >
						<h2>MrBayes</h1>
						<a href="#help" id='mainHelp' data-role="button" data-icon="info" data-transition="fade">Help</a>
						<a href="#" data-rel="back" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
						</div>
					<div data-role="content" class="jqm-content ui-corner-bottom">	
						
	
						<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="a">
							<li data-role="list-divider">Evolutionary model and datatypes</li>				
							<table width='100%'>									
								<tr>
									   <td width='60%' ><b>Datatype</b></td>						
									   <td><SELECT name='mode' data-mini="true">	
											<option value='DNA'>DNA</option>
											<option value='RNA'>RNA</option>
											<option value='Protein'>Protein</option>											
											<option value='Restriction'>Restriction</option>											
											<option value='Standard'>Standard</option>											
										</SELECT></td>									
								</tr>
									<tr>
									   <td width='60%' ><b>Model DNA (lset nucmodel)</b></td>						
									   <td><SELECT name='mode' data-mini="true">	
											<option value='4by4'>4by4</option>
											<option value='doublet'>doublet</option>
											<option value='codon'>codon</option>																						
										</SELECT></td>									
								</tr>
								<tr>
									   <td width='60%' ><b>Model PROTEIN (lset aamodelpr)</b></td>						
									   <td><SELECT name='mode' data-mini="true">	
											<option value='equalin'>Equalin</option>
											<option value='gtr'>GTR</option>
											<option value='poisson'>Poisson</option>																						
											<option value='jones'>Jones</option>
											<option value='dayhoff'>Dayhoff</option>
											<option value='mtrev'>mtrev</option>											
											<option value='mtmam'>mtmam</option>
											<option value='wag'>WAG</option>
											<option value='rtrev'>rtrev</option>											
											<option value='cprev'>cprev</option>
											<option value='vt'>vt</option>
											<option value='blossum'>Blossum</option>																						
										</SELECT></td>									
								</tr>
								<tr>
									<td >State frequencies  (prset statefreqpr/symdirihyperpr)</td>
									<td >
										<select name="dnamatrix" id="select-choice-mini" data-mini="true" data-inline="true">													
											<option  value='fixed(equal)'  >fixed(equal)</option>
											<option  value='fixed(empirical)' >fixed(empirical)</option>
										</select>
									</td>
								</tr>	
								<tr>
									   <td width='60%' ><b>Coding bias (lset coding)</b></td>						
									   <td><SELECT name='mode' data-mini="true">	
											<option value='all' selected>all</option>
											<option value='variable'>variable</option>
											<option value='nopresencesites'>nopresencesites</option>											
											<option value='noabsencesites'>noabsencesites</option>
											
										</SELECT></td>									
								</tr>
								<tr>
									   <td width='60%' >Substitution Rates (lset nst/prset aarevmatpr)</td>						
									   <td><SELECT name='aarevmatpr' id='aarevmatpr' data-mini="true">	
											<option value='1' selected>F81 (1)</option>
											<option value='2'>HKY (2)</option>
											<option value='6'>GTR (6)</option>																						
										</SELECT></td>									
								</tr>
								<tr>
									   <td width='60%' >Across Site Rate Variation (lset rates)</td>						
									   <td><SELECT name='rates' id='rates' data-mini="true">	
											<option value='equal' selected>equal</option>
											<option value='gamma'>gamma</option>
											<option value='propinv'>propinv</option>																						
											<option value='invgamma'>invgamma</option>	
											<option value='adgamma'>adgamma</option>												
										</SELECT></td>									
								</tr>
								<tr>
									   <td width='60%' >Across Site Omega Variation (lset omegavar)</td>						
									   <td><SELECT name='omegavar' id='omegavar' data-mini="true">	
											<option value='equal' selected>equal</option>
											<option value='Ny98'>Ny98</option>
											<option value='M3'>M3</option>																																									
										</SELECT></td>									
								</tr>
								<tr>
									   <td width='60%' >Across Site Omega Variation (lset omegavar)</td>						
									   <td><SELECT name='omegavar' id='omegavar' data-mini="true">	
											<option value='equal' selected>equal</option>
											<option value='Ny98'>Ny98</option>
											<option value='M3'>M3</option>																																									
										</SELECT></td>									
								</tr>
								<tr>
									<td > Across Tree Rate Variation (lset covarion)</td>                   
									<td align='left'>
										<select name="covarion" id="covarion" data-role="slider" data-mini="true">
											<option name=1 value='no'>No</option>
											<option name=2 value='yes' >Yes</option>
										</select>
									</td>
								</tr>
							</table>
						</ul>
						<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="e">
						<li data-role="list-divider">MrBayes options</li>
							<table>				
								<tr>									
										<td width='60%' ><b>Number of replicates (ngen) </b></td>						
									   <td><SELECT name='ngen' id='ngen' data-mini="true">	
											<option value='100'>100</option>
											<option value='1000'>1 000</option>
											<option value='10000'>1 0000</option>
											<option value='100000'>100 000</option>
											<option value='1000000'>1 000 000</option>
											<option value='10000000'>10 000 000</option>
										</SELECT></td>	
								</tr>		
								<tr>				
										<td width='50%'>Sample tree frequencies (samplefeq) </td>
										<td width='50%' align=left><input type="range" name="samplefeq" id="samplefeq" value="100" min="10" max="10000000" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>
								</tr>	
								<tr>				
										<td width='50%'>Parameter values (sump)</td>
										<td width='50%' align=left><input type="range" name="sump" id="sump" value="250" min="1" max="1000000" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>
								</tr>	
								<tr>				
										<td width='50%'>Tree (sumt)</td>
										<td width='50%' align=left><input type="range" name="sumt" id="sumt" value="250" min="1" max="1000000" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>
								</tr>	
						</table>		
					</ul>		
						
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