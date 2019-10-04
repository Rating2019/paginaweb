<?php
include 'conexionapp.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $datos = json_decode(file_get_contents("php://input"),true);
//---------------------------------------------------------------------------------------------------
//Se Recibe los datos de la Aplicacion ANDROID
//--------------------------------------------------------------------------------------------------
        $nfamilia=$datos['nfamilia'];
        $pass=$datos['pass'];
//---------------------------------------------------------------------------------------------------
//Se Inserta los datos a la tabla necesaria
//--------------------------------------------------------------------------------------------------
        $familia=strtolower($nfamilia);

        $consulta="SELECT * FROM familia WHERE nfamilia= '{$familia}' AND pass = '{$pass}' ";
        $resultado=mysqli_query($cnx,$consulta);

        while($f=mysqli_fetch_assoc($resultado))

            {
                $var1= $f['nfamilia'];
                $var2= $f['pass'];
                $var3= $f['mail'];
            }

//---------------------------------------------------------------------------------------------------
//Si se inscribio correctamente se selecciona los datos y devuelve la informacion en formato JSON
//--------------------------------------------------------------------------------------------------
            echo json_encode(array('respuesta'=>'Correcto','email'=>$var3));
        }else{  
            echo json_encode(array('respuesta'=>'No llegaron los datos correctamente'));
}

