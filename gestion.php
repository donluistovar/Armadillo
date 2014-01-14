<?php
	@session_start();
	//=========================================================================
	//= Description : Page de gestion des franchises
	//= Date : 19/01/2013
	//= Auteurs : Alix 
	//=========================================================================
	include_once 'bd.php';
	connection_db();    
	include_once 'langue.php';
	
	$user_privilege=-1;    
    if (isset($_SESSION['id_client'])&&isset($_SESSION['nom'])) {
        $user_privilege=bd_getUserPrivilege(mysql_real_escape_string($_SESSION['id_client']));
    }   
    if (isset($user_privilege)&&$user_privilege!=99) {
        deconnection_db();      
        exit();
    } 
?>
<HTML>
	<HEAD>
		<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
		<META HTTP-EQUIV="Expires" CONTENT="-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="viewport" content="height=device-height, initial-scale=1.0"/>
		
    	<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		
		<link rel="stylesheet"  href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
        <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>    
        
        <script type="application/x-javascript">

        	var tab_enseigne   = Array();
        	var tab_Franchises = Array();
     		var id_enseigne_courant   = -1;
			var id_franchise_courante = -1;

			/*=======================================================================
			 *======================== FONCTIONS ====================================
			 ========================================================================*/
			function getFranchise(id_franchise){
                 $.ajax({
                    type: "POST", 
                    headers: { "cache-control": "no-cache" },
                    url:  "getFranchise.php", 
                    data: ({id_franchise: id_franchise}),
					cache: false,
                    dataType: "json",
                    success: onSuccess,
                    error: onError 
                });  
                
                function onSuccess(data){
                    //alert(data.nom_franchise); 
					id_franchise_courante					   = data.id_franchise;
					document.getElementById("nom").value       = data.nom_franchise;
                    document.getElementById("adresse").value   = data.adresse;
                    document.getElementById("telephone").value = data.telephone;
                    document.getElementById("longitude").value = data.longitude;
                    document.getElementById("latitude").value  = data.latitude;
                    document.getElementById("database").value  = data.id_database;
        			$("#linkGeocode").html("<a href='https://maps.google.ca/maps?q="+data.latitude+","+data.longitude+"' target='_blank'>View geocodage</a>");
        			$("#linkAdresse").html("<a href='https://maps.google.ca/maps?q="+data.adresse+"' target='_blank'>View adresse</a>");
					$( "#popupNewFranchise" ).popup("open");
                }
                function onError(){
                    alert("Ca ne fonctionne pas"); 
                }   
            }
            
            function supprimerFranchise(id_franchise){
                 $.ajax({
                    type: "POST", 
                    headers: { "cache-control": "no-cache" },
                    url:  "supprimerFranchise.php", 
                    data: ({id_franchise: id_franchise}),
					cache: false,
                    dataType: "json",
                    success: onSuccess,
                    error: onError 
                });  
                
                function onSuccess(data){
                    alert(data); 
					getfranchises(id_enseigne_courant);
                }
                function onError(){
                    alert("Ca ne fonctionne pas"); 
                }   
            }
 
			function supprimerFichiersTmp(){
				 $.ajax({
                    type: "POST", 
                    headers: { "cache-control": "no-cache" },
                    url: "calculFichiersTemporaires.php",
					//url:  "supprimerFichiersTmp.php", 
                    cache: false,
                    dataType: "json",
                    success: onSuccess,
                    error: onError 
                });  
                
                function onSuccess(data){
                	alert(data); 
                }
                function onError(){
                    alert("Ca ne fonctionne pas"); 
                }	
			}
			function sauvegarderDB(email,table){
				 $.ajax({
                    type: "POST", 
                    headers: { "cache-control": "no-cache" },
                    data: ({email: email, table: table}), 
                    url:  "sauvegarderDB.php", 
                    cache: false,
                    dataType: "json",
                    success: onSuccess,
                    error: onError 
                });  
                
                function onSuccess(data){
        			$("#popupSauvegarde" ).popup("close");
                	alert(data); 
                }
                function onError(){
                    alert("Ca ne fonctionne pas" + data); 
                }	
			}
			 
			function ajouterPlusieursFranchises(listeFranchises,id_enseigne){
				 $.ajax({
                    type: "POST", 
                    headers: { "cache-control": "no-cache" },
                    url:  "ajouterFranchise.php", 
                    data: ({listeFranchises: listeFranchises, id_enseigne: id_enseigne}), 
                    cache: false,
                    dataType: "json",
                    success: onSuccess,
                    error: onError 
                });  
                
                function onSuccess(data){
                	alert(data); 
					$("#popupNewFranchise").popup('close');   
                }
                function onError(){
                    alert("Ca ne fonctionne pas");
					$("#popupNewFranchise").popup('close');   
                }	
			}
				
			function modifier(id_franchise,database,nom,adresse,telephone,latitude,longitude,id_enseigne){
				 $.ajax({
                    type: "POST", 
                    headers: { "cache-control": "no-cache" },
                    url:  "modifierFranchise.php", 
                    data: ({id_franchise: id_franchise, database: database, nom: nom, adresse: adresse, telephone: telephone, id_enseigne: id_enseigne, longitude: longitude, latitude: latitude}), 
                    cache: false,
                    dataType: "json",
                    success: onSuccess,
                    error: onError 
                });  
                
                function onSuccess(data){
                	alert("C'est fait : " + data); 
					$("#popupNewFranchise").popup('close'); 
					getfranchises(id_enseigne);  
                }
                function onError(){
                    alert("Ca ne fonctionne pas");
					$("#popupNewFranchise").popup('close');   
                }	
			}

			function ajouter(database,nom,adresse,telephone,latitude,longitude,id_enseigne){
				 $.ajax({
                    type: "POST", 
                    headers: { "cache-control": "no-cache" },
                    url:  "ajouterFranchise.php", 
                    data: ({database: database, nom: nom, adresse: adresse, telephone: telephone, id_enseigne: id_enseigne, longitude: longitude, latitude: latitude}), 
                    cache: false,
                    dataType: "json",
                    success: onSuccess,
                    error: onError 
                });  
                
                function onSuccess(data){
                	alert("C'est fait : " + data); 
					$("#popupNewFranchise").popup('close'); 
					getfranchises(id_enseigne);  
                }
                function onError(){
                    alert("Ca ne fonctionne pas");
					$("#popupNewFranchise").popup('close');   
                }	
			}

  			function getIdDatabase(longitude,latitude){
        		//alert(longitude + "," + latitude);
				$.ajax({
					type: "POST", 
					headers: { "cache-control": "no-cache" },
					url:  "getIdDatabase.php", 
					data: ({longitude: longitude, latitude: latitude}), 
					cache: false,
					dataType: "json",
					success: loadIdDatabase,
					error: onError 
				});  
				
				function loadIdDatabase(data){
					
					document.getElementById("database").value  = data[0] + "(" + data[1] + ")";
				}
				function onError(){
            		alert("Ca ne fonctionne pas");
            	}
        	}
       
	  		function getLatLong(adresse){
        		$.ajax({
					type: "POST", 
					headers: { "cache-control": "no-cache" },
					url:  "getLatLong.php", 
					data: ({adresse: adresse}), 
					cache: false,
					async: false,
					dataType: "json",
					success: loadLatLong,
					error: onError 
				});  
				
				function loadLatLong(data){
					document.getElementById("latitude").value  = data[0];
					document.getElementById("longitude").value = data[1];
        			$("#linkGeocode").html("<a href='https://maps.google.ca/maps?q="+data[0]+","+data[1]+"' target='_blank'>View geocodage</a>");
        			$("#linkAdresse").html("<a href='https://maps.google.ca/maps?q="+adresse+"' target='_blank'>View adresse</a>");
				}
				function onError(){
            		alert("Ca ne fonctionne pas");
            	}
        	}
        	
        	function getfranchises(id_enseigne){
        		$("#titreFranchises").html(tab_enseigne[id_enseigne]);
        		$.ajax({
					type: "POST", 
					headers: { "cache-control": "no-cache" },
					url:  "getFranchises.php", 
					data: ({id_enseigne: id_enseigne}), 
					cache: false,
					dataType: "json",
					success: loadFranchises,
					error: onError 
				});  
				
				function loadFranchises(data){
					var ligne = "<li><a href=\"\" data-rel=\"popup\"><font color='grey'><i>Nouvelle franchise</i></font></a></li>";
        	 		tab_franchises = Array();
					for(var i=0;i<data.length;i++){
						tab_franchises[i+1] = data[i].id_franchise;
         				ligne += "<li>ID = " + data[i].id_franchise + "<br>Nom = " + data[i].nom_franchise + "<br>Adresse = " + data[i].adresse + "<font color=grey><br>Latitude = " + data[i].latitude + ", Longitude = " + data[i].longitude + ", Telephone = " + data[i].telephone + ", Database = " + data[i].id_database + "</font></li>";
            		}       
        			$('#listFranchises').empty().append($(ligne));
        			$('#listFranchises').trigger('create');    
        			$('#listFranchises').listview('refresh'); 
        			
				}
				function onError(){
            		alert("Ca ne fonctionne pas");
            	}
        	}
        	function activerAjouter(){
        		document.getElementById("ajouter").disabled = false;
				$('#ajouter').button('refresh'); 
        	}
        	function desactiverAjouter(){
        		document.getElementById("ajouter").disabled = true;
				$('#ajouter').button('refresh'); 
        	}
        	function activerSupprimer(){
        		document.getElementById("delete").disabled = false;
				$('#delete').button('refresh'); 
        	}
        	function desactiverSupprimer(){
        		document.getElementById("delete").disabled = true;
				$('#delete').button('refresh'); 
        	}
        	/*=======================================================================
			 *======================== GESTION DES EVENEMENTS =======================
			 ========================================================================*/
        	$(function() {
        		$('input[name=nom]').change(function() {
        			desactiverSupprimer();
        			activerAjouter();
        		});
        		$('input[name=telephone]').change(function() {
        			desactiverSupprimer();
        			activerAjouter();
        		});
        		$('input[name=adresse]').change(function() {
        			desactiverSupprimer();
        			activerAjouter();
        		});
        		$('input[name=longitude]').change(function() {
        			desactiverSupprimer();
        			activerAjouter();
        		});
        		$('input[name=latitude]').change(function() {
        			desactiverSupprimer();
        			activerAjouter();
        		});
        		$('input[name=id_database]').change(function() {
        			desactiverSupprimer();
        			activerAjouter();
        		});
        		$('#ajouter').click(function(){
					nom       = document.getElementById("nom").value;
					adresse   = document.getElementById("adresse").value;
					telephone = document.getElementById("telephone").value;
					latitude  = document.getElementById("latitude").value;
					longitude = document.getElementById("longitude").value;
					database  = document.getElementById("database").value;
					action    = document.getElementById("ajouter").value;
					
					if(action == "Modifier"){
							if (confirm("modification de la franchise " + id_franchise_courante )){
								modifier(id_franchise_courante,database,nom,adresse,telephone,latitude,longitude,id_enseigne_courant);	
							}
					}else{
						if(nom.length == 0){
							alert("Le champ nom est vide");
						}
						else{
							ajouter(database,nom,adresse,telephone,latitude,longitude,id_enseigne_courant);
							//document.getElementById("ConfirmDeleteFranchisesFileLink").href="#ConfirmDeleteFranchisesFile";
						}	
					}
        		});
				$('#listFranchises').on('click', ' > li', function (){ 
                    var selected_index = $(this).index();
                    if(selected_index != 0){
						getFranchise(tab_franchises[selected_index]);
						document.getElementById("ajouter").value    = "Modifier";
						desactiverAjouter(); 
						activerSupprimer();
						$( "#popupNewFranchise" ).popup("open");
                    	id_franchise_courante = tab_franchises[selected_index];
					}
					else{
						document.getElementById("nom").value       = "";
                    	document.getElementById("adresse").value   = "";
                    	document.getElementById("telephone").value = "";
                    	document.getElementById("longitude").value = "";
                    	document.getElementById("latitude").value  = "";
                    	document.getElementById("database").value  = "";
                    	document.getElementById("ajouter").value    = "Ajouter";
						activerAjouter();
						desactiverSupprimer();
						$( "#popupNewFranchise" ).popup("open");
					}
                });
        		$('#delete').click(function(){
                	if(confirm("supprimer cette franchises id="+id_franchise_courante +"?")){
						supprimerFranchise(id_franchise_courante);
						$( "#popupNewFranchise" ).popup("close");
					}
        		});
        		$('#deleteTmpFile').click(function(){
        			if(confirm("Tu es sûr de toi là ? attention ca va etre long, ne reclique pas STP .....")){
						supprimerFichiersTmp();
					}
        		});
        		$('#backupDB').click(function(){
        			email = document.getElementById("email").value
        			table = document.getElementById("table").value
        			if(email != ""){
        				sauvegarderDB(email,table);
        			}
        		});
        		$('#ajouterPlusieursFranchises').click(function(){
        			ajouterPlusieursFranchises(document.getElementById("listeFranchises").value,id_enseigne_courant);
        		});
        		$('#listeEnseigne').change(function(){
        			getfranchises($(this).val());
					id_enseigne_courant = $(this).val();
        		});
        		
        		$("a[href=#franchises]").live("click", function(e) {
              		var param = $(this).attr("data-parm");
					id_enseigne_courant = param;
        			getfranchises(param);
        		});
        		$("#rechercher").live("click", function(e) {
              		getLatLong(document.getElementById("adresse").value);
					if(document.getElementById("longitude").value.length != 0){
						getIdDatabase(document.getElementById("longitude").value,document.getElementById("latitude").value);
						activerAjouter();
        			}
					else{
						alert("impossible de localiser cette adresse");
						desactiverAjouter();
					}
				});
				
				
                $(window).load(function () {
                    $('.ui-slider').width('70%');
                    $.mobile.changePage( "#pagePrincipale", { transition: "slide"} );
                    $.ajax({
                		type: "POST", 
                		headers: { "cache-control": "no-cache" },
                		url:  "getEnseignes.php", 
                		cache: false,
                		dataType: "json",
                		success: loadEnseignes,
                		error: onError 
            		});  
            		
            		function loadEnseignes(data){
            			var ligne = "<li><font color='grey'><i>Nouvelle Enseigne</i></font></li>";
            			var selected = "SELECTED";
            			for(var i=0;i<data.length;i++){
            				if(i==1) selected = "";
            				tab_enseigne[data[i].id_enseigne] = data[i].nom_enseigne;
           				 	ligne += "<li><a href=\"#franchises\" data-parm=\"" + data[i].id_enseigne + "\">" + data[i].nom_enseigne + "<span class=\"ui-li-count\">" + data[i].nb_franchises + "</span></a></li>";
       					}  
       					//alert(ligne);
       					$('#listEnseignes').empty().append($(ligne));
        				$('#listEnseignes').trigger('create');    
        				$('#listEnseignes').listview('refresh'); 
            		}
            		
            		function onError(){
            			alert("Ca ne fonctionne pas");
            		}
                });
            });

        </script>
                            
	</HEAD>
	<BODY>
		
		<!--------------------------------------------------------------------------------
		-------------------------  PAGE PRINCIPALE  --------------------------------------
		---------------------------------------------------------------------------------->
		<div data-role="page" id="pagePrincipale">
            <div data-role="header" data-theme="b">
                <H1>Menu</H1>
            </div>
            <div data-role="content">
                <div class="content-primary">
                    <ul data-role="listview" data-filter="true">
						<li><a href="#enseignes">Liste des enseignes</a></li>
						<li><a href="#commandes">Liste des commandes</a></li>
					</ul>
                </div>
            </div>
        </div>
    
		
		<!--------------------------------------------------------------------------------
		---------------------  LISTE DES ENSEIGNES  --------------------------------------
		---------------------------------------------------------------------------------->
		<div data-role="page" id="enseignes">
            <div data-role="header" data-theme="b">
				<a href="#pagePrincipale" data-icon="arrow-l">retour</a>
                <H1>Liste des enseignes</H1>
            </div>
            <div data-role="content">
                <div class="content-primary">
                    <ul data-role="listview" id="listEnseignes" data-filter="true"></ul>
                </div>
            </div>
        </div>
        
		<!--------------------------------------------------------------------------------
		---------------------  LISTE DES COMMANDES  --------------------------------------
		---------------------------------------------------------------------------------->
		<div data-role="page" id="commandes">
           
			 <div data-role="header" data-theme="b">
				<a href="#pagePrincipale" data-icon="arrow-l">retour</a>
                <H1>Commandes</H1>
            </div>
            <div data-role="content">
                <div class="content-primary">
                    <ul data-role="listview" id="listeCommandes" data-filter="true">
						<li><a href="" id="deleteTmpFile">Mise a jour des fichiers temporaires</a></li>
						<li><a href="#popupSauvegarde" data-rel="popup">Sauvegarde de la BD et envoie par mail (si possible, je vais essayer)</a></li>
					</ul>
                </div>
            </div>
			
			<div data-role="popup" id="popupSauvegarde" data-overlay-theme="c" data-theme="b" class="ui-corner-all" data-position-to="window" style="width:400px" data-dismissible="false">
                <a href="#nolink" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                <div data-role="header" data-theme="b" class="ui-corner-top" >
                        <h1>Sauvegarde</h1>
                </div>  
                <div data-role="content" data-theme="b" style="padding:2px 20px;">
                    <table data-role="table" id="my-table" data-mode="reflow" width="100%" border=0>
                        <tbody> 
                            <tr>    
                                <td align="left"><label for="email"><b>Email</b></label></td>
                                <td width="80%"><input type="text" id="email" name="email" data-inline="true" style="width:300px"></td>
                            </tr> 
                            <tr>    
                                <td align="left"><label for="table"><b>Table</b></label></td>
                                <td width="80%"><SELECT id="table" data-inline="true" style="width:300px">
                                	<OPTION value="Franchise">Franchise</OPTION>
                                	<OPTION value="Enseigne" >Enseigne </OPTION>
                                </td>
                            </tr>
                            <tr>    
                                <td COLSPAN=2>
                                	<button id="backupDB" type="button" data-theme="b">Sauvegarder</button>
								</td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
			<div data-role="popup" id="ConfirmDeleteFranchisesFile" data-overlay-theme="a" data-theme="c" style="max-width:400px;" class="ui-corner-all" data-position-to="window">
				<div data-role="header" data-theme="a" class="ui-corner-top">
					<h1>Suppr. franchises</h1>
				</div>
				<div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
					<h3 class="ui-title">Etes vous sur de vouloir supprimer les fichiers contenant les 5 franchises les plus proches pour chaque enseigne ? Les fichiers
										 seront regeneres au fur et a mesure.
					</h3>
					<a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c">Annuler</a>    
					<a href="#" id="supprimerFichiersFranchises" data-role="button" data-inline="true" data-rel="back" data-transition="flow" data-theme="b">Supprimer</a>  
				</div>
			</div>
        </div>
        
		<!--------------------------------------------------------------------------------
		---------------------  LISTE DES FRANCHISES --------------------------------------
		---------------------------------------------------------------------------------->
        <div data-role="page" id="franchises" >
            <div data-role="header" data-theme="b">
            	<a href="#enseignes" data-icon="arrow-l">retour</a>
                <H1 id="titreFranchises"></H1>
                <a href="#newFranchises" data-rel="popup" data-icon="plus">Add</a>
            </div>
            <div data-role="content">
                <div class="content-primary">
                    <ul data-role="listview" id="listFranchises" data-filter="true"></ul>
                </div>
            </div>
            
            <div data-role="popup" id="popupNewFranchise" data-overlay-theme="c" data-theme="b" class="ui-corner-all" data-position-to="window" style="width:600px" data-dismissible="false">
                <a href="#nolink" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                <div data-role="header" data-theme="b" class="ui-corner-top" >
                        <h1>Nouvelle franchise</h1>
                </div>  
                <div data-role="content" data-theme="b" style="padding:2px 20px;">
                    <table data-role="table" id="my-table" data-mode="reflow" width="100%" border=0>
                        <tbody> 
                            <tr>    
                                <td align="left"><label for="nom"><b>Nom</b></label></td>
                                <td width="80%"><input type="text" id="nom" name="nom" data-inline="true" style="width:470px"></td>
                            </tr> 
                            <tr>    
                                <td align="left"><label for="adresse"><b>Adresse</b></label></td>
                                <td width="80%"><input type="text" id="adresse" name="adresse" data-inline="true" style="width:470px"></td>
                            </tr>  
                            <tr>    
                                <td align="left"><label for="linkGoogleMap"><b>Link</b></label></td>
                                <td align="left"><label id="linkAdresse"></label> <label id="linkGeocode"></label></td>
                            </tr>   
                            <tr>    
                                <td align="left"><label for="telephone"><b>Telephone</b></label></td>
                                <td width="80%"><input type="text" id="telephone" name="telephone" data-inline="true" style="width:470px"></td>
                            </tr>
                            <tr>    
                                <td align="left"><label for="longitude"><b>Longitude</b></label></td>
                                <td width="80%"><input type="text" id="longitude" name="longitude" data-inline="true" style="width:470px" readonly></td>
                            </tr>
                            <tr>    
                                <td align="left"><label for="latitude"><b>Latitude</b></label></td>
                                <td width="80%"><input type="text" id="latitude" name="latitude" data-inline="true" style="width:470px" readonly></td>
                            </tr>
                            <tr>    
                                <td align="left"><label for="database"><b>Database</b></label></td>
                                <td width="80%"><input type="text" id="database" name="database" data-inline="true" style="width:470px"></td>
                            </tr>
                            <tr>    
                                <td COLSPAN=2>
                                	<div class="ui-grid-b">
										<div class="ui-block-a"><button id="rechercher" type="button" data-theme="b">Rechercher</button></div>
										<div class="ui-block-b"><button id="ajouter" type="button" data-theme="b" value="Ajouter/Modifier" disabled></button></div>
										<div class="ui-block-c"><button id="delete" type="button" data-theme="b" disabled>Supprimer</button></div>
									</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
            
            <div data-role="popup" id="newFranchises" data-overlay-theme="c" data-theme="b" class="ui-corner-all" data-position-to="window" style="width:600px" data-dismissible="false">
                <a href="#nolink" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                <div data-role="header" data-theme="b" class="ui-corner-top" >
                        <h1>Nouvelles franchises</h1>
                </div>  
                <div data-role="content" data-theme="b" style="padding:2px 20px;">
                    <table data-role="table" id="my-table" data-mode="reflow" width="100%" border=0>
                        <tbody> 
                            <tr>    
                                <td align="left"><label for="listeFranchises">Saisir la liste des franchises &agrave; ins&eacute;rer : </label></td>
                            </tr>
                            <tr>    
                                <td align="left"><textarea id="listeFranchises" style="height:200px"></textarea></td>
                            </tr>
                            <tr>    
                                <td><button id="ajouterPlusieursFranchises" type="button" data-theme="b">Ajouter</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>

            <div data-role="popup" id="popupMap" data-overlay-theme="a" data-theme="a" data-corners="false" data-tolerance="15,15">
    			<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
    			<iframe src="map.html" width="480" height="320" seamless></iframe>
			</div>  
        </div>
                
	</BODY>
</HTML>

