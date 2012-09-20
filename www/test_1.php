<?php 
/**
 * Error Logging and Data handling Exercise
 */
require '../includes/config.php';

echo '<h2>Echo Array Values</h2>';
$data = array('we', 'love', 'nerf', 'darts', array('we', 'dont', 'like', 'tuna', 'tacos'));
foreach ($data as $text) {
	echo $text . "<br />";
}

echo '<h2>Echo JSON String</h2>';
$json = new Json();
$jsonString = $json->encodeData($data);
echo $jsonString;

echo '<h2>Echo JSON Values</h2>';
$data = $json->decodeData($jsonString);
foreach ($data as $text) {
	echo $text . "<br />";
}

echo '<h2>Echo XML Text Nodes</h2>';
$xml = simplexml_load_file('../includes/sample.xml');
foreach ($xml as $text) {
	echo $text;
}
?>