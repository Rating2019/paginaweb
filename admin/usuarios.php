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
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<script src="../librerias/jquery-3.2.1.min.js"></script>
  <script src="../js/funcionesusu.js"></script>
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
        <li><a href="familia.php">Familia</a></li>
        <li class="active"><a href="usuarios.php">Usuarios</a></li>
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
    <div class="container" style="background-color: #C9CAC1">
    <br>
    <br>
 	  <div class="container-fluid" style="background:#241F1F; text-align:center;">
        <div class="row">
           <h2 style="color:white">Usuarios Registrados</h2> 
        </div>
    </div>
         <!-- --------------- BUSCADOR DE DATOS --------------------------->
    <div class="container">   
    <div class="subirarchivo" >
        <div id="login" style="margin-left:40px;margin-top:20px">        
            
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#mimodalejemplo" onclick="loadLog()"><i class="fa fa-search" style="margin-top: 10px; padding-bottom: 7px;"></i>&nbsp Busqueda
                </button>
                    
                <input id="loginemail" type="text"  placeholder="Introduzca su busqueda" name="email" required="" style="height: 39px;margin-left:10px;border-radius: 5px; padding-left: 10px">
                  
				<select name="categoria" id="categoria"  style="height=100px; width:150px; padding:8px; margin-left:10px; border-radius:3px;" >	
				
				              <option value="0">Seleccionar...</option>";
											<option value="edad">Edad</option>;
											<option value="sexo">Sexo</option>";
											<option value="parent">Parentesco</option>
											<option value="email">Correo</option>";
				</select>
        </div>
        
        <div class="modal fade" id="mimodalejemplo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">BUSQUEDA</h4>
                    </div>    
                <div class="modal-body">
                    <div id="prueba">
                    </div>
                </div>
                    <div class="modal-footer">
                    <!----------BOTON CREAR PDF MODAL--------->
                    <a style="border-radius: 5px;padding: 7px 7px;text-decoration: none;color: #fff;background-color: #E31317;" href="../componentes/archivo2.pdf" target="_blank"><i style="color: #FFFFFF;"class="fa fa-file-pdf"></i> PDF </a>
                    <!----------BOTON CREAR EXCEL MODAL--------->
                    <a style="border-radius: 5px;padding: 7px 7px;text-decoration: none;color: #fff;background-color: #2CAC34;margin: 5px;" href="../componentes/archivo1.xlsx"> <i style="color: #FFFFFF;"class="fa fa-file-excel"></i> EXCEL </a>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <br>
 
     </div>
        <div id="usutabla"></div>
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
          <input type="text" hidden="" id="idusuario" name="">
          <label>Email</label>
          <input type="text" name="" id="emailw" class="form-control input-sm">
          <label>Nombre</label>
          <input type="text" name="" id="nombrew" class="form-control input-sm">
          <label>Parentesco</label>
          <input type="text" name="" id="parentw" class="form-control input-sm">
          <label>Edad</label>
          <input type="text" name="" id="edadw" class="form-control input-sm">
          <label>Sexo</label>
          <input type="text" name="" id="sexow" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>
  </div>
</div>

</body>
</html>
<!----------------- LLAMA A LA TABLA DE USUARIOS -------------------->
<script type="text/javascript">
  $(document).ready(function(){
    $('#usutabla').load('../componentes/usuariotabla.php');
  });
</script>
<!----------------- LLAMA PARA ACTUALIZAR DATOS -------------------->
<script type="text/javascript">
  $(document).ready(function(){
    $('#actualizadatos').click(function(){
          actualizaDatos2();
        });
  });
</script>
<!----------------- LLAMA PARA BUSQUEDAS -------------------->
<script>
        function loadLog() {
            var nombre= document.getElementById('loginemail').value;
            var categoria= document.getElementById('categoria').value;
            
            document.getElementById("loginemail").value="";

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("prueba").innerHTML = xhttp.responseText;
        }
        };
            xhttp.open("POST", "../componentes/busquedausuarios.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("email="+nombre+"&categoria="+categoria);
            
        }
</script>
