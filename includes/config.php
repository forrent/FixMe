<?php 

date_default_timezone_set('America/New_York');
error_reporting(E_ALL);
ini_set('display_errors', 'Off');

function error_logger ($errno, $errstr, $errfile, $errline)
{
	$f = fopen(dirname(__FILE__) . '/error.log', 'a+');
	fwrite($f, print_r($errstr . ' file: ' . $errfile . ' line: ' . $errline . "\n", true));
	fclose($f);
}

function shutdown ()
{
	if (@is_array($e = @error_get_last())) 
	{
		$code = isset($e['type']) ? $e['type'] : 0;
		$errstr = isset($e['message']) ? $e['message'] : '';
		$errfile = isset($e['file']) ? $e['file'] : '';
		$errline = isset($e['line']) ? $e['line'] : '';
		
		if ($code>0) 
		{
			$f = fopen(dirname(__FILE__) . '/error.log', 'a+');
			fwrite($f, print_r("FATAL ERROR: " . $errstr . ' file: ' . $errfile . ' line: ' . $errline . "\n", true));
			fclose($f);
			echo "Somethings wrong here. Our technical team is working on it.<br>";
		}
    }
}

register_shutdown_function('shutdown');

set_error_handler("error_logger");

set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR);

function model_autoload ($class) {
	$found = false;
	$paths = explode(PATH_SEPARATOR, get_include_path());
	
	foreach ($paths as $path) {
		if (class_exists($class, false)) {
			$found = true;
			break;
		}
		
		if (file_exists($path . str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php')) {
			require_once $path . str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';
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