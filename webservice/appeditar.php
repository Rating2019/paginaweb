<?php
include 'conexionapp.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $datos = json_decode(file_get_contents("php://input"),true);
//---------------------------------------------------------------------------------------------------
//Se Recibe los datos 
//--------------------------------------------------------------------------------------------------
    $idus=$datos['id_usu'];
    $nom=$datos['name'];
    $par=$datos['parent'];
    $edad=$datos['edad'];
    $sexo=$datos['sexo'];
    $nfam=$datos['user'];
    $pass=$datos['pass'];
    $uemail=$datos['email'];
//---------------------------------------------------------------------------------------------------
//Se Inserta los datos a la tabla necesaria
//--------------------------------------------------------------------------------------------------

    $nfam2=strtolower($nfam);
    $Nametabla= $nfam2.$pass;

    $editar="UPDATE $Nametabla SET nombre='$nom',parent='$par',edad='$edad',sexo='$sexo' WHERE id_usu='$idus'";
    $result_editar=mysqli_query($cnx,$editar);
//---------------------------------------------------------------------------------------------------
//Si se inscribio correctamente se selecciona los datos y devuelve la informacion en formato JSON
//-------------------------------------------------------------------------------------------------- 
    if($result_editar){       
            echo json_encode(array('respuesta'=>'correcto'));                              
    }else{
            echo json_encode(array('respuesta'=>'incorrecto'));
    }
    }else{  
            echo json_encode(array('respuesta'=>'No llegaron los datos correctamente'));
}

