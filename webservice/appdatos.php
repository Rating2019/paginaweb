<?php
include 'conexionapp.php';


if($_SERVER['REQUEST_METHOD']=='POST'){
    $datos = json_decode(file_get_contents("php://input"),true);
//---------------------------------------------------------------------------------------------------
//Se Recibe los datos 
//--------------------------------------------------------------------------------------------------
    
    $email=$datos['email'];
    $emp=$datos['emp'];
    $nombre=$datos['nombre'];
    $canal=$datos['canal'];
    $tperm=$datos['tiempo_perm'];
    
    $fecha_env=$datos['fecha_envio'];
    $hora_env=$datos['hora_envio'];
    

   
//---------------------------------------------------------------------------------------------------
//Se inserta el nombre de cada Canal
//--------------------------------------------------------------------------------------------------
if ($emp == 'cotel B') {
  
  switch($canal){
            case ($canal == 'L'):
            $numero = "CARTOON NETWORK";
            break;
            case ($canal == 'O'):
            $numero = "BOOMERANG";
            break;
            case (($canal == 'JM') or ($canal == 'MGJ')):
            $numero = "DISCOVERY KIDS";
            break;
            case ($canal == 'JN'):
            $numero = "DISNEY CHANEL";
            break;
            case ($canal == 'JO'):
            $numero = "DISNEY XD";
            break;
            case (($canal == 'JP') or ($canal == 'MGL')):
            $numero = "NICKELODEON";
            break;
            case ($canal == 'JQ'):
            $numero = "FOX LIFE";
            break;
            case ($canal == 'JR'):
            $numero = "MASCHIC";
            break;
            case ($canal == 'KI'):
            $numero = "TELEMUNDO";
            break;
            case ($canal == 'KJ'):
            $numero = "CANAL DE LAS ESTRELLAS";
            break;
            case ($canal == 'KK'):
            $numero = "TLNOVELAS";
            break;
            case (($canal == 'KN') or ($canal == 'NIGO')):
            $numero = "EL TRECE";
            break;
            case ($canal == 'KO'):
            $numero = "CANAL D";
            break;
            case (($canal == 'LN') or ($canal == 'JMGJ')):
            $numero = "COTEL GUIA";
            break;
            case (($canal == 'LO') or ($canal == 'JMGK')):
            $numero = "ESPN";
            break;
            case (($canal == 'LP') or ($canal == 'OGJ')):
            $numero = "ESPN2";
            break;
            case (($canal == 'LQ') or ($canal == 'JOGK')):
            $numero = "FOX SPORT";
            break;
            case (($canal == 'LR') or ($canal == 'KKGJ')):
            $numero = "FOX SPORT 2";
            break;
            case ($canal == 'MI'):
            $numero = "CNN ESPAÑOL";
            break;
            case ($canal == 'MJ'):
            $numero = "GOLDEN";
            break;
            case ($canal == 'MK'):
            $numero = "SPACE";
            break;
            case ($canal == 'ML'):
            $numero = "STUDIO UNIVERSAL";
            break;
            case ($canal == 'MM'):
            $numero = "HBO";
            break;
            case ($canal == 'MN'):
            $numero = "CINECANAL";
            break;
            case ($canal == 'MO'):
            $numero = "TNT";
            break;
            case ($canal == 'MP'):
            $numero = "CINEMAX";
            break;
            case ($canal == 'MQ'):
            $numero = "DISCOVERY CHANEL";
            break;
            case ($canal == 'MR'):
            $numero = "ANIMAL PLANET";
            break;
            case ($canal == 'NI'):
            $numero = "NATIONAL GEOGRAFIC";
            break;
            case ($canal == 'NJ'):
            $numero = "HISTORY";
            break;
            case ($canal == 'NK'):
            $numero = "H&H";
            break;
            case ($canal == 'NL'):
            $numero = "AXN";
            break;
            case ($canal == 'NM'):
            $numero = "TNT SERIES";
            break;
            case ($canal == 'NN'):
            $numero = "WARNER CHANEL";
            break;
            case ($canal == 'NO'):
            $numero = "FOX CHANEL";
            break;
            case ($canal == 'NP'):
            $numero = "SONY";
            break;
            case (($canal == 'NQ') or ($canal == 'MKGJ')):
            $numero = "UNITEL";
            break;
            case (($canal == 'NR') or ($canal == 'MKGK')):
            $numero = "RTP";
            break;
            case (($canal == 'OI') or ($canal == 'MKGL')):
            $numero = "BOLIVISION";
            break;
            case (($canal == 'OJ') or ($canal == 'MKGM') or ($canal == 'MMGJ')):
            $numero = "BOLIVIATV";
            break;
            case (($canal == 'OK') or ($canal == 'MMGK')):
            $numero = "ATB";
            break;
            case (($canal == 'OL') or ($canal == 'MMGL')):
            $numero = "REDUNO";
            break;
            case (($canal == 'OM') or ($canal == 'MMGM')):
            $numero = "TVU";
            break;
            case (($canal == 'ON') or ($canal == 'MOGL')):
            $numero = "EL ALTO TV";
            break;
            case (($canal == 'OO') or ($canal == 'MQGL')):
            $numero = "PALENQUE TV";
            break;
            case (($canal == 'OP') or ($canal == 'MQGN')):
            $numero = "LA PAZ TV";
            break;
            case ($canal == 'RQ'):
            $numero = "MTV";
            break;
            case ($canal == 'RR'):
            $numero = "RMS";
            break;
            case ($canal == 'MGK'):
            $numero = "DISNEY JUNIOR";
            break;
            case ($canal == 'MGM'):
            $numero = "NATGEO KIDS";
            break;
            case ($canal == 'QGJ'):
            $numero = "ENTERTAINMENT";
            break;
            case ($canal == 'QGK'):
            $numero = "LIFETIME";
            break;
            case ($canal == 'QGL'):
            $numero = "ELGOURMET";
            break;
            case ($canal == 'JKGJ'):
            $numero = "UNICABLE";
            break;
            case ($canal == 'JKGK'):
            $numero = "DISTRITO COMEDIA";
            break;
            case ($canal == 'JKGL'):
            $numero = "TCM";
            break;
            case ($canal == 'JKGM'):
            $numero = "DE PELICULA";
            break;
            case ($canal == 'JKGN'):
            $numero = "TIIN";
            break;
            case ($canal == 'KKGK'):
            $numero = "FOX SPORT 3";
            break;
            case ($canal == 'KMGJ'):
            $numero = "HISTORY 2";
            break;
            case ($canal == 'KKGL'):
            $numero = "TyC SPORTS";
            break;
            case ($canal == 'KMGK'):
            $numero = "AMC";
            break;
            case ($canal == 'KMGL'):
            $numero = "DHE";
            break;
            case ($canal == 'NIGN'):
            $numero = "TV PERU HD";
            break;
            case ($canal == 'NQGJ'):
            $numero = "TVE";
            break;
            case ($canal == 'NQGK'):
            $numero = "AMERICA";
            break;
            case ($canal == 'NQGL'):
            $numero = "TV CHILE";
            break;
            case ($canal == 'NQGM'):
            $numero = "PANAMERICANA";
            break;
            case ($canal == 'MOGJ'):
            $numero = "CATOLICA TV";
            break;
            case ($canal == 'MOGK'):
            $numero = "GIGAVISION";
            break;
            case ($canal == 'MOGM'):
            $numero = "XTO";
            break;
            case ($canal == 'MOGN'):
            $numero = "PTV";
            break;
            case ($canal == 'MOGO'):
            $numero = "CADENA A";
            break;
            case ($canal == 'MQGJ'):
            $numero = "PAT";
            break;
            case ($canal == 'MQGK'):
            $numero = "abya yala";
            break;
            case ($canal == 'MQGM'):
            $numero = "CVC";
            break;
            case ($canal == 'MQGO'):
            $numero = "TV CULTURAS";
            break;
            case ($canal == 'NIGJ'):
            $numero = "FIDES";
            break;
            case ($canal == 'NIGK'):
            $numero = "ITV";
            break;
            case ($canal == 'NIGL'):
            $numero = "RED POLICIAL";
            break;
            case ($canal == 'NIGM'):
            $numero = "TV OFF";
            break;}
}

if ($emp == 'cotel A') {
switch($canal){
            case ($canal == 'L'):
            $numero = "CARTOON NETWORK";
            break;
            case ($canal == 'O'):
            $numero = "BOOMERANG";
            break;
            case (($canal == 'JM') or ($canal == 'MGJ')):
            $numero = "DISCOVERY KIDS";
            break;
            case ($canal == 'JN'):
            $numero = "DISNEY CHANEL";
            break;
            case (($canal == 'JO') or ($canal == 'MGK')):
            $numero = "DISNEY XD";
            break;
            case (($canal == 'JP') or ($canal == 'MGL')):
            $numero = "NICKELODEON";
            break;
            case ($canal == 'JQ'):
            $numero = "DISNEY JUNIOR";
            break;
            case (($canal == 'JR') or ($canal == 'MGM')):
            $numero = "NATGEO KIDS";
            break;
            case (($canal == 'KI') or ($canal == 'PGJ')):
            $numero = "TELEMUNDO";
            break;
            case ($canal == 'KJ'):
            $numero = "CANAL DE LAS ESTRELLAS";
            break;
            case ($canal == 'KK'):
            $numero = "TLNOVELAS";
            break;
            case (($canal == 'KN') or ($canal == 'JKGK')):
            $numero = "DISTRITO COMENDIA";
            break;
            case (($canal == 'KO') or ($canal == 'JKGL')):
            $numero = "TCM";
            break;
            case (($canal == 'LN') or ($canal == 'JKGM')):
            $numero = "DE PELICULA";
            break;
            case (($canal == 'LO') or ($canal == 'JMGK')):
            $numero = "ESPN";
            break;
            case (($canal == 'LP') or ($canal == 'JOGJ')):
            $numero = "ESPN2";
            break;
            case (($canal == 'LQ') or ($canal == 'JQGJ')):
            $numero = "FOX SPORT";
            break;
            case (($canal == 'LR') or ($canal == 'JQGK')):
            $numero = "FOX SPORT 2";
            break;
            case (($canal == 'MI') or ($canal == 'KKGJ')):
            $numero = "FOX SPORT 3";
            break;
            case (($canal == 'MJ') or ($canal == 'KKGK')):
            $numero = "TyC SPORTS";
            break;
            case ($canal == 'MK'):
            $numero = "SPACE";
            break;
            case ($canal == 'ML'):
            $numero = "STUDIO UNIVERSAL";
            break;
            case ($canal == 'MM'):
            $numero = "HBO";
            break;
            case ($canal == 'MN'):
            $numero = "CINECANAL";
            break;
            case (($canal == 'MO') or ($canal == 'KMGJ')):
            $numero = "TNT";
            break;
            case ($canal == 'MP'):
            $numero = "CINEMAX";
            break;
            case ($canal == 'MQ'):
            $numero = "UNIVERSAL";
            break;
            case ($canal == 'MR'):
            $numero = "EDGE";
            break;
            case ($canal == 'NI'):
            $numero = "FXM";
            break;
            case (($canal == 'NJ') or ($canal == 'KMGK')):
            $numero = "AMC";
            break;
            case ($canal == 'NK'):
            $numero = "GOLDEN";
            break;
            case (($canal == 'NL') or ($canal == 'KRGL')):
            $numero = "A&E";
            break;
            case (($canal == 'NM') or ($canal == 'LIGJ')):
            $numero = "TNT SERIES";
            break;
            case (($canal == 'NN') or ($canal == 'LIGK')):
            $numero = "WARNER CHANEL";
            break;
            case ($canal == 'NO'):
            $numero = "FOX CHANEL";
            break;
            case (($canal == 'NP') or ($canal == 'LIGL')):
            $numero = "SONY";
            break;
            case (($canal == 'NQ') or ($canal == 'KRGJ')):
            $numero = "AXN";
            break;
            case (($canal == 'NR') or ($canal == 'KRGK')):
            $numero = "FX";
            break;
            case ($canal == 'OI'):
            $numero = "tbs";
            break;
            case ($canal == 'OJ'):
            $numero = "TRUTV";
            break;
            case (($canal == 'OK') or ($canal == 'LMGL')):
            $numero = "DISCOVERY CHANEL";
            break;
            case (($canal == 'OL') or ($canal == 'LMGK')):
            $numero = "ANIMAL PLANET";
            break;
            case (($canal == 'OM') or ($canal == 'LMGM')):
            $numero = "NATIONAL GEOGRAFIC CHANEL";
            break;
            case (($canal == 'ON') or ($canal == 'LQGJ')):
            $numero = "HISTORY";
            break;
            case (($canal == 'OO') or ($canal == 'LQGK')):
            $numero = "HISTORY 2";
            break;
            case ($canal == 'OP'):
            $numero = "TLC";
            break;
            case ($canal == 'OQ'):
            $numero = "H&H";
            break;
            case (($canal == 'OR') or ($canal == 'LQGL')):
            $numero = "ENTERTAINMENT";
            break;
            case ($canal == 'PI'):
            $numero = "INVESTIGATION DISCOVERY";
            break;
            case ($canal == 'PJ'):
            $numero = "LIFE TIME";
            break;
            case ($canal == 'PK'):
            $numero = "FOX LIFE";
            break;
            case ($canal == 'PL'):
            $numero = "CANAL D";
            break;
            case (($canal == 'PM') or ($canal == 'OIGK')):
            $numero = "EL TRECE";
            break;
            case (($canal == 'PN') or ($canal == 'OIGJ')):
            $numero = "TVE";
            break;
            case (($canal == 'PO') or ($canal == 'JMGJ')):
            $numero = "COTEL GUIA";
            break;
            case (($canal == 'PP') or ($canal == 'MKGJ')):
            $numero = "UNITEL";
            break;
            case (($canal == 'PQ') or ($canal == 'MKGK')):
            $numero = "RTP";
            break;
            case (($canal == 'PR') or ($canal == 'MKGL')):
            $numero = "BOLIVISION";
            break;
            case (($canal == 'QI') or ($canal == 'MMGJ') or ($canal == 'MMGK')):
            $numero = "BOLIVIATV";
            break;
            case (($canal == 'QJ') or ($canal == 'MNGJ')):
            $numero = "ATB";
            break;
            case (($canal == 'QK') or ($canal == 'MNGK')):
            $numero = "RED UNO";
            break;
            case (($canal == 'QL') or ($canal == 'MNGL')):
            $numero = "TVU";
            break;
            case ($canal == 'QM'):
            $numero = "CATOLICA TV";
            break;
            case ($canal == 'QN'):
            $numero = "GIGAVISION";
            break;
            case ($canal == 'QO'):
            $numero = "EL ALTO TV";
            break;
            case ($canal == 'QP'):
            $numero = "XTO";
            break;
            case ($canal == 'QQ'):
            $numero = "CADENA A";
            break;
            case ($canal == 'QR'):
            $numero = "PAT";
            break;
            case ($canal == 'RI'):
            $numero = "ABYA YALA";
            break;
            case ($canal == 'RJ'):
            $numero = "PALENQUE TV";
            break;
            case ($canal == 'RK'):
            $numero = "CVC";
            break;
            case ($canal == 'RL'):
            $numero = "LA PAZ TV";
            break;
            case ($canal == 'RM'):
            $numero = "TV CULTURAS";
            break;
            case ($canal == 'RQ'):
            $numero = "FIDES";
            break;
            case ($canal == 'RR'):
            $numero = "ITV";
            break;
            case ($canal == 'JII'):
            $numero = "RED POLICIAL";
            break;
            case ($canal == 'JIJ'):
            $numero = "TV OFF";
            break;
            case (($canal == 'JIK') or ($canal == 'NPGJ')):
            $numero = "CNN ESPAÑOL";
            break;
            case (($canal == 'JIL') or ($canal == 'OIGM')):
            $numero = "MTV";
            break;
            case (($canal == 'JIM') or ($canal == 'OKGJ')):
            $numero = "RMS";
            break;
            case (($canal == 'JIN') or ($canal == 'OKGK')):
            $numero = "HTV";
            break;
            case ($canal == 'PGK'):
            $numero = "KANAL D";
            break;
            case ($canal == 'PGL'):
            $numero = "GLITZ";
            break;
            case ($canal == 'PGM'):
            $numero = "VETV";
            break;
            case ($canal == 'QGJ'):
            $numero = "MAS CHIC";
            break;
            case ($canal == 'QGK'):
            $numero = "LIFETIME";
            break;
            case ($canal == 'QGL'):
            $numero = "ELGOURMET";
            break;
            case ($canal == 'JKGJ'):
            $numero = "UNICABLE";
            break;
            case ($canal == 'JKGN'):
            $numero = "TIIN";
            break;
            case ($canal == 'JOGK'):
            $numero = "ESPN3";
            break;
            case ($canal == 'KMGL'):
            $numero = "DHE";
            break;
            case ($canal == 'LMGJ'):
            $numero = "NATGEO WILD";
            break;
            case ($canal == 'OKGO'):
            $numero = "ISAT";
            break;
            case ($canal == 'OKGJ'):
            $numero = "TV PERU";
            break;
            case ($canal == 'ONGK'):
            $numero = "DW";
            break;
            case ($canal == 'ONGL'):
            $numero = "TV5";
            break;
            case ($canal == 'ONGM'):
            $numero = "FRANCE 24 ESPAÑOL";
            break;
            case ($canal == 'ONGN'):
            $numero = "FRANCE 24";
            break;
            case ($canal == 'OOGJ'):
            $numero = "NHK";
            break;
            case ($canal == 'OOGK'):
            $numero = "ARINANG";
            break;
            case ($canal == 'OOGL'):
            $numero = "CUBA VISION";
            break;
            case ($canal == 'OOGM'):
            $numero = "CCTV4";
            break;
            case ($canal == 'OKGL'):
            $numero = "TELEHIT";
            break;
            case ($canal == 'OKGM'):
            $numero = "VHN";
            break;
            case ($canal == 'OKGN'):
            $numero = "MUCH";
            break;
            case ($canal == 'NOGJ'):
            $numero = "RT";
            break;
            case ($canal == 'NOGK'):
            $numero = "BBC";
            break; 
            case ($canal == 'NOGL'):
            $numero = "CNN";
            break; 
            case ($canal == 'NPGK'):
            $numero = "TELESUR";
            break; 
            case ($canal == 'NPGL'):
            $numero = "GLOBO";
            break; 
            case ($canal == 'NQGJ'):
            $numero = "AMERICA";
            break; 
            case ($canal == 'NQGL'):
            $numero = "PANAMERICANA";
            break; 
            case ($canal == 'OIGL'):
            $numero = "TELEFE";
            break; 
            case ($canal == 'NQGK'):
            $numero = "TV CHILE";
            break;
            case ($canal == 'OQGK'):
            $numero = "NUEVO TIEMPO";
            break; 
            case ($canal == 'OQGL'):
            $numero = "RED ADVENIR";
            break; 
            case ($canal == 'OQGM'):
            $numero = "byuTV";
            break; 
            case ($canal == 'OQGN'):
            $numero = "ENLACE";
            break; 
            case ($canal == 'OQGO'):
            $numero = "SBN";
            break; 
            case ($canal == 'OQGJ'):
            $numero = "EWTN";
            break;   
      }
}

if ($emp == 'Aire') {
  
  switch($canal){
            case (($canal == 'K') or ($canal == 'KGJ')):
            $numero = "UNITEL";
            break;
            case (($canal == 'M') or ($canal == 'MGJ')):
            $numero = "RTP";
            break;
            case (($canal == 'N') or ($canal == 'NGJ')):
            $numero = "BOLIVISION";
            break;
            case (($canal == 'P') or ($canal == 'PGJ')):
            $numero = "BOLIVIA TV";
            break;
            case (($canal == 'R') or ($canal == 'RGJ')):
            $numero = "ATB";
            break;
            case (($canal == 'JJ') or ($canal == 'JGJ')):
            $numero = "RED UNO";
            break;
            case ($canal == 'JL'):
            $numero = "TVU";
            break;
            case ($canal == 'JQ'):
            $numero = "CTV";
            break;
            case ($canal == 'KJ'):
            $numero = "GIGAVISION";
            break;
            case ($canal == 'KL'):
            $numero = "";
            break;
            case ($canal == 'KP'):
            $numero = "ENLACE";
            break;
            case ($canal == 'LI'):
            $numero = "CV";
            break;
            case ($canal == 'LK'):
            $numero = "";
            break;
            case ($canal == 'LM'):
            $numero = "RITMO TV";
            break;
            case ($canal == 'LO'):
            $numero = "CADENA A";
            break;
            case ($canal == 'LR'):
            $numero = "PAT";
            break;
            case ($canal == 'MJ'):
            $numero = "abya yala";
            break;
            case ($canal == 'MN'):
            $numero = "";
            break;
            case ($canal == 'MO'):
            $numero = "";
            break;
            case ($canal == 'MR'):
            $numero = "VOS TV";
            break;
            case ($canal == 'NJ'):
            $numero = "SOLIDARIA";
            break;
            case ($canal == 'NP'):
            $numero = "CVC";
            break;}
}  


	setlocale(LC_ALL,"es_ES");
	date_default_timezone_set('America/La_Paz');
	
		$datos = json_decode(file_get_contents("php://input"),true);
		$fechaActual = getdate();
		$segundos = $fechaActual['seconds'];
		$minutos = $fechaActual['minutes'];
		$hora = $fechaActual['hours'];
		$dia = $fechaActual['mday'];
		$mes = $fechaActual['mon'];
		$year = $fechaActual['year'];
		$miliseconds = DateTime::createFromFormat('U.u',microtime(true));

		$hora_del_mensaje = strftime("%H:%M:%S");
        $hora_del_mensaje2 = strftime("%d-%m-%Y");

	
//---------------------------------------------------------------------------------------------------
//Se Inserta los datos a la tabla necesaria
//--------------------------------------------------------------------------------------------------
    $insert="INSERT INTO datos (email, nombre, canal, nom_canal, tiempo_perm, fecha_envio, hora_envio) VALUES ('{$email}','{$nombre}','{$canal}','{$numero}','{$tperm}','{$hora_del_mensaje2}','{$hora_del_mensaje}')";

      $result_insert=mysqli_query($cnx,$insert);

        if($result_insert){ 
//---------------------------------------------------------------------------------------------------
//Si se inscribio correctamente se selecciona los datos y devuelve la informacion en formato JSON
//--------------------------------------------------------------------------------------------------   
             echo json_encode(array('respuesta'=>'Dato Correcto'));  
        }else{
            echo json_encode(array('respuesta'=>'Problemas al extraer los datos'));
        }
        }else{  
            echo json_encode(array('respuesta'=>'No llegaron los datos correctamente'));
}