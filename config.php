<?php
	ob_start();
	session_start();

	// Definições da base de dados
	define('dbhost', 'localhost');
	define('dbuser', 'root');
	define('dbpass', '');
	define('dbname', '3info2');

	// Conectando a base de dados (MySQL)
	try {
		$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {
		$errMsg = $e->getMessage();
	}
?>
