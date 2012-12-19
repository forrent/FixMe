<?php 

class Json {
	
	public function encodeData ($data) {
		return json_encode(array($data));
	}
	
	public function decodeData ($jsonString) {
		return json_decode($jsonString);
	}
}