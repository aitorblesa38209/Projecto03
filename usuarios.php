<?php
include('login/session.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }
//conexión a la base de datos
$conexion = mysqli_connect('localhost','root','','bd_botiga_reserva_mejora');
//Sentencia para mostrar todos los materiales de la tabla tbl_material
$sql = "SELECT tbl_usuaris.nom_usuari, tbl_usuaris.email_usuari, tbl_tipo_usuari.tipus_usuari, tbl_usuaris.id_usuari FROM tbl_usuaris INNER JOIN tbl_tipo_usuari ON tbl_tipo_usuari.id_tipo_usuari = tbl_usuaris.id_tipo_usuari";
?>
<!--INICIO WEB -->
<!DOCTYPE html>
<html>
  <head>
      <title>Oxford Intranet</title>
      <meta lang="es">
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
              <a href="mis_reservas.php"><li>RESERVAS</li></a>
              <li>USUARIOS</li>
            </ul>
          </nav>
        </section>
      </header>
      <div id="barraNegraDatos">
         <div id="barraOpciones">
            <form action="" method="get">
            <input type="submit" name="name" class="form2" value="Añadir Usuario">
         </div>
      </div>
        <main>
        <h1 class="titulo">Administrar Usuarios</h1>
        	<section>
            <!-- PARTE DONDE SE VA A MOSTRAR LA INFORMACIÓN -->
             
            <?php
            //echo $sql;
            //consulta de datos según el filtrado
              $datos = mysqli_query($conexion,$sql);
              ?>

              <table border bordercolor=black>
              <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Nivel Usuario</th>
                <th>Operaciones</th>
              </tr>
              <?php
           
              
                while ($mostrar = mysqli_fetch_array($datos)) {
                    echo "<tr><td>";
                    echo "$mostrar[nom_usuari]";
                    echo "</td><td>$mostrar[email_usuari]</td>";
                    echo "</td><td>$mostrar[tipus_usuari]</td>";
                    echo "<td><a href='modificar.php?id_usuari=$mostrar[id_usuari]'><i style='color: white;' class='fa fa-pencil fa-2x fa-pull-left fa-border'       title='modificar'></a></i>
                              <i style='color: white;' class='fa fa-trash fa-2x fa-pull-left fa-border' title='borrar'></i>";
                    echo "</td></tr>";

                }
            ?>
            <br/>
            </table>
            </div>
           
        	</section>
        </main>
    </body>
</html>
