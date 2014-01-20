<?php
App::uses('AppModel', 'Model');

class Author extends AppModel {
	public $hasMany = array(
		'Book'  => array(
			'className' => 'Book',
			'dependent' => false
		)
	);
	
	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'This field is mandatory.'
		)
	);
	
	function hasBooks($id=null) {
		$count = $this->Book->find('count', array('conditions'=> array('author_id' => $id)));
		if($count == 0) {
			return false;
		}
		return true;
	}
}
?>