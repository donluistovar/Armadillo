<?php
///////////////////////////////////////////////////	
/// This test various attributes of the server
$error="";
//--Test usagers
if (!is_dir('usagers')) {
		//echo 'Warning the <b>usagers</b> directory is not created. ';
		$error = $error .'Warning the <b>usagers</b> directory is not created.<br>';
}

if (!is_writable('usagers')) {
	$error=  $error .'Warning the <b>usagers</b> directory is not <b>writable</b>.<br>';
}

if (!is_executable('usagers')) {
	$error=  $error .'Warning the <b>usagers</b> directory is not <b>executable</b>.<br>';
}

//--Test Armadillo
if (!file_exists('Armadillo.jar')) {
		$error= $error . 'Warning the <b>Armadillo.jar</b> is not found...<br> ';
}

if (!is_dir('lib')) {
		$error=  $error .'Warning the <b>Armadillo lib</b> directory was not found.<br> ';
}

if (!file_exists('config.dat')) {
		$error=  $error .'Warning the <b>Armadillo config.dat</b> is not found.<br> ';
}

//--Test Program
if ($error!="") echo $error;
?>