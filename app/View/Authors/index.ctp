<h1>Authors</h1>
<?php 
echo $this->Html->link(
	'Add Author',
	array('controller' => 'authors', 'action' => 'add')
);?>
<?php echo $this->Session->flash(); ?>
<table>
	<tr>
		<th>Name</th>
		<th></th>
		<th></th>
	</tr>
	<?php foreach($authors as $author): ?>
	<tr class='tbRows'>		
		<td><?php echo $author['Author']['name']?></td>
		<td><?php echo $this->Html->link('Edit', array('action'=>'edit', $author['Author']['id']))?></td>
		<td><?php echo $this->Form->postLink('Delete', array('action'=>'delete', $author['Author']['id']),
				array('confirm' => 'Are you sure you want to delete ' . $author['Author']['name'] . '?'))?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($authors) ?>
</table>
