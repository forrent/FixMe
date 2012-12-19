<?php 
/**
 * Error Logging and Data handling Exercise
 */
require '../includes/config.php';

echo '<h2>Echo Array Values</h2>';
 $data = array('we', 'love', 'nerf', 'darts', array('we', 'dont', 'like', 'tuna', 'tacos')); 
foreach ($data as $text) {
	if(!is_array($text)) {
	print $text . "<br/>";
  	}
	if(is_array($text)) {
	foreach ($text as $val) {
		echo $val . "<br />";
	}	
  }
}

echo '<h2>Echo JSON String</h2>';
$json = new Json();
$jsonString = $json->encodeData($data);
echo $jsonString;

echo '<h2>Echo JSON Values</h2>';
$data = $json->decodeData($jsonString);
foreach ($data as $text) { 
foreach ($text as $val) {
	if(!is_array($val)) {
	print $val . "<br />";
	}
	if(is_array($val)) {
	foreach ($val as $items) {
		echo $items . "<br/>";
		}
	  }
	}
}

echo '<h2>Echo XML Text Nodes</h2>';
$xml = simplexml_load_file('../includes/sample.xml');
echo "***Printing only <text> nodes***"; 
foreach ($xml->Data as $key=>$text) {
	echo $text->Text . "\n";
}

echo "***Printing both <text> nodes***";
foreach ($xml->Data as $key=>$text) {
	echo $text->Text . "\n";
	echo $text->Extra->Text . "\n";
}

?>