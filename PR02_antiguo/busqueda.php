<?php
include('session.php');
$con = mysqli_connect('localhost', 'root', '', 'bd_botiga_reserva');
$sql = "SELECT * FROM tbl_recurs";
$query = mysqli_query($con,$sql);
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }
?>
<html>

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
                        <h1>RESERVA</H1>    
                </header>
        	     <section class="formulario">
        	     <form action="mis_reservas.php">
                        
                        <p>
                        <?php
							$comprovado=0;
							$sql = "SELECT tbl_recurs.nom_recurs, tbl_recurs.desc_recurs, tbl_recurs.img_recurs, tbl_recurs.id_recurs, tbl_recurs.estado FROM tbl_recurs ";
							$sql2 = "SELECT tbl_recurs.nom_recurs, tbl_recurs.desc_recurs, tbl_recurs.img_recurs, tbl_recurs.id_recurs, tbl_recurs.estado FROM tbl_recurs ";		
							if(isset($_REQUEST['aula'])) {
								$aulas = $_REQUEST['aula'];
								$sql.= "WHERE tbl_recurs.nom_recurs='$aulas' ";
								$comprovado=1;
							}
							if ($_REQUEST['aula']==0) {
								$sql.="";
							}


								if(isset($_REQUEST['recursos'])) {

									$recurso = $_REQUEST['recursos'];
									$sql2.= "WHERE tbl_recurs.nom_recurs='$recurso' ";
									$comprovado=1;
								}
								else{
									if ($_REQUEST['recursos']==0) {
										$sql2.="";
									}
								}
								
							if ((($_REQUEST['aula'])=='0') && (($_REQUEST['recursos'])=='0')){
								echo"<h1>No hay ningun resultado</h1>";
							}
							else{
								echo "<h1>Has seleccionado:</h1>";
							}
							if(isset($_REQUEST['aula'])){
							$datos = mysqli_query($con, $sql);
									$filas= mysqli_num_rows($datos);
										while($prod = mysqli_fetch_array($datos))
										{
											echo "<br/><b class='negrita'>Nombre de la aula:</b> $prod[nom_recurs]<br/>";
											echo "<b class='negrita'>Estado:</b> $prod[estado]<br/>";
											$fichero="img/$prod[img_recurs]";
											if(file_exists($fichero))
											{
												echo "<img class='imag' src='$fichero'><br/>";
												echo "<a href='reservar.php?nom_recurs=$prod[nom_recurs]'> Reservar </a><br/>";
											} else 
											{
												echo "<img class='imag' src='img/no_disponible.jpg'><br/>";

											}
										}
							}
							if(isset($_REQUEST['recursos'])){
									$datos2 = mysqli_query($con, $sql2);
									$filas2= mysqli_num_rows($datos2);
										while($prod2 = mysqli_fetch_array($datos2))
										{
											echo "<br/><b id='negrita'>Nombre de extra:</b> $prod2[nom_recurs]<br/>";
											echo "<b id='negrita'>Estado:</b> $prod2[estado]<br/>";
											$fichero="img/$prod2[img_recurs]";
											if(file_exists($fichero))
											{
												echo "<img class='imag' src='$fichero'><br/>";
												echo "<a href='reservar.php?nom_recurs=$prod2[nom_recurs]'> Reservar </a>";
											} else 
											{
												echo "<img class='imag' src='img/no_disponible.jpg'><br/>";

											}
										}
							}
						?>
                        </p>
                        
                </section>
                
                </form>
                <form action="form.php" id="botonform"> 
                <button class="form2" type="submit">Volver</button>
                </form>
                <form action="mis_reservas.php" id="botonform"> 
                <button class="form2" type="submit">Mis reservas</button>
                </form>
                <br/>

                </div>

        </body>
</html>