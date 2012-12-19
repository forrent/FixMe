<?php 

abstract class Name {
	
	abstract public function implement (); 
	
	public function getMyData () {
		$data = array('i', 'have', 'data', 'for', 'you');
		return $data;
	}
}
?>