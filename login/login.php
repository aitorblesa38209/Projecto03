<?php

//Inicializamos la sesion
session_start();

//Variable que muestra el error
$error=""; 

//Si no existe la variable enviamos la variable error al html de index
if (isset($_REQUEST['submit'])) {
	if (empty($_REQUEST['user']) || empty($_REQUEST['pass'])){
		$error ="<span>Usuario o Contraseña incorrectos</span>";
	}
else
{
//Definimos la variable usuario y password
$username = $_REQUEST['user'];
$password = $_REQUEST['pass'];

//Establecemos conexion con el servidor y la Base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'bd_botiga_reserva_mejora');//Consulta sql para usuario y password
$sql = "SELECT * FROM tbl_usuaris WHERE email_usuari='$username' AND pass_usuari='$password'";
$datos = mysqli_query($conexion,$sql);
// $sql2 = "SELECT id_usuario FROM tbl_usuario";
// $idusername = mysqli_query($conexion,$sql2);

//Comprobamos si existe una linea y creamos la sesion
if (mysqli_num_rows($datos) == 1) {
	$pro = mysqli_fetch_array($datos);
	$idusername=$pro['id_usuari'];

	$_SESSION['login_user'] = $idusername; //Inicializamos la sesion
	echo "$_SESSION";
	header('location:./productos.php'); //Llevamos al usuario a su perfil con su sesion
}else{
	$error ="<span>Usuario o Contraseña incorrectos</span>";
}
mysqli_close($conexion); //Cerramos la conexion con la Base de datos
}
}
?>