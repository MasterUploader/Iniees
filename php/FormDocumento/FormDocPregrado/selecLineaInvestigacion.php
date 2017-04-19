<?php
include('../../conexion.php');

$query= "select CodLineaInvestigacion, NombreLinea from linea_investigacion";

if ($result = mysqli_query($link, $query)) {

    $newArr = array();
    while ($db_field = mysqli_fetch_assoc($result)) {
        $newArr[] = $db_field;
    }
   
    echo json_encode($newArr);    
}
