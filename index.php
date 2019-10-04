
<!DOCTYPE html>
<html>
<head>
<meta charset= "utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Sistema Rating</title>
	<link rel="stylesheet" href="librerias/estilos.css">

	<script src="librerias/jquery-3.2.1.min.js"></script>
  	<script src="js/funciones.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
</head>
<body data-offset="40" background="img/tapiz.jpg" style="background-attachment: fixed; background-repeat: no-repeat; background-size: cover; font-family:sans-serif;">

		<div class="logo">
		<img class="avatar" src="img/logo.jpg" alt="logo de tv">

		<h1>Iniciar Sesión</h1>

<!------VALIDACION PARA ACCESO------->
		<form action="php/validar.php" method="post">

<!------USUARIO----->
		<label>Correo:</label>
		<input type="text" placeholder= "Ingresa tu Correo"  name="email" >

<!------PASSWORD------>
		<label>Contraseña:</label>
		<input type="password" placeholder= "Ingresa tu Contraseña" name="password" >

<!------BOTON DE ENVIO DE DATOS------>
		<input id="ejecuta" type="submit" value="Enviar" >
<!-- <a href="acciones/registro.php" >Registrar nuevo usuario</a>-->

		</form>
		</div>
	</body>
</html>