<?php
$link= mysqli_connect("localhost", "root", "", "iniees");
if(mysqli_connect_errno()){
	printf("Fallo de conexion con la base de datos% \n", mysqli_connect_error());
	exit();
}
?>
