<?php 

session_start();

/*Coneccion a base de datos*/
include("conexindex.php");

/*Recepcion de datos*/
		$email=$_POST['email'];
		$pass=$_POST['password'];

		$sql=mysqli_query($conec,"SELECT * FROM ingreso WHERE email='$email'");

	    if($resultado=mysqli_fetch_array($sql)){
		    if($pass==$resultado['password']){
		        if($resultado['estado']=="activo"){
		            $_SESSION['email']  = $email;
					$_SESSION['nombre'] = $resultado['nombre'];
					echo "<script>location.href='../admin/admin.php'</script>";
		        }
		        else{
		            echo '<script>alert("USUARIO NO ESTA ACTIVO")</script>';
					echo "<script>location.href='../index.php'</script>";
		        }
		    } else{
		     echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		     echo "<script>location.href='../index.php'</script>";
		    }
		}else{
		    echo '<script>alert("ESTE USUARIO NO EXISTE")</script> ';
		    echo "<script>location.href='../index.php'</script>";
		}
 ?> 

