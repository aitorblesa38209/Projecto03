<?php
include('login/session.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }
//conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'bd_botiga_reserva_mejora');
//Sentencia para mostrar todos los materiales de la tabla tbl_material
$sql = "SELECT * FROM tbl_usuaris WHERE id_usuari=$_REQUEST[id_usuari]";
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
              <a href="usuarios.php"><li>USUARIOS</li></a>
            </ul>
          </nav>
        </section>
      </header>
      
        <main>
        <h1 class="titulo">Modificar</h1>
        	<section class="formulario">
          <?php
            $datos = mysqli_query($conexion, $sql);
      if(mysqli_num_rows($datos)>0){
        $prod=mysqli_fetch_array($datos);
        ?>
          <form name="formulario1" action="modificar.proc.php" method="get">
          <input type="hidden" name="id" value="<?php echo $prod['id_usuari']; ?>"><br/>
          Nombre:
          <input type="text" name="nom" size="20" maxlength="25" value="<?php echo $prod['nom_usuari']; ?>"><br/>
          Email:
          <input type="text" name="email" size="20" maxlength="25" value="<?php echo $prod['email_usuari']; ?>"><br/><br/>
          Tipo:
          <select name="tipo" class="formul">
                
                
               <?php
                  //Rellenar datos del SELECT conexion los datos de la base de datos
                  $sqlTipo = "SELECT * FROM tbl_tipo_usuari";
                  //conexionsulta del select
                  //echo $sqlTipo;
                  $query = mysqli_query($conexion,$sqlTipo);
                  //mientras por cada dato en el array $query
                  while ($Opciones = mysqli_fetch_array($query)) {
                  //crea una opción en el dato extraido de la base de datos
                  echo "<option value=$Opciones[id_tipo_usuari]>$Opciones[tipus_usuari]</option>";
                  }
                ?>
              </select>
        <br/>
        <input type="submit" class="form2" value="Guardar">
        <a href="productos.php" class="form2">Volver</a>
        </form>
        <?php
      } 
      //cerramos la conexionexión conexion la base de datos
      mysqli_close($conexion);
    ?>
    <br/> <br/>
    
        </main>
    </body>
</html>
