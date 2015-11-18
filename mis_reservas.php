<?php
include('login/session.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }
//conexión a la base de datos o mensaje en caso de error
$conexion = mysqli_connect('localhost','root','','bd_botiga_reserva_mejora') or die ('No se ha podido conectar'. mysql_error());

//Sentencia para mostrar todos los materiales de la tabla tbl_material
$sql = "SELECT DISTINCT tbl_reservas.id_reserva, tbl_reservas.id_material, tbl_usuaris.email_usuari, tbl_reservas.hora_entrada, tbl_reservas.hora_salida, tbl_reservas.id_material, tbl_material.nombre_material, tbl_material.disponible
        FROM tbl_reservas
        INNER JOIN tbl_usuaris on tbl_usuaris.id_usuari = tbl_reservas.id_usuari
        INNER JOIN tbl_material on tbl_material.id_material = tbl_reservas.id_material
        INNER JOIN tbl_tipo_material on tbl_material.id_tipo_material = tbl_material.id_tipo_material";

//comprobación si está instanciada la variable opciones (viene de un select de filtrado en el formulario de cabecera)
if(isset($_REQUEST['opciones'])){
  //si los valores son mayores de 0,
  if ($_REQUEST['opciones']>0) {
    //se añadirá a la consulta según: 0 - Aulas, 1 - Material informático
    $sql .= " WHERE tbl_material.id_tipo_material =".$_REQUEST['opciones'];
  }
}

//consulta para filtrado de reservado o devuelto
if(isset($_REQUEST['devuelto'])){
    $sql .= " AND tbl_material.disponible =".$_REQUEST['devuelto'];
  }

$sql .= " ORDER BY tbl_reservas.hora_entrada DESC";
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
           <form action="mis_reservas.php" method="get">
             <select name="opciones" class="formul">
               <option value="" disabled selected>Filtrar por...</option>
               
               <?php
                  //Rellenar datos del SELECT con los datos de la base de datos
                  $sqlTipo = "SELECT * FROM tbl_tipo_material ";
                  //consulta del select
                  $query = mysqli_query($conexion,$sqlTipo);
                  //mientras por cada dato en el array $query
                  while ($mostrarOpciones = mysqli_fetch_array($query)) {
                  //crea una opción en el dato extraido de la base de datos
                  echo "<option value='$mostrarOpciones[id_tipo_material]'>$mostrarOpciones[tipo]</option>";
                  }
                ?>
              </select>
              <select name="devuelto" class="formul">
               <option value="" disabled selected>Filtrar por...</option>
                <option value="0">Devuelto</option>
                <option value="1">Reservado</option>
              </select>
              <input type="submit" name="name" class="form2" value="Mostrar">
           </form>
         </div>
      </div>
        <main>
        	<section class="formulario">
            <!-- PARTE DONDE SE VA A MOSTRAR LA INFORMACIÓN -->
             <h1 class="titulo">Mis Reservas</h1>
            <?php
            $sql2 = "SELECT * FROM tbl_material, tbl_usuaris WHERE tbl_usuaris.id_usuari = $_SESSION[login_user]";
            //consulta de datos según el filtrado
              $datos = mysqli_query($conexion,$sql);
              
            ?>
        	</section>
        </main>
    </body>
</html>
