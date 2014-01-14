<?php
@session_start();
//error_reporting(E_ALL);
include_once('helper.php');
/**
 *  Armadillo Workflow Platform v2.0 - Online
 *  A simple pipeline system for phylogenetic analysis
 *  
 *  Copyright (C) 2009-2012  Etienne Lord
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 * 
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
	
	//====================================================================================
	//= UPDATE
	//====================================================================================
	 if(isset($_REQUEST['action'])){
		$operation = $_REQUEST['action'];	
		if ($operation=="upload") {
					
		}		
			
	}		

	
	
?>

<?php 
	//--Load include

	
	
	
?>	
<!doctype html>
<html lang="en" xmlns:ng="http://angularjs.org" id="ng:app" ng-app="myApp">
	<HEAD>
		<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
		<META HTTP-EQUIV="Expires" CONTENT="-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="viewport" content="height=device-height, initial-scale=1.0"/>
		
    	<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />

			<link rel="shortcut icon" href="data/favicon.ico" />  
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.2/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		 <!-- <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script> -->
		 <script src="js/jquery.mobile-1.3.1.min.js"></script>	<!-- This don't work-->			
		<script type="text/javascript" src="js/angular.min.js"></script>
				
		 
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.0.1-p7/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.0.1-p7/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.0.1-p7/js/bootstrap.min.js"></script>		
		<script type="text/javascript" src="js/localStorageModule.js"></script>   
	
		<script type="text/javascript" src="js/controler/mainCtrl.js"></script>
			<script type="text/javascript" src="js/util.js"></script>
		<!-- load angular -->
		<script type="text/javascript">
						
					//////////////////////////////////////////////////////////
					/// MAIN APPLICATION
					
					var parsedUrl = $.mobile.path.parseUrl( location.href );
					
					if (parsedUrl.hrefNoHash!=parsedUrl.href) {
						var newurl=parsedUrl.href.substring(parsedUrl.hrefNoHash.length);
						location.href=parsedUrl.hrefNoHash;
						//$.mobile.changePage( newurl, { changeHash: false });
					}
					
					var myApp = angular.module('myApp',['LocalStorageModule']).config(function($locationProvider) {					
							$locationProvider.html5Mode(true);
					});	


							
				
		</script>


</HEAD>
	
	<BODY ng-controller='MainCtrl'>
	<div data-role="page" id="pagePrincipale">
            <div data-role="header" style="padding:0px" data-theme="b">                
                <!-- Show if we are logged or not -->
				<a target="_self" href="#popupLogout" data-rel="dialog" data-role="button" data-icon="check" data-transition="slide-down">Logout</a> 
                <h1>Armadillo Workflow online</h1>
            </div><!-- /header -->
            <div data-role="content">
			
				{{getRows()}} {{getColumns()}} 
				{{getNbColumns()}}
				<table border=1>
					<!-- Iterate over row -->
					<tr><td ng-repeat="y in getColumns()">Gene</td></tr>
					<tr ng-repeat="x in getRows()">
					<!-- Iterate over column -->
					<td ng-repeat="y in getColumns()">
					{{getMatrix(x,y);}} 
					</td>
					<td ng-show='x==0'>Add column</td>
					<tr>
					<tr ><td colspan="{{getNbColumns()+1}}">Add row</td></tr>
				</table>	

			</div>
	</div>
	</BODY>
</HTML>	
	