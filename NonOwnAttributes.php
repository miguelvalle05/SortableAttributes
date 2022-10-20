<?php

include("./funciones.php");

$conexion=conectar();
$filter = $_POST['select_part'];



$result = $conexion->query("

SELECT aDescripcion,
aId
FROM tiposatributo_ap
WHERE aId NOT IN
  (
    SELECT T1.aId
FROM tiposatributo_ap T1
INNER JOIN tiposasignaatributos_ap T2 ON T2.Id_atributo=T1.aId
wHERE T2.Id_tipoparte=$filter
  ) ORDER BY aDescripcion ASC

");
		

if ($result->num_rows > 0) 

{
	
	$html .= '<div class="row nsortable"  id="drop-items">';
    while ($row = $result->fetch_assoc()) {  			

		
		        $html .= '
                
                <div class="col-md-6 col-lg-4" data-index='.$row['aId'].' data-position=0 >
                <div class="ndrop__card">
                    <div class="ndrop__data">
                       
        
                        <div>
                            <h1 class="ndrop__name">'.$row['aDescripcion'].'</h1>
                           
                        </div>
                    </div>
                    <div class="ncirculo">
                        <h2>N</h2>
                    </div>            
                </div>
            </div>
          
        
          ';
		
    }
	$html .= '</div>';	
	
}



echo $html;
?>
