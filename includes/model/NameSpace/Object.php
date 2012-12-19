<?php 
class NameSpace_Object extends Name {
	public function implement() {
		echo "Method implemented stop complaining :-)";
	} 
	
	public function getMyData () {
		return parent::getMyData();
	}
	
}
?>