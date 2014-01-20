<h1>Edit Genre</h1>
<?php
	echo $this->Form->create('Genre');
	echo $this->Form->input('name');
	echo $this->Form->end('Save Genre');
	echo $this->Form->input('id', array('type' => 'hidden'));
?>