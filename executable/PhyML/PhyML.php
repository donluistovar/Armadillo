	<div data-role="dialog" id="PhyML"  style="padding:0px" data-overlay-theme="d" data-theme="b" style="max-width:600px;background-color:transparent; background: transparent !importantl; margin:20px auto;
			position: relative;" class="ui-corner-all" data-close-btn="none">		
			
					<div data-role="header" data-theme="b" >
						<h2>PhyML</h1>
						<a href="#help" id='mainHelp' data-role="button" data-icon="info" data-transition="fade">Help</a>
						<a href="#" data-rel="back" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
						</div>
					<div data-role="content" class="jqm-content ui-corner-bottom">	
						<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="e">
						<li data-role="list-divider">PhyML options</li>					
						<table>
						<tr>									
								<td width='60%' ><b>Data Type</b></td>						
							   <td><SELECT name='dt' id='dt' data-mini="true">	
									<option value='nt'>DNA</option>
									<option value='aa'>Amino Acids</option>											
								</SELECT></td>	
						</tr>
						<tr>									
								<td width='60%' ><b>Substitution Model</b></td>						
								<td><SELECT name='sm' id='sm' data-mini="true">	
									<option value='JC69'>JC69</option>
									<option value='K80'>K80</option>								
									<option value='F81'>F81</option>	
									<option value='F84'>F84</option>	
									<option value='HKY85'>HKY85</option>	
									<option value='TN93'>TN93</option>	
									<option value='GTR'>GTR</option>	
									<option value='LG'>LG</option>	
									<option value='WAG'>WAG</option>	
									<option value='Dayhoff'>Dayhoff</option>	
									<option value='JTT'>JTT</option>	
									<option value='Blosum62'>Blosum62</option>
									<option value='mtREV'   >mtREV</option>
									<option value='rtREV'   >rtREV</option>
									<option value='cpREV'   >cpREV</option>
									<option value='DCMut'   >DCMut</option>
									<option value='VT'      >VT</option>
									<option value='MtMAm'   >MtMAm</option>
									<option value='MtART'   >MtART</option>
									<option value='HIVw'    >HIVw</option>
									<option value='HIVb'>HIVb</option>									
								</SELECT></td>	
								<td><SELECT name='aaf' data-mini="true">	
									<option value='model'>Amino acid model frequencies</option>
									<option value='empirical'>Amino acid empirical frequencies</option>											
								</SELECT></td>	
						</tr>	
						<tr>
					<td width='60%'>Tree search operations</td>
		      		<td width='40%' colspan=2><SELECT name='ttso' data-mini="true">
							<option value='NNI' >NNI moves (fast, approximate)</option>
							<option value='SPR'>SPR moves (slow, accurate)</option>
							<option value='BEST' >Best of NNI and SPR</option>
						</SELECT></td>					
		 			</tr>
						</table>
						</ul>
						<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="e">
						<li data-role="list-divider">Advanced options</li>
						<table>
							
						<!-- <tr>
							<td>Optimize equilibrium frequencies</td>
							<td><select name="slider-flip-m" id="slider-flip-m" data-role="slider" data-mini="true">
								<option name=1 value='OFF'>OFF</option>
								<option name=2 value='ON' >ON</option>
							</select>
							</td>
						</tr>	-->
						<tr>					
							<td width='60%' >Transition/Transversion ratio</td>						
							   <td><SELECT name='select_ttr' data-mini="true">	
								<option name=1 value='estimated'>estimated</option>
								<option name=2 value='fixed' >fixed</option>
							</select>
							<div style='display:none'><input type="range" name="ttr" id="ttr" value="1.0" min="0" max="1" step="0.001" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></div>
							</td>
						</tr>
						<tr>					
							<td width='60%' >Proportion of invariable sites</td>						
							   <td><SELECT name='select_pois' data-mini="true">	
								<option name=1 value='estimated'>estimated</option>
								<option name=2 value='fixed' >fixed</option>
							</select>
							<div style='display:none'><input type="range" name="pois" id="pois" value="1.0" min="0" max="1" step="0.001" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></div>
							</td>
						</tr>
					<tr>
						 <td width='$largeur1'>Gamma distribution parameter</td>
						<td width='50%'><SELECT name='select_gdp' data-mini="true" >
							<option selected>estimated</option>
							<option>fixed</option>
						</SELECT>
						<div style='display:none'><input type="range" name="gdp" id="gdp" value="1.0" min="0" max="1" step="0.001" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></div>
						</td>
		 			</tr>
			
		 			<!--<tr>
						<td >One category of substitution rate</td>							
							<td><select name="ocosr" id="ocosr" data-role="slider" data-mini="true">
								<option name=1 value='OFF'>OFF</option>
								<option name=2 value='ON' >ON</option>
							</select>
						</td>
		 			</tr> 
						
			<tr><td>
				
						<td width='$largeur1'>Number of relative substitution rate categories</td>
		      		<td width='50%'><input type="range" name="pois" id="pois" value="1.0" min="0" max="1" step="0.001" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>								 			
			</td>-->
			</tr>
			</table>
		 </ul>
		
		<!-- <ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="e">
			<li data-role="list-divider">Tree Searching</li>
			<table>
			<!-- <tr>		
					<td colspan=2>						
					<div data-role="fieldcontain" >
						<fieldset data-role="controlgroup" >									
							<input type=checkbox name='ott' id='ott' data-theme="c" data-mini="true">
							<label for="ott">Optimize tree topology with branch lengths</label>
						</fieldset>
					</div>
					</td>
					</tr> -->
					
				
		 			<!-- <tr>
						<td>Starting tree</td>
						<td><SELECT name='st' data-mini="true">
							<option value='bionj'    >BioNJ</option>
							<option value='parsimony'>Parsimony</option>							
						</SELECT></td>					
		 			</tr> 
					
					
			
			
			
			</table>
			</ul> -->
			
			<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="e">
			<li data-role="list-divider">Statistic (branch support)</li>
			<table>	
				<tr>				
					<td width='50%'>Non parametric bootstrap analysis</td>
					<td width='50%' align=left><input type="range" name="window" id="window" value="100" min="50" max="10000" step="50" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>
				</tr>	
		 			<tr>
						<td width='50%'>Approximate likelihood ratio test</td>
						<td><SELECT name='alrt' data-mini="true">
							<option value='0' >Use bootstrap</option>
							<option value='-1'>aLRT statistics</option>
							<option value='-2'>Chi2-based supports</option>
							<option value='-4'>SH-like supports</option>
						</SELECT></td>
		 			</tr>
				</table>
			</td></tr>
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
	
	//===================================================
	// TOOL LOGIC 
	//===================================================	
		
		$( "#dt" ).bind( "change", function(event, ui) {
			if ($("#dt").val()=='nt') {
				
			
			$("#sm").empty();
			
			} else {
				
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