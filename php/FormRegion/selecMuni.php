<?php
include('../conexion.php');
//carga con fomrmato json
//$query = "select codMunicipio, nombreMunicipio from municipio";
$departamento = $_GET['codDepartamento'];



$query = "SELECT * FROM municipio WHERE codDepartamento = '$departamento'";

if ($result = mysqli_query($link, $query)) {

    $newArr = array();
    while ($db_field = mysqli_fetch_assoc($result)) {
        $newArr[] = $db_field;
    }
   
    echo json_encode($newArr);    
}


//$conexion = mysqli_connect("localhost","root","","ideas_web");

//$departamento = $_POST['departamento'];

//$query = "SELECT * FROM municipio WHERE codDepartamento = $departamento");

//echo '<option value="0">Seleccione</option>';

/*while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['id_pais']. '">' . $row['nombre'] . '</option>' . "\n";
}

*/