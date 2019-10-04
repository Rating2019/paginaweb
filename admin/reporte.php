<?php
session_start();
if (!$_SESSION['email']) {
  header("Location:../index.php");
}
?>
<!--------------LIBRERIAS UTILIZADAS--------------------------------->
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="../js/funcionesusu.js"></script>
	<script src="../librerias/bootstrap/js/bootstrap.js"></script>
	<script src="../librerias/alertifyjs/alertify.js"></script>

</head>
<body data-offset="40" background="../img/tapiz2.jpg" style=style="width=100%; heigth=100%; position=absolute;">

<!--------------BARRA DE NAVEGACION------------------------------------->
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
        <li><a href="usuarios.php">Usuarios</a></li>
        <li><a href="datos.php">Datos</a></li>
        <li class="active"><a href="reporte.php">Reporte</a></li>
      </ul>
     <ul class="nav navbar-nav navbar-right">
       <li><a href="" class="btn btn-outline-primary" >Bienvenido <strong><?php echo $_SESSION['nombre'];?></strong></a></li>
        <li><a href="../php/desconectar.php">Cerrar Sesión</a></li>
      </ul>

     </div>
    </div>
    </nav>
<!------------------------------------------------------------------------>
    <br>
    <br>  
    <div class="container" style="background-color: #C9CAC1"> 
       <br>
    <br>  
    <div class="container-fluid" style="background:#241F1F; text-align:center;">
        <div class="row">
        <h2 style="color:white">Monitoreo</h2>
        </div>
    </div>
    <br>

    <div class="container-fluid" style="width: 925px; text-align: right;">
        <form style="width: 900px">                 
            <div style="background: white; border: 1px solid black;">                      
                <div class="row">
                    <div class="col-sm-12">
                        <table width='870' style='text-align:center;'>
                                <tr>
                                     <td width='150'><b>Email</b></td> 
                                     <td width='90'><b>Canal</b></td> 
                                     <td><b>Tiempo Permanencia</b></td>
                                     <td><b>Fecha-Hora Recibido</b></td>
                                     <td><b>Fecha Envio</b></td>
                                     <td><b>Hora Envio</b></td>
                                 </tr>
                        </table> 
                        
                        <div id="conversation" style="height:500px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">       
                        </div>
                  
                    </div>
                </div>
             </div>                   
        </form>
    </div>
    </div>
    <br>      
    <br>
</body>
</html> 
    
<!--------------------------TABLA DE DATOS ---------------------------->
<script type="text/javascript">
    $(document).ready(function(){
        $('#reportetabla').load('reporte.php');
    });
</script>
<script>        
            $(document).on("ready", function(){             
                registerMessages();
                $.ajaxSetup({"cache":false});
                loadOldMenssages();
                timer = setInterval("loadOldMenssages()",500);
                $("#conversation").mouseover(function(){
             
                   clearInterval(timer);
                }).mouseout(function(){                     
                   timer = setInterval("loadOldMenssages()",500);
                });
            });

          var registerMessages = function(){
                $("#send").on("click",function(e){
                   e.preventDefault();
                   var frm = $("#formChat").serialize();
                    console.log(frm);
                    $.ajax({
                        type:"POST",
                        url:"documentos/Enviar_Mensajes2.php",
                        data:frm
                    }).done(function(info){
                        console.log(info);
                        loadOldMenssages();
                        $("#mensaje").val("");
                        var altura = $("#conversation").prop("scrollHeight");
                        $("#conversation").scrollTop(altura);
                    })
                });
            }

            var loadOldMenssages =function(){
                $.ajax({
                    type:"POST",
                    url:"../componentes/conversation.php"
                }).done(function(info){
                    $("#conversation").html(info);
                   $("#conversation p:last-child").css({"background-color":"lightgreen",
                                                           "padding-botton":"20px"}); 
                    var altura = $("#conversation").prop("scrollHeight");
                    $("#conversation").scrollTop(altura);
               });
            }
</script>

        