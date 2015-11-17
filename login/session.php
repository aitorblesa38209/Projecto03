<?php
$con = mysqli_connect('localhost', 'root', '', 'bd_botiga_reserva_mejora');
session_start();
$user_check=$_SESSION['login_user'];
$sql = "SELECT * FROM tbl_usuaris WHERE id_usuari = '$user_check'";
$datos = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($datos);
$login_session =$row['nom_usuari'];
?>