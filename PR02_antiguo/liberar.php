<?php
include('session.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Proyecto 2">
        <meta name="keywords" content="HTML5, CSS3, JavaScript">
        <link rel="stylesheet" href="css/style.css">
		<title>Reservar</title>
	</head>
	<body class="fondo">
		<div class="fondo">
			<header>
			<p class="username"><?php echo $login_session; ?> ||  <a href="index.php">Cerrar sesión</a></p>
	        </header>
			<div class="centrado">
	<?php
		$con = mysqli_connect('localhost', 'root', '', 'bd_botiga_reserva');
		$sql = "UPDATE tbl_recurs SET tbl_recurs.estado = 'disponible' , id_usuari = NULL WHERE tbl_recurs.nom_recurs = '$_REQUEST[nom_recurs]'";
		$datos = mysqli_query($con, $sql);
		if ($datos) {
			echo "Se ha liberado satisfactoriamente.";
		} else {
			echo "ERROR.";
		}
	?>
	<br>
	<form action="mis_reservas.php" id="botonform"> 
    <button class="form2" type="submit">Volver</button>
    </form>
</div>
		</div>
	
	</body>
</html>