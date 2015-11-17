<?php
include('session.php');
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
                <p class="username"><?php echo "Bievenido ".$login_session."  ||  <a href='logout.php'>Cerrar sesión</a>"?></p>
        		<h1>FORMULARIO</H1>
        	</header>
        	<section>
        		<form class="formulario" action="busqueda.php">
        			<label for="autor">
        				Aula:
        			</label>
        			 <select class="formul"  type="text" name="aula">
                     <option value="0" selected>Selecciona un aula</option>
                                <?php
                                   $con = mysqli_connect('localhost', 'root', '', 'bd_botiga_reserva'); 
                                    $sql = "SELECT tipus_recurs, nom_recurs, id_recurs FROM tbl_recurs where tbl_recurs.tipus_recurs= '1' AND tbl_recurs.estado='disponible'";
                                    $query = mysqli_query($con,$sql);
                                    if(mysqli_num_rows($query)>0){
                                        while($recurs=mysqli_fetch_array($query)){
                                            $valor = utf8_encode($recurs['nom_recurs']);
                                            echo "<option value='$valor'>". $valor ."</option>";
                                        }
                                    }
                                ?>   
                    </select>
        			<br>
        				<label for="recursos">
        					Recursos:
        				</label><br>
					     <select class="formul"  type="text" name="recursos">
                         <option value="0" selected>Selecciona un recurso</option>
                                <?php
                                   
                                    $sql2 = "SELECT tipus_recurs, nom_recurs, id_recurs FROM tbl_recurs where tbl_recurs.tipus_recurs= '0' AND tbl_recurs.estado='disponible'";
                                    $query2 = mysqli_query($con,$sql2);
                                    if(mysqli_num_rows($query2)>0){
                                        while($recurs2=mysqli_fetch_array($query2)){
                                            $valor2 = utf8_encode($recurs2['nom_recurs']);
                                            echo "<option value='$valor2'>". $valor2 ."</option>";
                                        }
                                    }
                                ?>   
                    </select>
					</section>

					<button id="botons" class="form2" type="submit" value="ENVIAR"/>ENVIAR</button>
				</form>
                <form action="mis_reservas.php" id="botonform">
                    <button class="form2" type="submit" value="mis_reservas"/>MIS RESERVAS</button>
                </form>
        		</div>
        	</section>
        <script src='js/main.js'></script>
        <script src="js/index.js"></script>
        </body>
</html>