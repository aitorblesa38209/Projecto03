<?php
include('login/session.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para loguearse
    header('location: index.php');
  }


//se realiza la conexión a la base de datos
$con = mysqli_connect('localhost','root','','bd_botiga_reserva_mejora') or die ('No se ha podido conectar'. mysql_error());

if ($_REQUEST['disponibilidad']==0){
  //consulta de inserción
  $insert = "INSERT INTO tbl_reservas (id_usuari, hora_entrada, id_material)
            SELECT tbl_usuaris.id_usuari as id_usuari, NOW() as hora_entrada, $_REQUEST[material] as id_material
            FROM tbl_usuaris WHERE tbl_usuaris.id_usuari = '$_SESSION[login_user]'";

  $update = "UPDATE tbl_material
            SET tbl_material.disponible = 1
            where tbl_material.id_material = $_REQUEST[material] ";

}else{

  $insert = "UPDATE tbl_reservas
            SET tbl_reservas.hora_salida = NOW()
            where tbl_reservas.id_material = $_REQUEST[material]";

  $update = "UPDATE tbl_material
            SET tbl_material.disponible = 0
            where tbl_material.id_material = $_REQUEST[material]";

}
echo $insert;
mysqli_query($con,$insert) or die ('La consulta ha fallado: '. mysql_error());
mysqli_query($con,$update) or die ('La consulta ha fallado: '. mysql_error());


//se redirige a la pantalla main con un mensaje
header('location:productos.php?');

?>

