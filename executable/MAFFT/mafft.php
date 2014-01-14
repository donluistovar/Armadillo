			<div data-role="dialog" id="mafft"  style="padding:0px" data-overlay-theme="d" data-theme="b" style="max-width:600px;background-color:transparent; background: transparent;!important" class="ui-corner-all" data-close-btn="none">		
				
					<div data-role="header" data-theme="b" >
						<h2>MAFFT</h1>
						<a href="#help" id='mainHelp' data-role="button" data-icon="info" data-transition="fade">Help</a>
						<a href="#" data-rel="back" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
		<div data-role="content" class="jqm-content ui-corner-bottom">
			
		<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="a" >
		<li data-role="list-divider">Strategy (See MAFFT <a href='http://mafft.cbrc.jp/alignment/software/algorithms/algorithms.html' target='_blank'>algorithms</a>)</li>							
				
						<select name='modeMafft' id='modeMafft' data-mini="true">
							<option name='mafft_strategy' value='mafft_auto'> Auto (FFT-NS-1, FFT-NS-2, FFT-NS-i or L-INS-i; depends on data size)</option>		
							<option name='mafft_strategy' value='mafft_FFT-NS-2'> FFT-NS-2 (Fast; progressive method)</option> 
							<option name='mafft_strategy' value='mafft_FFT-NS-1' > FFT-NS-1 (Very fast; recommended for >2000 sequences; progressive method with a rough guide tree)</option>
							<option name='mafft_strategy' value='mafft_FFT-NS-i' > FFT-NS-i (Medium; iterative refinement method, two cycles only)</option> 
							<option name='mafft_strategy' value='FFT-NS-i2' > FFT-NS-i (Slow; iterative refinement method)</option> 
							<option name='mafft_strategy' value='mafft_E-INS-i'> E-INS-i (Very slow; recommended for <200 sequences with multiple conserved domains and long gaps)</option>	
							<option name='mafft_strategy' value='mafft_L-INS-i'> L-INS-i (Very slow; recommended for <200 sequences with one conserved domain and long gaps)</option>
							<option name='mafft_strategy' value='mafft_G-INS-i'> G-INS-i (Very slow; recommended for <200 sequences with global homology)</option>
							<option name='mafft_strategy' value='mafft_manual'> Manual parameters (see below)</option>
					</select>
		</li>
		</ul>
		<!-- class="ui-disabled" -->
		<ul data-role="listview" id='manual' data-inset="true" data-theme="d" data-divider-theme="a" style='display:none'>
		<li data-role="list-divider"><b>Manual parameters </b>(See MAFFT <a href='http://mafft.cbrc.jp/alignment/software/manual/manual.html' target='_blank'>manual</a>)</li>							
		
				<table  width='100%' >
		 			<tr>		
						<td width='50%'>Tree rebuilding number (default=2)</td>
		               <td width='50%'>
					   <SELECT name='mafft_retree' data-mini="true">		
							<option value='0'   >0 (fast)</option>
							<option value='1'   >1 (for big alignment)</option>
							<option value='2' selected  >2 (default)</option>
							<option value='5'   >5</option>		
							<option value='10'   >10</option>
							<option value='20'   >20</option>
							<option value='50'   >50</option>
							<option value='80'   >80</option>
							<option value='100'   >100 (long run / small alignment)</option>
						</SELECT>
						</td>	
		 				</td>
		 			</tr>
		 			<tr>			
						<td>Maxiterate (default=0)</td>
		               <td><SELECT name='mafft_maxiterate' data-mini="true">		
							<option value='0' selected >0 (fast)</option>
							<option value='1'   >1</option>
							<option value='2' > 2 (for big alignment)</option>
							<option value='5'   >5</option>		
							<option value='10'   >10</option>
							<option value='20'   >20</option>
							<option value='50'   >50</option>
							<option value='80'   >80</option>
							<option value='100'   >100 (long run / small alignment)</option>
						</SELECT></td>	
		 				</td>
		 			</tr>
		 			<tr>	
						<td>Perform FFTS</td>
		               <td><SELECT name='mafft_ftts' onchange='mafft_fttsChanged()' data-mini="true">	
							<option value='mafft_none' selected >none</option>
							<option value='mafft_localpair' >localpair</option>
							<option value='mafft_genafpair' >genafpair</option>
							<option value='mafft_globalpair'>globalpair</option>
						</SELECT></td>			 			
		 			</tr>
		 			<!-- <tr>	
		      		<td colspan=2>						
					<div data-role="fieldcontain" >
						<fieldset data-role="controlgroup" >									
							<input type=checkbox name='mafft_nofft' id='mafft_nofft' data-theme="c" data-mini="true">
							<label for="mafft_nofft">Do not use FFT approximation (for long aligment)</label>
						</fieldset>
					</div>
					</td> -->		 			
    			</table>
				
				</ul>
			
			
			<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="a" >
			<li data-role="list-divider"><b>Other parameters</b></li>										
				<table width='100%'>
		 			<tr>		
						<td width='70%'>Sequence <b>type</b> (nucleotides or amino acids)</td>
		               <td><SELECT name='mafft_type' onChange='mafft_typeChanged()' data-mini="true">		
							<option value='mafft_nucauto' >Automatic</option>
							<option value='mafft_nuc'     >Nucleotides</option>
							<option value='mafft_amino'   >Amino acids</option>
						</SELECT></td>			 		
		 			</tr>
		 			<!-- <tr>		
						<td width='70%'>Output <b>format</b></td>
		               <td>
						<SELECT name='mafft_output' data-mini="true">		
							<option value='mafft_output_fasta' selected>FASTA</option>
							<option value='mafft_phylipout'   >PHYLIP</option>
							<option value='mafft_clustalout'   >ClustalW</option>
						</SELECT></td>			 				
		 			</tr> -->
		 			<!-- <tr>		
						<td width='70%'>Output <b>order</b></td>
						<td><SELECT name='mafft_output_order' data-mini="true">		
							<option value='mafft_output_order' >Same as input</option> 
							<option value='mafft_reorder' >Aligned</option>
						</SELECT>
						</td>			 				
		 			</tr> -->
					
		 			<tr>		
						<td width='70%'>Substitution matrix (Amino acids)</td>
		               <td>
					   <SELECT name='mafft_matrix' data-mini="true">		
							<option value='BLOSUM 30'   >BLOSUM 30</option>
							<option value='BLOSUM 45'   >BLOSUM 45</option>
							<option value='BLOSUM 62' selected  >BLOSUM 62</option>
							<option value='BLOSUM 80'   >BLOSUM 80</option>		
							<option value='JTT PAM 100'   >JTT PAM 100</option>
							<option value='JTT PAM 200'   >JTT PAM 200</option>
						</SELECT>
						</td>			
		 			</tr>
		 			<tr>		
						<td width='70%'>Substitution matrix (Nucleotides)</td>
						<td>
		               <SELECT name='mafft_kimura' data-mini="true">		
							<option value='1'   >1PAM / &kappa;=2</option>
							<option value='20'   >20PAM / &kappa;=2</option>
							<option value='200' selected  >200PAM / &kappa;=2</option>		
						</SELECT>
						</td>
					</tr>
					<tr>					
					<td colspan=2>
					  * Switch it to '1PAM / &kappa;=2' when aligning closely related DNA sequences.
					</td>			
		 			</tr>
		           <tr>	
						<td width='50%'>Gap opening penalty (1.0 - 3.0)</td>
						<td width='50%' align=left><input type="range" name="window" id="mafft_gop" value="1" min="1.0" max="3.0" step="0.1" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>				   
		 			</tr>
		           <tr>	
					   
						<td width='50%'>Offset penalty (0.0 - 1.0)</td>
						<td width='50%' align=left><input type="range" name="window" id="mafft_lep" value="0.123" min="0" max="1.0" step="0.001" data-mini="true" data-highlight="true" data-theme="b" data-track-theme="d"></td>				   
				   </tr>
					<tr><td colspan=2>					
		 				* If long gaps are not expected, set it as 0.1 or larger value.</td>
					</td></tr>
					</table>
			</ul>
</div>
			<div style='text-align:right'><a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c">Reset</a>    
<a href="#" data-role="button" data-inline="true" data-rel="back" data-transition="flow" data-theme="b">Done</a>  


<script>
	
	
	
	
	
	$(document).bind('pageinit', function(){
				
	//===================================================
	//--Defautl properties 	
	//===================================================
	if (selected_properties.getBoolean('modeMafft')) {
		
	} else {
	
	}		
	
	//===================================================
	// TOOL LOGIC 
	//===================================================	
			$( "#modeMafft" ).bind( "change", function(event, ui) {
			console.log('test');
			if ($("#modeMafft").val()=='mafft_manual') {				
				$("#manual").show();
				selected_properties.put('modeMafft', 'mafft_manual');
			} else {				
				$("#manual").hide();
				selected_properties.put('modeMafft',$("#modeMafft").val());
			}
		});
	
		

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

</div>