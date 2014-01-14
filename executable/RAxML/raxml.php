<div data-role="dialog" id="raxml"  style="padding:0px" data-overlay-theme="d" data-theme="b" style="max-width:600px;background-color:transparent; background: transparent !importantl; margin:20px auto;
position: relative;" class="ui-corner-all" data-close-btn="none">		
					<div data-role="header" data-theme="b" >
						<h2>RAxML</h1>
						<a href="#help" id='mainHelp' data-role="button" data-icon="info" data-transition="fade">Help</a>
						<a href="#" data-rel="back" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
				<div data-role="content" class="jqm-content ui-corner-bottom">
	
		<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="a">
		<li data-role="list-divider">Substitution Model</li>				

				<table>
		 			<tr>
						<td >Data Type</td>
						<td><SELECT name='dt' id="dT" data-mini="true" data-inline="true">
							<option value='nt'>DNA</option>
							<option value='aa' >Amino Acids</option>
							<option value='bin' >Binary</option>
							<option value='multi'>Multi-States</option>
						</SELECT></td>		 				
						<td>Substitution model</td>
						<td><SELECT name='raxml_m' id='raxml_m' data-mini="true" data-inline="true">
								<option value='GTRCAT'        >GTRCAT</option>
								<option value='GTRGAMMA'   >GTRGAMMA</option>
								<option value='GTRCATI'     >GTRCATI</option>
								<option value='GTRGAMMAI'     >GTRGAMMAI</option>
								<option value='GTRCAT_FLOAT'  >GTRCAT_FLOAT</option>
								<option value='GTRGAMMA_FLOAT' >GTRGAMMA_FLOAT</option>
								<option value='PROTCAT'   >PROTCAT</option>
								<option value='PROTGAMMA' >PROTGAMMA</option>
								<option value='PROTCATI'	 >PROTCATI</option>
								<option value='PROTGAMMAI' >PROTGAMMAI</option>	
								<option value='BINCAT'   >BINCAT</option>
								<option value='BINGAMMA' >BINGAMMA</option>
								<option value='BINCATI'	>BINCATI</option>
								<option value='BINGAMMAI' >BINGAMMAI</option>		
								<option value='MULTICAT'    >MULTICAT</option>
								<option value='MULTIGAMMA' >MULTIGAMMA</option>
								<option value='MULTICATI'	 >MULTICATI</option>
								<option value='MULTIGAMMAI' >MULTIGAMMAI</option>
							</SELECT></td>
		 			</tr>
				
					<tr>
						<td >Matrix name</td>
						<td ><SELECT name='raxml_mm' id='raxml_mm' data-mini="true" data-inline="true">
								<option value='DAYHOFF' >DAYHOFF</option>
								<option value='DCMUT'   >DCMUT</option>
								<option value='JTT'     >JTT</option>
								<option value='MTREV'   >MTREV</option>
								<option value='WAG'     >WAG</option>
								<option value='RTREV'   >RTREV</option>
								<option value='CPREV'   >CPREV</option>
								<option value='VT'      >VT</option>
								<option value='BLOSUM62'>BLOSUM62</option>
								<option value='MTMAM'   >MTMAM</option>
							</SELECT></td>		 			
		 			</tr>
				
					<tr>
					<td colspan=2>Algorithm/function you want RAxML to execute (f)</td>
		      		<td colspan=2><SELECT name='raxml_f' id='raxml_f' data-mini="true" data-inline="true">
							<option value='a'>(a) Rapid bootstrap analysis</option>
							<option value='b'>(b) Bipartitions analysis</option>
							<option value='c'>(c) Reading test</option>
							<option value='d' selected>(d) Hill-climbing - default</option>
							<option value='e'>(e) Parameters optimization model</option>
							<option value='f'>(f) Log L computation</option>
							<option value='g'>(g) Log L computation</option>
							<option value='h'>(h) Log L SH-test</option>
							<option value='i'>(i) Thorough standard bootstrap</option>
							<option value='j'>(j) Bootstrap alignments generation</option>
							<option value='m'>(m) Bipartitions comparaison</option>
							<option value='n'>(n) Log L score computation</option>
							<option value='o'>(o) Old RaxML search algorithm</option>
							<option value='p'>(p) Stepwise MP addition</option>
							<option value='s'>(s) Multi-gene alignment splitting</option>							
							<option value='t'>(t) Randomized tree searches</option>
							<option value='w'>(w) ELW-test</option>
						</SELECT></td>
		 				<td></td>
		 			</tr>					
				</table>
		</ul>

		
		  <b>Bootstrap</b>
		
	
			
		 			<tr>
						<td width='$largeur1'>Number of alternative runs on distinct starting trees (N)</td>
		      		<td><input type=checkbox name='checkbox_raxml_N' onclick='raxml_NChanged()'><input type=text name='raxml_N' size='5' value='$raxml_N' disabled></td>
		      		
		 			</tr>
				
		
				</table>
			</ul>
			
			
		
		
		
		  <tr><td><br><b>Others options</b><td></tr>
		
		
		
		 			<tr>
						<td width='$largeur1'>Number of categories (c)</td>
		      		<td><input type=checkbox name='checkbox_raxml_c' onclick='raxml_cChanged()'>
		      		<input type=text name='raxml_c' value='25' disabled></td>
		      		<td></td>
		 			</tr>
				
	
			
		 			<tr>
						<td width='$largeur1'>Start search with a complete random starting tree (d)</td>
		      		<td><input type=checkbox name='raxml_d'></td>
		      		<td></td>
		 			</tr>
		
		
		
		 			<tr>
						<td width='$largeur1'>Likelihood epsilon (e)</td>
		      		<td><input type=checkbox name='checkbox_raxml_e' onclick='raxml_eChanged()'><input type=text name='raxml_e' value='1.0' disabled></td>
		      		
		 			</tr>
				
	
		
		
		
	
			
		
		
		
		 			<tr>
						<td width='$largeur1'>Initial rearrangement Setting (i)</td>
		      		<td><input type=checkbox name='checkbox_raxml_i' onclick='raxml_iChanged()'><input type=text name='raxml_i' disabled></td>
		      		
		 			</tr>
			
		
			
	
			
		 			<tr>
						<td width='$largeur1'>Optimize branches and model parameters on bootstrap trees (k)</td>
		      		<td><input type=checkbox name='raxml_k'></td>
		      		
		 			</tr>
			
		
		
			
		 			<tr>
						<td width='$largeur1'>Threshold for sequence similarity clustering (l)</td>
		      		<td><input type=checkbox name='checkbox_raxml_l' onclick='raxml_lChanged()'><input type=text name='raxml_l' size='5' value='' disabled></td>
		      		
		 			</tr>
			
		
		 			<tr>
						<td width='$largeur1'>Threshold for sequence similarity clustering (large datasets) (L)</td>
		      		<td><input type=checkbox name='checkbox_raxml_L' onclick='raxml_LChanged()'><input type=text name='raxml_L' size='5' value='' disabled></td>
		      		<td></td>
		 			</tr>
				
		
			
		 			<tr>
						<td width='$largeur1'>Switch on estimation of individual per-partition branch lengths (M)</td>
		      		<td><input type=checkbox name='raxml_M'></td>
		      		
		 			</tr>
			
		
			
		 			<tr>
						<td width='$largeur1'>Outgroup name(s) (o)</td>
		      		<td width='10'><input type=checkbox name='checkbox_raxml_o' onclick='raxml_oChanged()'></td><td><textarea name='raxml_o' style='width:100%' disabled></textarea></td>
		 			</tr>
				
		
			
		 			<tr>
						<td width='$largeur1'>Random number for the parsimony inferences (p)</td>
		      		<td><input type=checkbox name='checkbox_raxml_p' onclick='raxml_pChanged()'><input type=text name='raxml_p' disabled></td>
		 			</tr>
				
		
		
		 			<tr>
						<td width='$largeur1'>Number of multiple BS per replicate to obtain better ML trees for each replicate (u)</td>
		      		<td><input type=checkbox name='checkbox_raxml_u' onclick='raxml_uChanged()'><input type=text name='raxml_u' size='5' value='' disabled></td>
		      		<td></td>
		 			</tr>
			
			
		
		  
		
		 </table>
		 </form>
		 
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