<?php
App::uses('AppModel', 'Model');

class Book extends AppModel
{
	public $belongsTo = array(
		'Author' => array(
			'className' => 'Author',
			'foreignKey'=> 'author_id'
		),
		'Genre'    => array(
			'className' => 'Genre',
			'foreignKey'=> 'genre_id'
		)
	);

	public $validate = array(
		'name' =>  array(
			'rule'    => array('between',NAME_MIN,NAME_MAX),
			'required'=> true,
			'message' => NAME_LENGTH_MSG
		),
		'author_id' => array(
			'rule'		=> 'notEmpty',
			'required' => true,
			'message' => NOT_EMPTY
		),
		'genre_id' => array(
			'rule'		=> 'notEmpty',
			'required' => true,
			'message' => NOT_EMPTY
		)
	);
}
?>