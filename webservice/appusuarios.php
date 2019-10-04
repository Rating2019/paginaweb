<?php
include 'conexionapp.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $datos = json_decode(file_get_contents("php://input"),true);
//---------------------------------------------------------------------------------------------------
//Se Recibe los datos de la Aplicacion ANDROID
//--------------------------------------------------------------------------------------------------
    $uemail=$datos['email'];
    $nom=$datos['nombre'];
    $par=$datos['parent'];
    $edad=$datos['edad'];
    $sexo=$datos['sexo']; 

    $nfam=$datos['namefamilia'];
    $pass=$datos['contrasena'];
//---------------------------------------------------------------------------------------------------
//Se Inserta los datos a la tabla necesaria
//--------------------------------------------------------------------------------------------------
    $insert="INSERT INTO usuarios (email, nombre, parent, edad, sexo) VALUES ('{$uemail}','{$nom}','{$par}','{$edad}','{$sexo}')";

    $result_insert1=mysqli_query($cnx,$insert);

    $nfam2=strtolower($nfam);
    $Nametabla= $nfam2.$pass;

    $insert="INSERT INTO $Nametabla (nombre, parent, edad, sexo) VALUES ('{$nom}','{$par}','{$edad}','{$sexo}')";
    $result_insert2=mysqli_query($cnx,$insert);
//---------------------------------------------------------------------------------------------------
//Si se inscribio correctamente se selecciona los datos y devuelve la informacion en formato JSON
//--------------------------------------------------------------------------------------------------
    if($result_insert1 && $result_insert2){ 
            echo json_encode(array('respuesta'=>'Usuario Registrado'));                   
    }else{
            echo json_encode(array('respuesta'=>'no registrado'));
    }

    }else{  
        echo json_encode(array('respuesta'=>'No llegaron los datos correctamente'));
}

