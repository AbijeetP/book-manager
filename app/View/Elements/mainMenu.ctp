<?php
$menus = array(
	array('label'     => 'Books','controller'=> 'Books','action'    => 'index'),
	array('label'     => 'Authors','controller'=> 'Authors','action'    => 'index'),
	array('label'     => 'Genres','controller'=> 'Genres','action'    => 'index')
);
?>
<ul class='topMostMenu'>
<?php
$addClass = '';
foreach($menus as $menu) :
if(strtolower($this->params['controller']) === strtolower($menu['controller']))
{
	$addClass = 'active';
}
?>
<li class='menuList'>
<?php
echo $this->Html->link($menu['label'], array('controller'=> $menu['controller'],'action'    => $menu['action']),array('class'=> $addClass));
$addClass = '';
?>
</li >
<?php endforeach;
?>
</ul >