<?php
session_start();
if (!$_SESSION['email']) {
  header("Location:../index.php");
}
?>
<!----------------- LIBRERIAS UTILIZADAS --------------------------------->
<!DOCTYPE html>
<html>
<head>
  <meta charset= "utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Sistema Rating</title>
	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">

	<script src="../librerias/jquery-3.2.1.min.js"></script>
  <script src="../js/funcionesfam.js"></script>
	<script src="../librerias/bootstrap/js/bootstrap.js"></script>
	<script src="../librerias/alertifyjs/alertify.js"></script>
</head>
<body data-offset="40" background="../img/tapiz2.jpg" style=style="width=100%; heigth=100%; position=absolute;">
<!-----------------  BARRA DE NAVEGACION  ------------------------------------->
    <br>
    <br>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acolapsar">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>

          <a class="navbar-brand" href="">
          <img alt="Brand" src="../img/logo.jpg" width="30" height="30"></a> 
          <a class="navbar-brand" href="" >RATING</a>    
      </div>

      <div class="collapse navbar-collapse" id="acolapsar">
      <ul class="nav navbar-nav">
        <li><a href="admin.php">Administrador de Usuarios  <span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="familia.php">Familia</a></li>
        <li><a href="usuarios.php">Usuarios</a></li>
        <li><a href="datos.php">Datos</a></li>
        <li><a href="reporte.php">Reporte</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="" class="btn btn-outline-primary" >Bienvenido <strong><?php echo $_SESSION['nombre'];?></strong></a></li>
        <li><a href="../php/desconectar.php">Cerrar Sesión</a></li>
      </ul>
      </div>
    </div>
    </nav> 
    <br>
    <br>
	<div class="container" style="background-color: #C9CAC1">
		<div id="famtabla"></div>
	</div>

<!-- --------------- MODAL PARA EDICION DE DATOS --------------------------->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
      </div>
       <div class="modal-body">
          <input type="text" hidden="" id="idfamilia" name="">
          <label>N.Serie</label>
          <input type="text" name="" id="nseriev" class="form-control input-sm">
          <label>Familia</label>
          <input type="text" name="" id="familiav" class="form-control input-sm">
          <label>Direccion</label>
          <input type="text" name="" id="direccionv" class="form-control input-sm">
          <label>Telefono</label>
          <input type="text" name="" id="telefonov" class="form-control input-sm">
          <label>Email</label>
          <input type="text" name="" id="mailv" class="form-control input-sm">
          <label>Password</label>
          <input type="text" name="" id="passwordv" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>
  </div>
</div>

</body>
</html>
<!----------------- LLAMA A LA TABLA DE FAMILIA -------------------->
<script type="text/javascript">
  $(document).ready(function(){
    $('#famtabla').load('../componentes/familiatabla.php');
  });
</script>
<!----------------- LLAMA PARA ACTUALIZAR DATOS -------------------->
<script type="text/javascript">
  $(document).ready(function(){
    $('#actualizadatos').click(function(){
          actualizaDatos1();
        });
  });
</script>