<?php
include('login/session.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }



//conexión a la base de datos o mensaje en caso de error
$conexion = mysqli_connect('localhost','root','','bd_botiga_reserva_mejora') or die ('No se ha podido conectar'. mysql_error());

//Sentencia para mostrar todos los materiales de la tabla tbl_material
$sql = "SELECT tbl_material.id_material, tbl_material.nombre_material, tbl_material.id_tipo_material, tbl_material.disponible, tbl_material.incidencia
        FROM tbl_material";



        //relacion de todas las tablas
        // INNER JOIN tbl_tipo_material ON tbl_tipo_material.id_tipo_material = tbl_tipo_material.id_tipo_material
        // INNER JOIN tbl_reservas ON tbl_reservas.id_material = tbl_material.id_material
        // INNER JOIN tbl_usuari ON tbl_usuari.id_usuari = tbl_reservas.id_usuari
        // INNER JOIN tbl_tipo_usuari ON tbl_tipo_usuari.id_tipo_usuari = tbl_usuari.id_tipo_usuari";
     

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
              <a href="usuarios.php"><li>USUARIOS</li></a>
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
       <h1 class="titulo">Listado de Productos</h1>
        	<section class="formulario">
          
            <!-- PARTE DONDE SE VA A MOSTRAR LA INFORMACIÓN -->
            <?php
            
            //consulta de datos según el filtrado
                $datos = mysqli_query($conexion,$sql);
                
                //si se devuelve un valor diferente a 0 (hay datos)
                if(mysqli_num_rows($datos)!=0){
                    while ($mostrar = mysqli_fetch_array($datos)) {   
                        echo "<br/><b class='negrita'>Nombre de la aula: </b>".utf8_encode($mostrar['nombre_material'])."";
                        echo "<br/><b class='negrita'>Disponibilidad:" ."</b>";
                   
                        if(!$mostrar['disponible']){
                                echo "<img src='img/ok.png' alt='Ok' title='Ok' />";
                                echo "<br/><img src='img/material/".$mostrar['id_material'].".jpg'/><br/><br/>";
                                ?>
                                <input type="date" class="form2" value="<?php echo date('Y-m-d'); ?>" />
                                <input type="time" class="form2" name="hora">
                                <?php
                                echo "<a class='form2' href='productosreserva.php?disponible=$mostrar[disponible]& id_material=$mostrar[id_material]'> Reservar </a><br/>";

                            }else {
                              echo "<img src='img/ko.png' alt='Ko' title='Ko' />";
                              echo "<br/><img src='img/material/".$mostrar['id_material'].".jpg'/><br/><br/>";
                            } 
                             
                             //pasamos el tipo disponible e id_material para insertar el producto en la tabla reservas
                            
                             echo "<br/><hr><br/>";
                    }
                }
            ?>

        <br/>                
        <footer>
            <a href="#top"><img src="img/top.png" alt="Subir" title="Subir"/></a>
        </footer>
        </section>
    </body>
</html>
