<?php
include("./funciones.php");
$conexion = conectar();

$filter=$_POST['select_part'];
$ndata=$_POST['ndata'];
    if (isset($_POST['update'])) {

       /* $DeletePositionOne = ("DELETE FROM valatributos_ap WHERE id_atributos=$ndata");
          
        $resultOne = $conexion->query($DeletePositionOne);
       
        print_r($DeletePositionOne);*/
       
          $DeletePosition = ("DELETE FROM tiposasignaatributos_ap WHERE Id_tipoparte=$filter AND Id_atributo=$ndata");
          
          $result = $conexion->query($DeletePosition);
         
          print_r($DeletePosition);
        
    }
?>