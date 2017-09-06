<?php
tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = $sin_lugar;
$obj_pdf->SetTitle($title);
$string = "REPORTE DE ORDEN DE ATENCION";
//$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, PDF_LMARGIN_HEADER);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, $string, PDF_LMARGIN_HEADER);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
//eliminar el pie de pagina (linea y numero de pgina)
$obj_pdf->SetPrintFooter(false);
$obj_pdf->AddPage();
ob_start();

// we can have any view part here like HTML, PHP etc
// formateamos la fecha de la bbdd (Y-M-D) a D-M-Y
$myDateTime = DateTime::createFromFormat('Y-m-d', $sin_fecha); 
?>
    <!DOCTYPE html>
	<html><br>
	<table style="width:100%; border-spacing:3px;" border="0.5">
		<tr style="horizontal-align: left;">
			<td border="1" colspan="3" style="background-color:#000000; font-weight: bold; color:#ffffff; text-align:left; height:13px;" ><button type="submit"><?php echo "ORDEN DE ATENCION Nº: ".$sin_numOA?></button></td>			
		</tr>
		
		<tr style="horizontal-align: right;">
			<td style="text-align:left; width:50% "><button type="submit"><?php echo "Paciente: ".$nombrePac?></button></td>
			<td style="text-align:left; width:25%; horizontal-align: left;"><button type="submit"><?php echo "DNI: ".$sin_numDocId?></button></td>
			<td style="height:13px; width:25%;"><button type="submit"><?php echo "Historia Clinica: ".$sin_hclinica?></button></td>
			
		</tr>

		<tr>
			<td style="height:13px;"><button type="submit"><?php echo "Fecha de Atención: ".$myDateTime->format('d-m-Y');?></button></td>
			<td colspan="2" style="height:13px;"><button type="submit"><?php echo "Lugar de Atención: ".$sin_lugar?></button></td>
		</tr>
		<tr>
			<td colspan="3" style="height:30px;"><button type="submit"><?php echo "Especialidad: ".$sin_especialidad?></button></td>
		</tr>

	</table> <br>

	<table style="padding:3px;">
		<tr>
			<td border="1" colspan="2" style="background-color:#000000; font-weight: bold; color:#ffffff;" >CONDICIONES DEL PLAN:</td>
		</tr>

		<tr>					
			<td rowspan="5" colspan="2" border="1">

				<table class="tablestyle" border="0" style="padding:2px;">
					<tbody>
						<?php foreach ($buscaPlan as $u): ?>
							<tr>
								<td style="width:40%; padding:5px; background-color:#D8D8D8"><?=$u['varPlan_deta']?> </td>
								<td style="width:2% ">:</td>
								<td style="width:58% "><?=$u['planDeta_textWeb']?></td>
							</tr>											 
						<?php endforeach; ?>
					</tbody>
				</table>
			</td>
		</tr>
	</table>

	    
	    <h3>Examen Fisico / Historia Actual</h3>
	    
		<table style="width:100%; border-spacing:3px;" border="1" >
		  <tr>
		    <td style="height:17px;"><?php echo "PA: ".$sin_pa?></td>		
		    <td><?php echo "FC: ".$sin_fc?></td>
		    <td><?php echo "FR: ".$sin_fr?></td>
		    <td><?php echo "Peso: ".$sin_peso." Kg"?></td>		
		    <td><?php echo "Talla: ".$sin_talla?></td>		    
		  </tr>
		  <tr>
		    <td colspan="2" style="height:17px;"><?php echo "Cabeza: ".$sin_cabeza?></td>
		    <td colspan="3"><?php echo "Piel y Faneras: ".$sin_pielFaneras?></td>		    
		  </tr>
		  <tr>
		  	<td colspan="2" style="height:17px;"><?php echo "CV:RC: ".$sin_cvrc?></td>
		    <td colspan="3"><?php echo "TP:MV: ".$sin_tpmv?></td>
		    
		  </tr>
		  <tr>
		  	<td colspan="3" style="height:17px;"><?php echo "Abdomen: ".$sin_abdomen?></td>
		    <td colspan="2"><?php echo "RHA: ".$sin_rha?></td>
		    
		  </tr>
		  <tr>
		  	<td colspan="5" style="height:17px;"><?php echo "Neuro: ".$sin_neuro?></td>
		    		    
		  </tr>
		  <tr>
		  	<td colspan="5" style="height:17px;"><?php echo "Osteomuscular: ".$sin_osteomuscular?></td>
		    		    
		  </tr>
		  <tr>
		  	<td colspan="3" style="height:17px;"><?php echo "GU:PPL: ".$sin_guppl?></td>
		    <td colspan="2"><?php echo "GU:PRU ".$sin_gupru?></td>
		    
		  </tr>
		</table><br>

		<h3>Diagnóstico</h3>
	    
		<table style="width:100%; border-spacing:3px;" border="1" >
		  
		  <tr>
		    <td colspan="5" style="height:17px;"><?php echo "Principal: ".$sin_diagnostico?></td>
		    		    
		  </tr>

		  <?php if ($sin_diagnosticoSec!==0) { ?>
 			
 			<tr>
		  		<td colspan="5" style="height:17px;"><?php echo "Secundario: ".$sin_diagnosticoSec?></td>	    
		    </tr>

		 <?php } ?>

		</table><br>

	<h3>Tratamiento</h3>
	<?php if ($tratPrin!=0){?>	
		
		<h4>Cubierto:</h4><br>
	    
		<table style="width:100%; border-spacing:3px;" border="1" >

			<tr>
    			<th style="text-align:center; height:17px;"><h4>Medicamento Cubierto</h4></th>
    			<th style="text-align:center; height:17px;"><h4>Cantidad</h4></th>
    			<th style="text-align:center; height:17px;"><h4>Dosis</h4></th>    			
  			</tr>

  			<?php foreach ($tratPrin as $u): ?>
				<tr>
					<td style="height:17px;"><?=$u['trat_medi']?> </td>
					<td style="height:17px;"><?=$u['trat_cant']?> </td>
					<td style="height:17px;"><?=$u['trat_dosis']?> </td>
				</tr>											 
			<?php endforeach; ?>
		  		  
		</table>

	<?php } ?>		

		
		<?php if ($tratSec!=0){ ?>

				
				<h4>No Cubierto:</h4><br>
			    
				<table style="width:100%; border-spacing:3px;" border="1" >

					<tr>
		    			<th style="text-align:center; height:17px;"><h4>Medicamento Cubierto</h4></th>
		    			<th style="text-align:center; height:17px;"><h4>Cantidad</h4></th>
		    			<th style="text-align:center; height:17px;"><h4>Dosis</h4></th>    			
		  			</tr>

		  			<?php foreach ($tratSec as $u): ?>
						<tr>
							<td style="height:17px;"><?=$u['trat_medi']?> </td>
							<td style="height:17px;"><?=$u['trat_cant']?> </td>
							<td style="height:17px;"><?=$u['trat_dosis']?> </td>
						</tr>											 
					<?php endforeach; 


					if ($tratSecPrin!=0) { ?>

					
						
			  			<?php foreach ($tratSecPrin as $u): ?>
							<tr>
								<td style="height:17px;"><?=$u['trat_medi']?> </td>
								<td style="height:17px;"><?=$u['trat_cant']?> </td>
								<td style="height:17px;"><?=$u['trat_dosis']?> </td>
							</tr>											 
						<?php endforeach; ?>
				  		  
				</table>	

		<?php }} elseif ($tratSecPrin!=0) { ?>

				
				<h4>No Cubierto:</h4><br>

				<table style="width:100%; border-spacing:3px;" border="1" >
					
		  			<?php foreach ($tratSecPrin as $u): ?>
						<tr>
							<td style="height:17px;"><?=$u['trat_medi']?> </td>
							<td style="height:17px;"><?=$u['trat_cant']?> </td>
							<td style="height:17px;"><?=$u['trat_dosis']?> </td>
						</tr>											 
					<?php endforeach; ?>
				  		  
				</table>


			
		<?php }


		if(($tratPrin==0) and ($tratSecPrin==0) and ($tratSec==0)){
			echo '<h4>No existen indicaciones de Medicamentos</h4>';
		}

		?>
					
					


		<?php if ($verLab==0) 
			{?>
			<h4>No existen indicaciones de Exámenes/Laboratorio/Imágenes</h4>
			<?php } else { ?>	

			<h3>Exámenes, Laboratorio e Imágenes:</h3><br>
		    <table style="width:100%; border-spacing:3px;" border="1" >

				<tr>
		    		<th style="text-align:center; height:17px;"><h4>Examen</h4></th>
		    		<th style="text-align:center; height:17px;"><h4>Estado</h4></th>	    			
		  		</tr>

		  		<?php foreach ($verLab as $u): 
		  			if ($u['lab_tipo']==1) {
		  		?>
					<tr>
						<td style="height:17px;"><?=$u['detaAnalisis']?> </td>
						<td style="height:17px;">Cubierto</td>							
					</tr>
				<?php }elseif ($u['lab_tipo']==3) { ?>
					<tr>
						<td style="height:17px;"><?=$u['detaAnalisis']?> </td>
						<td style="height:17px;">No Cubierto</td>							
					</tr>

				<?php }?> 
				<?php endforeach; ?>
				  		  
			</table>

			<?php } ?>
			
			<h4>* Los medicamento, examenes de laboratorio e imágenes indicados como No Cubiertos deberán ser cancelados por el afiliado. </h4> 


		<table>
			<tr>
				<th> <p>

					</p> 
				</th>
				<th> <p> 

					</p> 
				</th>
			</tr>
			<tr>
				<th> <p>

					</p> 
				</th>
				<th> <p> 

					</p> 
				</th>
			</tr>

			<tr> 
				<th style="text-align:center; height:17px;"><h4>------------------------------------------</h4></th>
    			<th style="text-align:center; height:17px;"><h4>------------------------------------------</h4></th>
			</tr>
			<tr>
				<th style="text-align:center; height:17px;"><h4>Médico Tratante</h4></th>
    			<th style="text-align:center; height:17px;"><h4>Titular y/o Paciente</h4></th>
			</tr>
		</table>

		<br><br><br><br>
		<div id="grupo">						
			<h4 style="color:#DC0606;">Si tuviera algun problema o consulta, puede comunicarse con Red-Salud. <br>Central Telefónica: (01) 445-3019. RPM: #959942999. Email: contacto@red-salud.com</h4>
		</div>



    <!-- <button type="submit"><?php echo "FA: ".$nom1." ".$nom2." ".$ape1." ".$ape2?></button> -->
</html>
	
<?php
    $content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output("'".$sin_numOA.".pdf'", 'I');
	
 ?>