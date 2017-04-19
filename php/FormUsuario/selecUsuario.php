<?php
include('../conexion.php');

$nombreUsuario= $_POST['nombreUsuario'];
$contrasena= $_POST['contrasena'];
$query= "select NombreUsuario, contrasena from usuario where NombreUsuario='$nombreUsuario' and contrasena= '$contrasena'";

if ($result = mysqli_query($link, $query)) {

    $newArr = array();
    while ($db_field = mysqli_fetch_assoc($result)) {
        $newArr[] = $db_field;
    }
   
    echo json_encode($newArr);    
}
