<?php
	require_once "interpreter/main.class.php";

	$code = 'h some;;h';
	$class = new xitram($code);

	$class->execute();
?>
