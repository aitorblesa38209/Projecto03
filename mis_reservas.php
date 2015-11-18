<?php
include('login/session.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }
//conexión a la base de datos o mensaje en caso de error
$conexion = mysqli_connect('localhost','root','','bd_botiga_reserva_mejora') or die ('No se ha podido conectar'. mysql_error());
?>

<!--INICIO WEB -->
<!DOCTYPE html>
<html>
  <head>
      
      <meta lang="es">
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
  </head>
    <body>

<a name="top">
        <!--BARRA NEGRA SUPERIOR -->
      <div id="barraUser">
        <div id="barraLogin">
          <ul id="listaLogin">
            <li class="username"><?php echo $login_session?> </li>
            <li><a href="login/logout.php"><img src="img/exit.png" alt="Salir" title="Salir" /></a></li>
          </ul>
        </div>
      </div>

        <!--BARRA DE MENÚ -->
      <header>
        <section id="cabecera">
          <figure>
            <a href="productos.php"><img src="img/logo.png"/></a>
          </figure>
          <nav>
            <ul>
              <a href="productos.php"><li>INICIO</li></a>
              <li>RESERVAS</li>
               <a href="usuarios.php"><li>USUARIOS</li></a>
            </ul>
          </nav>
        </section>
      </header>
      <div id="barraNegraDatos">
         <div id="barraOpciones">

           <!-- FORMULARIO SELECT PARA FILTRAR EL CONTENIDO -->
           
         </div>
      </div>
        <main>
        <h1 class="titulo">Mis Reservas</h1>
        	<section class="formulario">
            <!-- PARTE DONDE SE VA A MOSTRAR LA INFORMACIÓN -->
             
            <?php
            $sql = "SELECT * FROM tbl_material
                             INNER JOIN tbl_reservas ON tbl_reservas.id_material = tbl_material.id_material
                            WHERE tbl_reservas.id_usuari = $_SESSION[login_user]";
            
            //consulta de datos según el filtrado
            $datos = mysqli_query($conexion,$sql);
              if(mysqli_num_rows($datos)!=0){
                    while ($mostrar = mysqli_fetch_array($datos)) { 
                        echo "<br/><b class='negrita'>Nombre de la aula: </b>".utf8_encode($mostrar['nombre_material'])."";
                        echo "<br/><img src='img/material/".$mostrar['id_material'].".jpg'/><br/><br/>";
                        echo "<a class='clasedeA' href='productosliberar.php?$mostrar[disponible]& id_material=$mostrar[id_material]'> Liberar </a>    <br/>";
                        echo "<hr><br/>";
                    }

                }
                   
            ?>
        	</section>
        </main>
    </body>
</html>
