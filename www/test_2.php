<?php 
/**
 * Name Space Exercise
 */
require '../includes/config.php';

echo '<h2>Find the error below and echo my data.</h2>';

$nsObject = new NameSpace_Object();
$data = $nsObject->getMyData();
foreach ($data as $text) {
	echo $text. " ";
}

?>