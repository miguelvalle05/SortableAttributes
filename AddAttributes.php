<?php
include("./funciones.php");
$conexion = conectar();

$filter=$_POST['select_part'];
$ndata=$_POST['ndata'];
    if (isset($_POST['update'])) {
       
          $InsertPosition = ("INSERT INTO tiposasignaatributos_ap (Id_atributo,Id_tipoparte,Orden) VALUES ($ndata,$filter,0)");
          
          $result = $conexion->query($InsertPosition);
         
          print_r($InsertPosition);
        
    }


?>