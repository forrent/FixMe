<?php 

class Json {
	
	public function encodeData ($data) {
		return json_encode(array('data' => $data));
	}
	
	public function decodeData ($jsonString) {
		return json_decode($jsonString);
	}
}
?>