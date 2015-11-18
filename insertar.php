<?php
include('login/session.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }
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
              <a href="mis_reservas.php"><li>RESERVAS</li></a>
               <a href="usuarios.php"><li>USUARIOS</li></a>
            </ul>
          </nav>
        </section>
      </header>
     
        <main>
        <h1 class="titulo">Añadir Usuario</h1>
        	<section class="formulario">
            <!-- PARTE DONDE SE VA A MOSTRAR LA INFORMACIÓN -->
				<?php
				//realizamos la conexión con mysql
				$con = mysqli_connect('localhost', 'root', '', 'bd_botiga_reserva_mejora');
				//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
				$sqlTipo = "SELECT * FROM tbl_tipo_usuari";
	                  //conexionsulta del select
	                  //echo $sqlTipo;
	            $query = mysqli_query($con,$sqlTipo);
	                  //mientras por cada dato en el array $query
	                 
				?>
				<form action="insertarproc.php" method="POST"><br/>
					Nombre:<input type="text" name="nombre" size="20" maxlength="25" required><br/>

					Email:&nbsp;&nbsp;&nbsp;<input type="text" name="email" size="20" maxlength="30" required><br/>

					Contraseña:<input type="password" name="pass" size="20" maxlength="30" required><br/>

					Tipo Usuario:<select name="tipo" class="formul">
		               <?php
		                	while ($Opciones = mysqli_fetch_array($query)) {
		                		echo "<option value=$Opciones[id_tipo_usuari]>$Opciones[tipus_usuari]</option>";
		                 	}
		                mysqli_close($con);
		                ?>
		            </select>
		            <br/>
					<input type="submit" class="form2" value="Enviar">
				</form>
        	</section>
        </main>
    </body>
</html>
