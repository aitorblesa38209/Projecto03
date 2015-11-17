<?php
include('login/session.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }



//conexión a la base de datos o mensaje en caso de error
$conexion = mysqli_connect('localhost','root','','bd_botiga_reserva_mejora') or die ('No se ha podido conectar'. mysql_error());

//Sentencia para mostrar todos los materiales de la tabla tbl_material
$sql = "SELECT nom_usuari, email_usuari, tipus_usuari FROM tbl_usuaris";


//comprobación si está instanciada la variable opciones (viene de un select de filtrado en el formulario de cabecera)

?>
<!--INICIO WEB -->
<!DOCTYPE html>
<html>
  <head>
      <title>Oxford Intranet</title>
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
              <li>USUARIOS</li>
            </ul>
          </nav>
        </section>
      </header>
      <div id="barraNegraDatos">
         <div id="barraOpciones">

          
         </div>
      </div>
        <main>
        	<section>
            <!-- PARTE DONDE SE VA A MOSTRAR LA INFORMACIÓN -->
             <h1 class="titulo">Administrar Usuarios</h1>
            <?php
            //consulta de datos según el filtrado
              $datos = mysqli_query($conexion,$sql);
              //si se devuelve un valor diferente a 0 (hay datos)
              if(mysqli_num_rows($datos)!=0){
                while ($mostrar = mysqli_fetch_array($datos)) {
            ?>
            <br/>
            <div id="divMaterialReserva">

                <table>
                  <tr>
                    <th>Email Usuario</th>
                    <th>Nombre Usuario</th>
                    <th>Tipo Usuario</th>
                    
                  </tr>
      
                  <tr class="estilotabla">

                    <td><?php echo $mostrar['email_usuari'];  ?></td>
                    <td><?php echo utf8_encode($mostrar['nom_usuari']); ?></td>
                    <td><?php echo utf8_encode($mostrar['tipus_usuari']); ?></td>
                  
                    
                 
                  </tr>
                </table>
            </div>
            <?php
            }
          }else{
            ?>
            <br/>
            <div>
                <table>
                  <tr>
                    <th>
                    <p><img src="img/info.png" id="info" alt="info" title="info" /> NO HAY DATOS QUE MOSTRAR </p>
                    </th>
                  </tr>
                </table>
            </div><?php
              }
            ?>
        	</section>
        </main>
    </body>
</html>
