<?php 
session_start();
if (!$_SESSION['email']) {
  header("Location:../index.php");
}

require_once "../php/conexion.php";
	$conexion=conexion();

$contador = 0;
$sql = "SELECT * FROM datos order by id_dato";
$result  = mysqli_query($conexion,$sql);

echo "<table width='870' style='text-align:center;' >";
echo "<tr><td><font color=white><b>Email</b></font></td> 
	      <td><font color=white><b>Canal</b></font></td> 
	      <td><font color=white><b>Tiempo Permanencia</b></font></td>
	      <td><font color=white><b>Fecha-Hora Recibido</b></font></td>
	      <td><font color=white><b>Fecha Envio</b></font></td>
	      <td><font color=white><b>Hora Envio</b></font></td></tr>";

while ($data = mysqli_fetch_assoc($result)){
	$contador++;
	if(($contador%2)==0){

		echo "<tr bgcolor=#82E0AA>";
		echo "<td>".$data["email"]."</td>
		  	  <td>".$data["canal"]."</td> 
		      <td>".$data["tiempo_perm"]."</td>
		      <td>".$data["hora_fecha_recib"]."</td>
		      <td>".$data["fecha_envio"]."</td>
		      <td>".$data["hora_envio"]."</td>";
		echo "</tr>";
	
	}else{

		echo "<tr bgcolor=#F9E79F>";
		echo "<td>".$data["email"]."</td>
		  	  <td>".$data["canal"]."</td> 
		      <td>".$data["tiempo_perm"]."</td>
		      <td>".$data["hora_fecha_recib"]."</td>
		      <td>".$data["fecha_envio"]."</td>
		      <td>".$data["hora_envio"]."</td>";
		echo "</tr>";
	}
}	

echo "</table>"; 
?>