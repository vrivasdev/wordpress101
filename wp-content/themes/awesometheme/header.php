<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Awesome Theme</title>
		<?php wp_head();?> <!-- It calls all header included files -->
	</head>
	<body>

		<?php wp_nav_menu(array('theme_location' => 'primary')); ?>