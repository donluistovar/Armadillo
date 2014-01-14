

		<div data-role="dialog" id="muscle"  style="padding:0px" data-overlay-theme="d" data-theme="b" style="max-width:600px;background-color:transparent; background: transparent;!important" class="ui-corner-all" data-close-btn="none">		
		
					<div data-role="header" data-theme="b" >
						<h2>Muscle</h1>
						<a href="#help" id='mainHelp' data-role="button" data-icon="info" data-transition="fade">Help</a>
						<a href="#" data-rel="back" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
					
					<!-- <div data-role="content" data-theme="d" class="ui-corner-bottom ui-content"> -->
		<div data-role="content" class="jqm-content ui-corner-bottom">
	
		<ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="a">
		<li data-role="list-divider">Multiple sequence alignment options</li>				
		<table>		
		  <tr align = 'left'>
				<td width='70%'>Computation Mode (<a href='http://www.drive5.com/muscle/muscle.html' target='_blank'>help</a>)</td>
				<td width='30%'>
					<select name='modeMuscle' data-mini='true'>
						<option name='basic'    value='basic'>Regular</option>
						<option name='large'    value='large'>Large alignments</option>
						<option name='fastprot' value='fastprot'>Fastest speed (amino acids)</option>
						<option name='fastdna'  value='fastdna'>Fastest speed (DNA)</option>
						<option name='huge'     value='huge'>Huge alignments</option>
					</select>
				</td>		  
			</tr>
		
			<!-- <tr>		
				<td width='60%'>Output format</td>
				<td width='40%'>
					<select name='outputFormatMuscle'>						
						<option name='fasta'     value='out'           echo ($outputFormatMuscle=='out')?"selected":"          >Person/Fasta</option>
						<option name='clustalw'  value='clwout'        echo ($outputFormatMuscle=='clwout')?"selected":"       >ClustalW</option>
						<option name='clustalws' value='clwstrictout'  echo ($outputFormatMuscle=='clwstrictout')?"selected":" >ClustalW (strict)</option>
						<option name='html'      value='htmlout'       echo ($outputFormatMuscle=='htmlout')?"selected":"      >HTML</option>
						<option name='gcgmsf'    value='msfout'        echo ($outputFormatMuscle=='msfout')?"selected":"       >GCG MSF</option>
						<option name='phylipi'   value='phyiout'       echo ($outputFormatMuscle=='phyiout')?"selected":"      >Phylip Interleaved</option>
						<option name='phylips'   value='physout'       echo ($outputFormatMuscle=='physout')?"selected":"      >Phylip Sequential</option>
					</select>
				</td>
		  </tr> -->
		  		  
		  </table>	
			
</div>
<div style='text-align:right'><a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c">Reset</a>    
<a href="#" data-role="button" data-inline="true" data-rel="back" data-transition="flow" data-theme="b">Done</a>  
</div>
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
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80) /* IE8 */
        -moz-opacity:0.5;
        -khtml-opacity: 0.5;
        opacity: 0.5;
   }
	
	
</style>	

				</div> <!-- end data-role -->
				<!-- </div> <!-- End page -->



