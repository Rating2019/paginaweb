<?php
include 'conexionapp.php';

//$json=array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $datos = json_decode(file_get_contents("php://input"),true);
//---------------------------------------------------------------------------------------------------
//Se extrae el paquete de datos del envio del sistema android de JSON->Variable de uso
//--------------------------------------------------------------------------------------------------
    $nom=$datos['nombre'];
    $parent=$datos['parent'];
    $fam=$datos['nfamilia'];
    $pass=$datos['pass'];
  
    
    $fam2=strtolower($fam);
    $Name= $fam2.$pass;
    
    $delete="DELETE FROM  $Name WHERE nombre='$nom' AND parent='$parent'";
    $eliminar=mysqli_query($cnx,$delete);
    
    $delete="DELETE FROM usuarios WHERE nombre='$nom' AND parent='$parent'";
    $eliminar2=mysqli_query($cnx,$delete);

        
    if($eliminar && $eliminar2){ 
            echo json_encode(array('respuesta'=>'eliminado'));                   
    }else{
            echo json_encode(array('respuesta'=>'incorrecto'));
    }
            
  

    }else{ 
        
        echo json_encode(array('respuesta'=>'No llegaron los datos correctamente'));
}

