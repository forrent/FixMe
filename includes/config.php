<?php 

date_default_timezone_set('America/New_York');
error_reporting(E_ALL);

function error_logger ($errno, $errstr, $errfile, $errline)
{
	$f = fopen(dirname(__FILE__) . '/error.log', 'a+');
	fwrite($f, print_r($errstr . ' file: ' . $errfile . ' line: ' . $errline . "\n", true));
	fclose($f);
}

set_error_handler("error_logger");

set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . '/model/');

function model_autoload ($class) {
	
	$found = false;
	$paths = explode(PATH_SEPARATOR, get_include_path());
	
	foreach ($paths as $path) {
		if (class_exists($class, false)) {
			$found = true;
			break;
		}
		if (file_exists($path . str_replace('_', '/', $class) . '.php')) {
			require_once $path . str_replace('_', '/', $class) . '.php';
			$found = true;
			break;
		}
	}
	
	if (!$found) {
		trigger_error($class . ' does not exist.');
	}
}

spl_autoload_register('model_autoload');
?>