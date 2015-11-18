<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'BD_exemple');
			$sql = "INSERT INTO producto (pro_nom, pro_descripcio, pro_preu, tip_id) VALUES ('$_REQUEST[nom]', '$_REQUEST[des]', $_REQUEST[pre], $_REQUEST[tip])";

			//echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: index.php")
		?>
	</body>
</html>