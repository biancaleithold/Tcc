<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listagem PHP</title>
</head>
<body>


	<?php
		echo "Listagem";
		require 'config.php';

		$consulta = $connect->query("SELECT id_usuario, fullname, email FROM usuario;");
		while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
			echo "ID: {$linha['id']} - Usuario: {$linha['fullname']} - Email{$linha['email']} ";
			
		}

	?>
</body>
</html>
