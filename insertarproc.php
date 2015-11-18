<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'bd_botiga_reserva_mejora');
			$sql = "INSERT INTO tbl_usuaris (nom_usuari, email_usuari, pass_usuari, id_tipo_usuari) VALUES ('$_REQUEST[nombre]', '$_REQUEST[email]', '$_REQUEST[pass]', $_REQUEST[tipo])";

			//echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: usuarios.php")
		?>
	</body>
</html>