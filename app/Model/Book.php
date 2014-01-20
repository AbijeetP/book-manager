<?php
App::uses('AppModel', 'Model');

class Book extends AppModel
{
	public $belongsTo = array(
		'Author' => array(
			'className' => 'Author',
			'foreignKey' => 'author_id'
		),
		'Genre'  => array(
			'className' => 'Genre',
			'foreignKey' => 'genre_id'
		)
	);
}
?>