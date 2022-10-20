<?php
include("./funciones.php");
$conexion = conectar();

$filter=$_POST['select_part'];
    if (isset($_POST['update'])) {
        foreach($_POST['positions'] as $position) {
           $index = $position[0];
           $newPosition = $position[1];

          $UpdatePosition = ("UPDATE tiposasignaatributos_ap SET Orden = '$newPosition' WHERE Id_atributo='$index' AND Id_tipoparte='$filter'");
          
          $result = $conexion->query($UpdatePosition);
         
          print_r($UpdatePosition);
        }
    }
?>

