<?php

include("./funciones.php");

$conexion=conectar();
$filter = $_POST['select_part'];



$result = $conexion->query("
SELECT T1.Id_tipoparte,
        T1.Id_atributo,
        T2.aDescripcion,
        Orden 
        FROM tiposasignaatributos_ap T1
        INNER JOIN tiposatributo_ap T2 ON T2.aId=T1.Id_atributo
        WHERE Id_tipoparte=$filter order by Orden");
		

if ($result->num_rows > 0) 

{
	
	$html .= '<div class="row sortable"  id="drop-items">';
    while ($row = $result->fetch_assoc()) {  			

		
		        $html .= '
                
                <div class="col-md-6 col-lg-4" data-index='.$row['Id_atributo'].' data-position='.$row['Orden'].' >
                <div class="drop__card">
                    <div class="drop__data">
                       
        
                        <div>
                            <h1 class="drop__name">'.$row['aDescripcion'].'</h1>
                           
                        </div>
                    </div>
                    <div class="circulo">
                        <h2>'.$row['Orden'].'</h2>
                    </div>            
                </div>
                </div>
          
        
          ';
		
    }
	$html .= '</div>';	
	
}



echo $html;
?>

