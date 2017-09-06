<?php

tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = $sin_lugar;
$obj_pdf->SetTitle($title);
$string = "ORDEN DE MEDICAMENTOS";
//$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, PDF_LMARGIN_HEADER);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $string, $title, PDF_LMARGIN_HEADER);
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
?>
    <!DOCTYPE html>
	<html>
		<table style="width:100%; border-spacing:3px;" border="0">
		<tr style="horizontal-align: center;">
			<td style="text-align:left; width:50% "><button type="submit"><?php echo "Paciente: ".$nombrePac?></button></td>
			<td style="text-align:right; width:40%; horizontal-align: center;"><button type="submit"><?php echo "Orden Atencion Nº: "?></button></td>
			<td style="text-align:right; width:10%; font-size:12px; background-color:#000000; color:#ffffff;"><h4><button type="submit"><?php echo $sin_numOA?></button></h4></td>
		</tr>
		<tr>
			<td><button type="submit"><?php echo "DNI: ".$sin_numDocId?></button></td>
			<td rowspan="5" colspan="2" border="1">CONDICIONES DEL PLAN:<br><br>

				<table class="tablestyle" border="0">

									

									<tbody>
									 <?php foreach ($buscaPlan as $u): ?>
										<tr>
											<td style="width:40% padding:5px;"><?=$u->varPlan_deta?> </td>
											<td style="width:2% ">:</td>
											<td style="width:58%; font-weight: bold;"><?=$u->planDeta_textWeb?></td>
										</tr>											 
									 <?php endforeach; ?>
									</tbody>
								</table>





			</td>
		</tr>
		
		<tr>
			<td><button type="submit"><?php echo "Fecha de Atención: ".$sin_fecha?></button></td>
		</tr>
		
		<tr>
			<td><button type="submit"><?php echo "Lugar de Atención: ".$sin_lugar?></button></td>
		</tr>		

		<tr>
			<td><button type="submit">Plan: <?php echo $nomPlan?></button></td>
		</tr>
		

	</table> <br><br><br>


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
	    
		


		

		<table style="width:100%; border-spacing:3px;" border="0" >
				<tr>
	    			<th style="text-align:left; height:16px;"><h4>* El Plan no cubre vitaminas ni ansiolíticos.</h4></th>
	  			</tr>
	  			<tr>
	    			<th style="text-align:left; height:16px;"><h4>* La presente Orden de Medicamentos tiene validez por 7 días.</h4></th>
	  			</tr>			
				
		</table>
		

<br><br><br><br><br><br><br><br><br>
		<table>
			<tr>
				<th style="text-align:center; height:16px;"><h4>------------------------------------------</h4></th>
    			<th style="text-align:center; height:16px;"><h4>------------------------------------------</h4></th>
			</tr>
			<tr>
				<th style="text-align:center; height:16px;"><h4>Médico Tratante</h4></th>
    			<th style="text-align:center; height:16px;"><h4>Titular y/o Paciente</h4></th>
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
$obj_pdf->Output("'Trat".$sin_numOA.".pdf'", 'I');
	
 ?>