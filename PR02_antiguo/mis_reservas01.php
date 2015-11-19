<?php
include('login/session.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location:index.php');
  }
?>
<html lang="en">
		<head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="description" content="Proyecto 2">
                <meta name="keywords" content="HTML5, CSS3, JavaScript">
                <title>Proyecto 2</title>       
        <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
           <div class="fondo">
                <header>
                       <p class="username"><?php echo $login_session; ?> ||  <a href="index.php">Cerrar sesión</a></p>
                        <h1>Tu reserva</H1>    
                </header>
                <section class="formulario">
                		
                        <p>
           				<?php
                       $con = mysqli_connect('localhost', 'root', '', 'bd_botiga_reserva_mejora');
						$sql = "SELECT * FROM tbl_recurs, tbl_usuaris WHERE `tbl_usuaris`.`id_usuari` = $_SESSION[login_user] AND `tbl_recurs`.`id_usuari` = `tbl_usuaris`.`id_usuari` ORDER BY `tbl_recurs`.`id_recurs` ASC";
						$datos = mysqli_query($con, $sql);
						//echo "$sql";
								if (mysqli_num_rows($datos)>0) {
									echo "<br><h1>Tienes reservado:</h1><br>";
									while($prod = mysqli_fetch_array($datos)) {
										echo "<b class='negrita'>Nombre del recurso:</b> $prod[nom_recurs]<br/>";
										echo "<b class='negrita'>Descripción del recurso:</b>";
										echo "$prod[desc_recurs]<br/>";
										$fichero="img/$prod[img_recurs]";
										if(file_exists($fichero)){
											echo "<img class='imag' src='$fichero'><br/>";
											echo "<a href='liberar.php?nom_recurs=$prod[nom_recurs]'> Liberar </a><br/><br/>";
										} 
									}
								}else{
									echo "<h1 class='pad'>No has reservado nada</h1>";
								}
							mysqli_close($con);
						?>
                        </p>
                        
                </section>
                <form id="botonform" action="productos.php"> 
                <button class="form2" type="submit">Volver</button>
                </form>
                <br>
                </div>
        </body>
</html>