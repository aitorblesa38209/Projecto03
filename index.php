<?php
include('login/login.php');
// if(isset($_SESSION['login_user'])){
// header("location: profile.php");
// }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Proyecto 2">
		<meta name="keywords" content="HTML5, CSS3, JavaScript">
		<title>Proyecto 2</title>	
        <link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<script src='js/main.js'></script>
        <script src="js/index.js"></script>
		<!-- pagina de loggin -->
		<div class="wrapper">
			<div class="container">
				<h1>Bienvenido</h1>
				<form class="form" action="" method="POST">
					<input id="name" name="user" class="loggin" type="text" placeholder="Email">
					<input id="password" name="pass" class="loggin" type="password" placeholder="Contraseña">
					<input class="form2" name="submit" type="submit" id="login-button" value=" Indentificate "></input><br><br>
					<span><?php echo "</br></br>"; echo "<h2>".$error."</h2>"; ?></span>
					<script src='js/main.js'></script>
        			<script src="js/index.js"></script>
				</form>
			</div>
			<ul class="bg-bubbles">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</body>
</html>