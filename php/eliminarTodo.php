<?php
session_start();
if (@!$_SESSION['email']) {
  header("Location:../index.php");
}


$link = mysqli_connect("localhost","root","","id7960719_ratingtv");

mysqli_query($link, "TRUNCATE TABLE datos");

mysqli_close($link);


 echo '<script>alert("SE ELIMINO TODOS LOS DATOS")</script>';
 echo "<script>location.href='../admin/datos.php'</script>";

?>
