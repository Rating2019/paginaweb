<?php
include 'conexionapp.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $datos = json_decode(file_get_contents("php://input"),true);
//---------------------------------------------------------------------------------------------------
//Se Recibe los datos de la Aplicacion ANDROID
//--------------------------------------------------------------------------------------------------
    $nserie=$datos['nserie'];
    $emp=$datos['empresa'];
    $fam=$datos['nfamilia'];
    $dir=$datos['direc'];
    $tel=$datos['tel'];
    $mail=$datos['mail'];
    $pass=$datos['pass'];
//---------------------------------------------------------------------------------------------------
//Se Inserta los datos a la tabla necesaria
//--------------------------------------------------------------------------------------------------
    $fam2=strtolower($fam);
    
    $insert="INSERT INTO familia (nserie, empresa, nfamilia, direc, tel, mail, pass) VALUES ('{$nserie}','{$emp}','{$fam2}','{$dir}','{$tel}','{$mail}','{$pass}')";

    $result_insert=mysqli_query($cnx,$insert);

    if($result_insert){ 

    $Nametabla=$fam2.$pass;

    $insert="CREATE TABLE $Nametabla (
            id_usu int(255) PRIMARY KEY AUTO_INCREMENT,
            nombre VARCHAR(255) NOT NULL,
            parent VARCHAR(255) NOT NULL,
            edad VARCHAR(255) NOT NULL,
            sexo VARCHAR(255) NOT NULL)";
    $result=mysqli_query($cnx,$insert);  
//---------------------------------------------------------------------------------------------------
//Si se inscribio correctamente se selecciona los datos y devuelve la informacion en formato JSON
//--------------------------------------------------------------------------------------------------
        echo json_encode(array('respuesta'=>'Registro correcto'));           
        }else{
        echo json_encode(array('respuesta'=>'Problemas al extraer los datos'));
        }
    }else{ 
        echo json_encode(array('respuesta'=>'No llegaron los datos correctamente'));
}

