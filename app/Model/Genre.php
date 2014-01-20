<?php

App::uses('AppModel','Model');

class Genre extends AppModel {
	public $hasMany = array(
		'Book'  => array(
			'className' => 'Book',
			'dependent' => false
		)
	);
	
	function hasBooks($id=null) {
		$count = $this->Book->find('count', array('conditions'=> array('genre_id' => $id)));
		if($count == 0) {
			return false;
		}
		return true;
	}
}
?>