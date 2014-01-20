<h1>Edit Author</h1>
<?php
	echo $this->Form->create('Author');
	echo $this->Form->input('name');
	echo $this->Form->end('Save Author');
	echo $this->Form->input('id', array('type' => 'hidden'));
?>