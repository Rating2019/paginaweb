<?php
include 'conexionapp.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $datos = json_decode(file_get_contents("php://input"),true);
//---------------------------------------------------------------------------------------------------
//Se Recibe los datos de la Aplicacion ANDROID
//--------------------------------------------------------------------------------------------------
	$nfam=$datos['namefamilia'];
    $pass=$datos['contrasena'];

    $nfam2=strtolower($nfam);
    $Nametabla = $nfam2.$pass;
//---------------------------------------------------------------------------------------------------
//Se hace la consulta a la tabla necesaria
//--------------------------------------------------------------------------------------------------
    $consulta = mysqli_query($cnx,"SELECT id_usu, nombre, parent, edad, sexo FROM $Nametabla");
    $check_mail=mysqli_num_rows($consulta);

//---------------------------------------------------------------------------------------------------
//Si se inscribio correctamente se selecciona los datos y devuelve la informacion en formato JSON
//--------------------------------------------------------------------------------------------------
    if($check_mail>0){
        $rawdata = array();
        $i=0;
        while($row = mysqli_fetch_assoc($consulta))
        {
            $rawdata[$i]=$row;
            $i++;
        }
    }else{
        $rawdata="No hay lista";
    }
        echo json_encode(array('respuesta' => $rawdata));
    }else{  
        echo json_encode(array('respuesta'=>'No se extrayo los datos correctamente'));

}