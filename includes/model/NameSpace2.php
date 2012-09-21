<?php 

abstract class NameSpace2 {
	
	abstract public function implement (); 
	
	public function getMyData () {
		$data = array('i', 'have', 'data', 'for', 'you');
		return $data;
	}
}
?>