<?php 
/**
 * Error Logging and Data handling Exercise
 */
require '../includes/config.php';

echo '<h2>Echo Array Values</h2>';
$data = array('we', 'love', 'nerf', 'darts', array('we', 'dont', 'like', 'tuna', 'tacos'));
foreach ($data as $text) {
	if(is_array($text)) foreach($text as $subtext) echo $subtext." ";
	else echo $text . "<br />";
}

echo '<h2>Echo JSON String</h2>';
$json = new Json();
$jsonString = $json->encodeData($data);
echo $jsonString;

echo '<h2>Echo JSON Values</h2>';
$temp_data = $json->decodeData($jsonString);
$data_array = get_object_vars($temp_data);
$data = $data_array["data"];
foreach ($data as $text) {
	if(is_array($text)) foreach($text as $subtext) echo $subtext." ";
	else echo $text . "<br />";
}

echo '<h2>Echo XML Text Nodes</h2>';
$xml = simplexml_load_file('../includes/sample.xml');
$data = get_object_vars($xml);
foreach ($xml as $text) {
	$text_array = get_object_vars($text);
	foreach($text_array as $text)
	{
		if (is_object($text))
		{
			$extra_text_array = get_object_vars($text);
			echo " &nbsp; &nbsp; ". $extra_text_array["Text"] . "<br><br>";
		}
		else echo $text_array["Text"] . "<br />";
	}
}
?>