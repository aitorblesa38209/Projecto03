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
			//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
			$sql = "SELECT * FROM tbl_usuaris";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			?>
		<form action="insertar.proc.php" method="GET">
			Nombre:<br/>
			<input type="text" name="nom" size="20" maxlength="25"><br/>
			Descripción:<br/>
			<textarea name="des" cols="20" rows="5"></textarea><br/>
			Precio:<br/>
			<input type="text" name="pre" size="5" maxlength="8"><br/>
			Tipo:<br/>
			<select name="tip">
			<?php
				while ($tipo=mysqli_fetch_array($datos)){
					 echo "<option value=$Opciones[id_tipo_usuari]>$Opciones[tipus_usuari]</option>";
                  }
				

			?>
			</select><br/><br/>
			<input type="submit" value="Enviar">
		</form>
		<br/><br/>
		<a href="index.php">Volver</a>
	</body>
</html>