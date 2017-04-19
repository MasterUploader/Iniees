<?php
include('../conexion.php');
//carga con fomrmato json
$query = "select codDepartamento, nombreDepartamento from departamento";

if ($result = mysqli_query($link, $query)) {

    $newArr = array();
    while ($db_field = mysqli_fetch_assoc($result)) {
        $newArr[] = $db_field;
    }
   
    echo json_encode($newArr);    
}
