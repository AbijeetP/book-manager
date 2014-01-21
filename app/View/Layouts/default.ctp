<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
	$cakeDescription = __d('cake_dev', 'Book Manager : A simple app using CakePHP');
	$pageTitle = 'Book Manager : A simple app using CakePHP';
?>
<!DOCTYPE html>
<html>	
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $pageTitle; ?>			
		</title>
		<?php
			 echo $this->Html->meta('icon');

			echo $this->Html->css('style');

			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
	</head>
	<body>
		<div id='header'>
			<h1><?php echo $this->Html->link($pageTitle, array('controller' => 'books', 'action' => 'index', 'home')); ?></h1>
		</div>
		<div id='navBar'>
			<?php echo $this->element('mainMenu') ?>
		</div>
		<div id='content'>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id='footer'>
			<?php echo $cakeDescription?>
		</div>
	</body>
</html>

