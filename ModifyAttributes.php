<HTML>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Atributos MANIJAUTO</title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/ModifyAttributes.css">

</head>
<body>

<div class="container">
<?php		
include("./funciones.php");
$conexion = conectar();


    


    $tipo_parte=$_POST['tipo_parte'];

        $resultAttributes = $conexion->query("
        SELECT T1.Id_tipoparte,
        T1.Id_atributo,
        T2.aDescripcion,
        Orden 
        FROM tiposasignaatributos_ap T1
        INNER JOIN tiposatributo_ap T2 ON T2.aId=T1.Id_atributo
        WHERE Id_tipoparte=$tipo_parte order by Orden");
                




?>

<h1 class="title has-text-centered">Asignar Atributos</h1>

<form id="frmGeneral" name="frmGeneral" method="POST">

	<label class="label">Producto Manijauto: </label>
	<div class="field is-grouped">
					
		
					<div class="field">
						<p class="control has-icons-left">
						<span class="select">
						<select name="part_type" id="part_type">
						<option value="">Tipo de parte</option>
						
										<?php
											$result = $conexion->query("SELECT Id, Descripcion FROM  tiposparte_ap ORDER BY Descripcion");
											if ($result->num_rows > 0) {
												while ($row = $result->fetch_assoc()) { 
													echo '<option value="'.$row['Id'].'">'.$row['Descripcion'].'</option>';
												}
											}
											?>
						</select>
						</span>
						<span class="icon is-small is-left">
						<i class="fas fa-cogs"></i>
						</span>
						</p>
					</div>

                   
		
    </div>


             <label class="label">Atributos Asignados: </label>

	 		<div class="man" name="attributes" id="attributes">
							
			<?php echo $_POST['attributes'];?><?php echo $_POST['attributes'];?>
						
            </div>
            
            <label class="label">Atributos No Asignados: </label>


			<div class="man" name="notattributes" id="notattributes">
							
			<?php echo $_POST['notattributes'];?><?php echo $_POST['notattributes'];?>
						
            </div>
            


</form>

</div>

</br>
</br>
<footer>
   <p style="text-align:center"> <img src="../../../programas/imagenes/footer.png" width="125" height="55" /> </p>
   <p style="text-align:center"> <strong> &copy;2022 Manijas y Autopartes S.A. de C.V.</strong></p>
   <p style="text-align:center "> <strong><i class="fas fa-laptop-code"> </i> Miguel Valle</strong></p>
</footer>

<script language="javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="./js/jquery-ui.min.js"></script>
<script language="javascript"src="./js/ModifyAttributes.js" ></script>

<script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</HTML>

