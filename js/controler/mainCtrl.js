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
				
			var MainCtrl=function ($rootScope,$scope,$timeout, $location, $http, $locale, $compile, $window,$filter) {  						

						
						
						//--Matrix array
						$scope.matrix=[];
						$scope.matrix[0]=[];
						$scope.matrix[1]=[];
						
						$scope.matrix[0][0]=1;
						$scope.matrix[0][1]=0;
						$scope.matrix[1][0]=1;
						$scope.matrix[1][1]=0;
						
						////////////////////////////////
						// MATRIX FUNCTION
						
						$scope.getNbRow=function() {
							return $scope.matrix.length;
						}
						
						$scope.getNbColumns=function() {
							if (isDefine($scope.matrix[0])) {
								console.log($scope.matrix[0].length);
								return $scope.matrix[0].length;
								}
							return 0;	
						}
						
						$scope.getRowTitle=function() {
							var tmp=[];
						
							for (var i=0; i<$scope.getNbRow();i++) {
								tmp[i]=$scope.matrix[i];
							}														
							return tmp;
						}
						
						$scope.getColumnsTitle=function(col) {
							var tmp=[];
						
							for (var j=0; j<$scope.getNbColumns();j++) {
								tmp[j]=$scope.matrix[0][j];
							}														
							return tmp;
						}
						
						$scope.getRows=function() {
							var tmp=[];
							for (var i=0; i<$scope.getNbRow();i++) tmp[i]=i;
							return tmp;
						}
						
						$scope.getColumns=function() {
							var tmp=[];
							for (var i=0; i<$scope.getNbColumns();i++) tmp[i]=i;
							return tmp;
						}
						
						$scope.getMatrix=function(i, j) {
							console.log($scope.matrix);
							return $scope.matrix[i][j];
						}
						
						////////////////////////////////
						// FILE FUNCTION
						
						
						$scope.user_files=[];
						/*
							Load current user files
						*/
						$http.get('file_upload.php?action=listfiles')
								.then( function(res) {
								//console.log(res);
									$scope.user_files=res.data;
								});
						
					$scope.remove=function(file) {
						$http.get('file_upload.php?action=remove&filename='+file.filename).then( function(res) {
								//console.log(res);
								location.reload();
								
						});
					}
					
					$scope.execute=function(file) {
						console.log("Executing "+file.filename);
						$http.get('file_upload.php?action=run_workflow&filename='+file.filename).then( function(res) {
								console.log(res.data);
								location.reload();
								
						});
					}
					
					
					
					
			}