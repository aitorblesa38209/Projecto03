<?php
include('login/session.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }
//conexión a la base de datos

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
            <form action="insertar.php" method="get">
            <input type="submit" name="name" class="form2" value="Añadir Usuario">
         </div>
      </div>
        <main>
        <h1 class="titulo">Administrar Usuarios</h1>
            <section>
            <!-- PARTE DONDE SE VA A MOSTRAR LA INFORMACIÓN -->
             <table border bordercolor=black>
              <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Nivel Usuario</th>
                <th>Operaciones</th>
              </tr>
        <?php
        $conexion = mysqli_connect('localhost','root','','bd_botiga_reserva_mejora');
        $sql = "SELECT * FROM tbl_usuaris INNER JOIN tbl_tipo_usuari ON tbl_tipo_usuari.id_tipo_usuari = tbl_usuaris.id_tipo_usuari";
        $sql2 = "SELECT * FROM tbl_usuaris WHERE id_usuari = $_SESSION[login_user]";
        $datos = mysqli_query($conexion,$sql);
        $datos2 = mysqli_query($conexion,$sql2);
        $mostrar2 = mysqli_fetch_array($datos2);
          
        while ($mostrar = mysqli_fetch_array($datos)) {
        	switch ($mostrar2['id_tipo_usuari']) {
                
                case 2:
                    echo "<tr><td>";
                    echo "$mostrar[nom_usuari]";
                    echo "</td><td>$mostrar[email_usuari]</td>";
                    echo "</td><td>$mostrar[tipus_usuari]</td>";
                    echo "<td><a href='modificar.php?id_usuari=$mostrar[id_usuari]'><i style='color: white;' class='fa fa-edit fa-2x fa-pull-left fa-border' title='modificar'></a></i>";
                    echo "</td></tr>";
                break;

                case 3:
                    echo "<tr><td>";
                    echo "$mostrar[nom_usuari]";
                    echo "</td><td>$mostrar[email_usuari]</td>";
                    echo "</td><td>$mostrar[tipus_usuari]</td>";
                    echo "<td><a href='modificar.php?id_usuari=$mostrar[id_usuari]'><i style='color: white;' class='fa fa-edit fa-2x fa-pull-left fa-border' title='modificar'></a></i>
                              <a href='eliminarproc.php?id_usuari=$mostrar[id_usuari]'><i style='color: white;' class='fa fa-trash fa-2x fa-pull-left fa-border' title='borrar'></a></i>";
                    echo "</td></tr>";
                break;
            }
        }    
                  
            ?>
            <br/>
            </table>
            </div>
           
            </section>
        </main>
    </body>
</html>