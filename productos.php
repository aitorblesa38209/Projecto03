<?php
include('login/session.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }



//conexión a la base de datos o mensaje en caso de error
$conexion = mysqli_connect('localhost','root','','bd_botiga_reserva_mejora') or die ('No se ha podido conectar'. mysql_error());

//Sentencia para mostrar todos los materiales de la tabla tbl_material
$sql = "SELECT *
        FROM tbl_material
        INNER JOIN tbl_tipo_material ON tbl_tipo_material.id_tipo_material = tbl_material.id_tipo_material";
     

//comprobación si está instanciada la variable opciones (viene de un select de filtrado en el formulario de cabecera)
if(isset($_REQUEST['opciones'])){
  //si los valores son mayores de 0,
  if ($_REQUEST['opciones']>0) {
    //se añadirá a la consulta según: 0 - Aulas, 1 - Material informático
    $sql .= " WHERE tbl_material.id_tipo_material = ".$_REQUEST['opciones'];
  }
}
?>
<!--INICIO WEB -->
<!DOCTYPE html>
<html>
  <head>
      <title>Oxford Intranet</title>
      <meta lang="es">
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="css/estilo.css" />
      <script type="text/javascript" src="js/funcion.js"></script>
  </head>
    <body>
<a name="top">
        <!--BARRA NEGRA SUPERIOR -->
      <div id="barraUser">
        <div id="barraLogin">
          <ul id="listaLogin">
            <li class="username">Bienvenido <?php echo $login_session?> </li>
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
              <li>INICIO</li>
              <a href="mis_reservas.php"><li>RESERVAS</li></a>
              <a href="usuarios.php"><li>USUARIOS</li>
            </ul>
          </nav>
        </section>
      </header>
      <div id="barraNegraDatos">
         <div id="barraOpciones">

           <!-- FORMULARIO SELECT PARA FILTRAR EL CONTENIDO -->
           <form action="productos.php" method="get">
             <select name="opciones" class="formul">
               <option value="" disabled selected>Filtrar por...</option>
                <!--el valor "" (vacío) quiere decir que al no seleccionar ningun filtro, a la hora de buscar mostraremos todos los campos del tipo material-->
               <?php
                  //Rellenar datos del SELECT con los datos de la base de datos
                  $sqlTipo = "SELECT * FROM tbl_tipo_material";
                  //consulta del select
                  $query = mysqli_query($conexion,$sqlTipo);
                  //mientras por cada dato en el array $query
                  while ($Opciones = mysqli_fetch_array($query)) {
                  //crea una opción en el dato extraido de la base de datos
                  echo "<option value='$Opciones[id_tipo_material]'>$Opciones[tipo]</option>";
                  }
                ?>
              </select>
              <input type="submit" name="name" class="form2" value="Mostrar">
           </form>
         </div>
      </div>
       
        	<section>
          <h1 class="titulo">Listado de Productos</h1>
            <!-- PARTE DONDE SE VA A MOSTRAR LA INFORMACIÓN -->
            <?php
            //consulta de datos según el filtrado
              $datos = mysqli_query($conexion,$sql);
              //si se devuelve un valor diferente a 0 (hay datos)
              if(mysqli_num_rows($datos)!=0){
                while ($mostrar = mysqli_fetch_array($datos)) {
            ?>

              <div id="divMaterial"><br/>
                <form id="formMaterial" action="productosproc.php" method="get">
                  <div id="formQuery">
                    <div id="formQueryFoto">
                      <p><img class ="fotoMini" src="img/material/<?php echo $mostrar['id_material']; ?>.jpg" alt="" title"" /></p>
                    </div>
                    <div id="formQueryTexto">
                      <p id="formTituloMaterial"><?php echo utf8_encode($mostrar['nombre_material']); ?><p>
                      <p>Disponibilidad: <?php
                        if(!$mostrar['disponible']){
                          echo "<img src='img/ok.png' alt='Ok' title='Ok' />";
                        }else {
                          echo "<img src='img/ko.png' alt='Ko' title='Ko' />";
                        }
                      ?><p>
                      <p>Incidencia:<?php
                        if($mostrar['incidencia']){
                          echo "Si";
                        }else {
                          echo "No";
                        }
                      ?><p>
                     
                    <!-- campo oculto para enviar el id_material -->
                      <input type="hidden" name="disponibilidad" value="<?php echo $mostrar['disponible']; ?>">
                      <input type="hidden" name="material" value="<?php echo $mostrar['id_material']; ?>">
                      <!-- Se comprueba el valor de disponible y se asigna un texto al botón -->
                      <input type="submit" id="reservar" name="reservar" value=<?php
                        if(!$mostrar['disponible']){
                          echo "Reservar";
                        }else {
                          echo "Devolver";
                        }
                        ?>>
                     
                    </div>

                  </div><br/>

                </form>

              </div><br/>

            <?php
                }
              }else{
                echo "No hay datos";
              }
            ?>

        <footer>
            <a href="#top"><img src="img/top.png" alt="Subir" title="Subir"/></a>
        </footer>
        </section>
    </body>
</html>
