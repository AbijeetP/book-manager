<?php

App::uses('AppModel','Model');

class Genre extends AppModel
{
	public $hasMany = array(
		'Book'  => array(
			'className'=> 'Book',
			'dependent'=> false
		)
	);

	public $validate = array(

		'name' =>  array(
			'rule'     => array('between',NAME_MIN,NAME_MAX),
			'required'=> true,
			'message' => NAME_LENGTH_MSG
		)
	);


	function hasBooks($id = null)
	{
		$count = $this->Book->find('count', array('conditions'=> array('genre_id'=> $id)));
		if($count == 0)
		{
			return false;
		}
		return true;
	}
}
?>