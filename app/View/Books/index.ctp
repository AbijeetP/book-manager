<?php echo $this->Html->link(
	'Add Book',
	array('controller' => 'books', 'action' => 'add')
);?>
<h1>Books</h1>
<table>
	<tr>
		<th>Name</th>
		<th>Author</th>
		<th>Thriller</th>
		<th></th>
		<th></th>
	</tr>
	<?php foreach($books as $book):?>
	<tr>
		<td><?php echo $book['Book']['name']; ?>
		</td>
		<td><?php echo $book['Author']['name']; ?>
		</td>
		<td><?php echo $book['Genre']['name']; ?>
		</td>
		<td><?php echo $this->Html->link('Edit',array('action' => 'Edit',$book['Book']['id']));?>
		</td>
		<td><?php echo $this->Form->postLink('Delete',array('action' => 'Delete', $book['Book']['id']),
		array('confirm' => 'Are you sure you want to delete ' . $book['Book']['name'] . '?'));?>
		</td>
	</tr>
	<?php endforeach;?>
	<?php unset($books);?>
</table>
