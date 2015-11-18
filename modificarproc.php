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
			$sql = "UPDATE tbl_usuaris SET nom_usuari='$_REQUEST[nom]', email_usuari='$_REQUEST[email]', id_tipo_usuari=$_REQUEST[tipo] WHERE id_usuari=$_REQUEST[id]";

			//echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: usuarios.php")
		?>
	</body>
</html>