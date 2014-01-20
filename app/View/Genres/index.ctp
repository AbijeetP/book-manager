<h1>Genres</h1>
<?php 
echo $this->Html->link(
	'Add Genre',
	array('controller' => 'genres', 'action' => 'add')
);?>
<?php echo $this->Session->flash(); ?>
<table>
	<tr>
		<th>Name</th>
		<th></th>
		<th></th>
	</tr>
	<?php foreach($genres as $genre): ?>
	<tr class='tbRows'>		
		<td><?php echo $genre['Genre']['name']?></td>
		<td><?php echo $this->Html->link('Edit', array('action'=>'edit', $genre['Genre']['id']))?></td>
		<td><?php echo $this->Form->postLink('Delete', array('action'=>'delete', $genre['Genre']['id']),
				array('confirm' => 'Are you sure you want to delete ' . $genre['Genre']['name'] . '?'))?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($authors) ?>
</table>
