<?php
include('../conexion.php');

$query= "select CodTipoUsuario, NombreTipoUsuario from tipo_usuario";

if ($result = mysqli_query($link, $query)) {

    $newArr = array();
    while ($db_field = mysqli_fetch_assoc($result)) {
        $newArr[] = $db_field;
    }
   
    echo json_encode($newArr);    
}
