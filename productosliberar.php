<?php
include('login/session.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para loguearse
    header('location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Proyecto 2">
        <meta name="keywords" content="HTML5, CSS3, JavaScript">
        <link rel="stylesheet" href="css/estilo.css">
        <title>Reservar</title>
    </head>
    <body class="fondo">

    <div id="barraUser">
        <div id="barraLogin">
          <ul id="listaLogin">
            <li class="username"> <?php echo $login_session?> </li>
            <li><a href="login/logout.php"><img src="img/exit.png" alt="Salir" title="Salir" /></a></li>
          </ul>
        </div>
      </div>
            <div class="centrado">
                <?php
                $con = mysqli_connect('localhost','root','','bd_botiga_reserva_mejora');
                $sql="INSERT INTO `tbl_reservas`(`id_usuari`, `hora_salida`, `id_material`) VALUES ($_SESSION[login_user], NOW(), $_REQUEST[id_material])";
                $sql2="UPDATE tbl_material SET disponible= 0 WHERE id_material= $_REQUEST[id_material]";
                $sql3="UPDATE tbl_reservas SET id_usuari= NULL WHERE id_material= $_REQUEST[id_material]";
               // echo $sql3;
                $datos=mysqli_query($con,$sql);
                $datos2=mysqli_query($con,$sql2);
                $datos3=mysqli_query($con,$sql3);
                //se redirige a la pantalla main 
                header('location:productos.php?');
               ?>
            
            </div>
    </body>
</html>
