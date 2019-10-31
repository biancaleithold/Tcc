<?php
  	require 'config.php';
	unset($_SESSION['name']);
	unset($_SESSION['email']);
	session_destroy();
	header('Location: index.php');
	exit();
?>
