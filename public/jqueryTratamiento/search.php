<?php
/**
*	@author 	Ing. Israel Barragan C.  Email: ibarragan at behstant dot com
*	@since 		07-Nov-2013
*	##########################################################################################
*	Comments:
*	This file is to show how to retrieve records from a database with PDO
*	The records are shown in a HTML table.
*
*	Requires:
*	Connection.simple.php, get this file here: http://behstant.com/blog/?p=413
*   jQuery and Boostrap.
*
* 	LICENCE:
*	You can use this code to any of your projects as long as you mention where you
* 	downloaded it and the author which is me :) Happy Code.
*
* 	LICENCIA:
*	Puedes usar este código para tus proyectos, pero siempre tomando en cuenta que
* 	debes de poner de donde lo descargaste y el autor que soy yo :) Feliz Codificación.
*	##########################################################################################
*	@version
*	##########################################################################################
*	1.0	|	07-Nov-2013	|	Creation of new file to search a record.
*	##########################################################################################
*/
	require_once 'Connection.simple.php';
	$conn = dbConnect();
	$OK = true; // We use this to verify the status of the update.
	// If 'buscar' is in the array $_POST proceed to make the query.
	if (isset($_GET['sin_diagnostico'])) {
		// Create the query	

		/*$data = $_GET['session_name()'];*/
		$sin_diagnostico = $_GET['sin_diagnostico'];
		$hcl_nomHC = $_GET['hcl_nomHC'];
		$nomEst_Prov = $_GET['nomEst_Prov'];
		$nombrePac = $_GET['nombrePac'];
		$numDoc = $_GET['numDoc'];
		$sin_fecha = $_GET['sin_fecha'];
		$sin_numOA = $_GET['sin_numOA'];
		$sin_especialidad = $_GET['sin_especialidad'];
		$sin_id = $_GET['sin_id'];
		$aseg_id = $_GET['aseg_id'];
		$prov_id = $_GET['prov_id'];
		$sin_diagnosticoSec = $_GET['sin_diagnosticoSec'];
		//$sin_dosisSecundaria = $GET['sin_dosisSecundaria'];
		


		/*$hcl_nomHC = $_GET['hcl_nomHC'];*/
		$cadena_buscada = ":";
		//buscamos posicion de :
		$posicion_coincidencia = strpos($sin_diagnostico, $cadena_buscada, 0);
		$resultado = substr($sin_diagnostico, 4, ($posicion_coincidencia-4));

		//$sql = "SELECT * FROM medicamentos WHERE cod_enf2='$resultado'";
		$sql = "SELECT * FROM medicamento WHERE lds_cod_cieS='$resultado'";
		
		// we have to tell the PDO that we are going to send values to the query
		$stmt = $conn->prepare($sql);
		// Now we execute the query passing an array toe execute();
		$results = $stmt->execute(array($sin_diagnostico));
		// Extract the values from $result
		$rows = $stmt->fetchAll();
		$error = $stmt->errorInfo();
		
		//echo $error[2];
	}
	// If there are no records.
	if(empty($rows)) {
		
		echo "<tr>";
			echo "<td colspan='4'>No existen medicinas para el diagnóstico elegido. Ingrese un diagnóstico válido de la lista desplegable o digite manualmente su diagnóstico y tratamiento como secundarios.</td>";
			
		echo "</tr>";
				
	}
	else {
		echo "<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />";
		
             echo "<div id='itemRows'>";
             echo "<table>";
             echo "<thead>";
             echo "<tr>";
             echo "<th style='width:15.5em; text-align:center;'>MEDICINA</th>";
             echo "<th style='width:15.5em; text-align:center;'>CANTIDAD</th>";
             echo "<th style='width:35.5em; text-align:center;'>DOSIS</th>";
             echo "</tr>";
             echo "</thead>";
        echo "<br>";        
		
		
		echo "<tr class='fila-base'>";
		echo "<td>";
		echo "<select name='add_qty' id='add_qty' style='width:15.5em;' >";
		echo '<option value="">Elegir</option>';

		foreach ($rows as $row) {
			
				
			echo "<option value=".$row['lds_cod_cieS'].">".$row['med_nombre']." / ".$row['med_presentacion']."</option>";
							
		}
		echo "</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "</td>";
		//echo "</tr>";
		echo "<td>";
		echo "<input type='text' name='add_cant' id='cant' style='width:10em;' ><br><br>";
		echo"</td>";
		echo "<td>";
		echo "<input type='text' name='add_name' id='dosis1' style='width:25.5em;' ><br><br>";
		echo"</td>";		
		echo "<td>"; 
		echo"<input onclick='addRow(this.form);' type='button' value='Agregar' class='boton'  style='margin-bottom:15px;'/>";
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";
		
		

		

		echo "<input type='hidden' name='hcl_nomHC' id='hcl_nomHC' value='$hcl_nomHC'>";
		echo "<input type='hidden' name='sin_diagnostico' id='sin_diagnostico' value='$sin_diagnostico'>";
		echo "<input type='hidden' name='nomEst_Prov' id='nomEst_Prov' value='$nomEst_Prov'>";
		echo "<input type='hidden' name='nombrePac' id='nombrePac' value='$nombrePac'>";
		echo "<input type='hidden' name='numDoc' id='numDoc' value='$numDoc'>";
		echo "<input type='hidden' name='sin_fecha' id='sin_fecha' value='$sin_fecha'>";
		echo "<input type='hidden' name='sin_numOA' id='sin_numOA' value='$sin_numOA'>";
		echo "<input type='hidden' name='sin_diagnostico' id='sin_diagnostico' value='$sin_diagnostico'>";
		echo "<input type='hidden' name='sin_diagnosticoSec' id='sin_diagnosticoSec' value='$sin_diagnosticoSec'>";
		echo "<input type='hidden' name='sin_id' id='sin_id' value='$sin_id'>";
		echo "<input type='hidden' name='prov_id id='prov_id' value='$prov_id'>";
		echo "<input type='hidden' name='aseg_id id='aseg_id' value='$aseg_id'>";
		//echo "<input type='hidden' name='sin_dosisSecundaria' id='sin_dosisSecundaria' value='$sin_dosisSecundaria'>";
		echo "<input type='hidden' name='sin_especialidad' id='sin_especialidad' value='$sin_especialidad'>";
		
	}
	
?>