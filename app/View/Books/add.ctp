<h1>Add Books</h1>
<?php
	echo $this->Form->create('Book');
	echo $this->Form->input('name');
	echo $this->Form->input('Book.author_id', array('empty' => 'Select Author'));
	echo $this->Form->input('Book.genre_id', array('empty' => 'Select Genre'));
	echo $this->Form->end('Save Book');
?>