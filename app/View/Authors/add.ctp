<h1>Add Author</h1>
<?php
	echo $this->Form->create('Author');	
	echo $this->Form->input('name');
	echo $this->Form->end('Save Author');
?>