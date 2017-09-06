<?php

tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = $nomEst_Prov;
$obj_pdf->SetTitle($title);
$string = "FORMULARIO DE ORDEN DE ATENCION";
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
 
	function strtoDate($cadena){
		$dato="/";
		$lugarAno=4;
		$lugarMes=2;
		$lugarDia=2;
		//$newCadena=substr($cadena, 0, $lugar).$dato.substr($cadena,$lugar);
		$ano=substr($cadena, 0, $lugarAno);
		$mes=substr($cadena, $lugarAno, $lugarMes);
		$dia=substr($cadena, 6, $lugarDia);

		$newCadena=$dia.$dato.$mes.$dato.$ano;
		return $newCadena;
		}

	function CalculaEdad( $fecha ) {
		list($Y,$m,$d) = explode("-",$fecha);
		return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );}


?>
    <!DOCTYPE html>
	<html>
        <table style="width:100%; border-spacing:3px;" border="0.5">
		<tr style="horizontal-align: left;">
			<td border="1" colspan="3" style="background-color:#000000; font-weight: bold; color:#ffffff; text-align:left; height:13px;" ><button type="submit"><?php echo "ORDEN DE ATENCION Nº: ".$sin_numOA?></button></td>			
		</tr>
		
		<tr style="horizontal-align: right;">
			<td style="text-align:left; width:50% "><button type="submit"><?php echo "Paciente: ".$nombreCompleto?></button></td>
			<td style="text-align:left; width:25%; horizontal-align: left;"><button type="submit"><?php echo "DNI: ".$numDoc?></button></td>
			<td style="height:13px; width:25%;"><button type="submit"><?php echo "Fech. Nac.: ".strtoDate($fechNac) ?></button></td>
			
		</tr>

		<tr>
			<td style="height:13px;"><button type="submit"><?php echo "Fecha de Atención: ".$myDateTime->format('d/m/Y');?></button></td>
			<td colspan="2" style="height:13px;"><button type="submit"><?php echo "Lugar de Atención: ".$nomEst_Prov?></button></td>
		</tr>
		<tr>
			<td colspan="3" style="height:20px;"><button type="submit"><?php echo "Especialidad: "?></button></td>
		</tr>

	</table> <br>

	<table style="padding:3px;">
		<tr>
			<td border="1" colspan="2" style="background-color:#000000; font-weight: bold; color:#ffffff;" >CONDICIONES DEL PLAN: <?php echo $nombrePlan?></td>
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


		<h4>Motivo de Consulta</h4>
	    
		<table style="width:100%; border-spacing:3px;" border="1" >
		  
		  <tr>
		    <!-- <td colspan="5" style="height:16px;"> <?php echo $primConsulta?> </td> -->
		    <td colspan="5" style="height:16px;"></td>
		    		    
		  </tr>		  
		  
		</table>
	    
	    <h4>Examen Fisico / Historia Actual</h4>
	    
		<table style="width:100%; border-spacing:3px;" border="1" >
		  <tr>
		    <td style="height:16px;">PA:</td>		
		    <td>FC:</td>
		    <td>FR:</td>
		    <td>Peso(Kg):</td>		
		    <td>Talla:</td>		    
		  </tr>
		  <tr>
		    <td colspan="2" style="height:16px;">Cabeza:</td>
		    <td colspan="3">Piel y Faneras</td>		    
		  </tr>
		  <tr>
		  	<td colspan="2" style="height:16px;">CV:RC:</td>
		    <td colspan="3">TP:MV:</td>
		    
		  </tr>
		  <tr>
		  	<td colspan="3" style="height:16px;">Abdomen:</td>
		    <td colspan="2">RHA:</td>
		    
		  </tr>
		  <tr>
		  	<td colspan="5" style="height:16px;">Neuro:</td>
		    		    
		  </tr>
		</table>

		<h4>Diagnóstico</h4>
	    
		<table style="width:100%; border-spacing:3px;" border="1" >
		  
		  <tr>
		    <td colspan="5" style="height:16px;">  </td>
		    		    
		  </tr>		  
		  
		</table>

		<h4>Medicamentos (El Plan solo cubre medicamentos en su presentación genérica)</h4>
		
	    
		<table style="width:100%; border-spacing:3px;" border="1" >

			<tr>
    			<th style="text-align:center; height:16px; "><h4>Medicamento</h4></th>
    			<th style="text-align:center; height:16px; "><h4>Cantidad</h4></th>
    			<th style="text-align:center; height:16px; "><h4>Dosis</h4></th>		
    			
  			</tr>			
			
			<tr>
				<td style="height:16px;">  </td>		
		    	        <td>  </td>
		    	        <td>  </td>
			</tr>
			<tr>
				<td style="height:16px;">  </td>		
		    	      <td>  </td>
		    	      <td>  </td>
			</tr>
			<tr>
				<td style="height:16px;">  </td>		
		    	        <td>  </td>
		    	        <td>  </td>
			</tr>
						  
		  		  
		</table> 
		
		
		<h4>Exámenes, Laboratorio e Imágenes:</h4><br>
	    
		<table style="width:100%; border-spacing:3px;" border="1" >
			<tr>
    			<td style="height:14px;">  </td>    			
  			</tr>			
			<tr>
				<td style="height:14px;">  </td>						    	
			</tr>
			<tr>
    			<td style="height:14px;">  </td>    			
  			</tr>	 
		</table>

		<br>
                <table>
                    <tr style="height: 28px">
				<th style="text-align:center; height:14px;"><h4>------------------------------------------</h4></th>
    			<th style="text-align:center; height:14px;"><h4>------------------------------------------</h4></th>
			</tr>
			<tr>
				<th style="text-align:center; height:14px;"><h4>Médico Tratante</h4></th>
    			<th style="text-align:center; height:14px;"><h4>Titular y/o Paciente</h4></th>
			</tr>
                       
		</table>
                <br>
                
                <span>Mediante el presente autorizo a Red Salud se le proporcione toda informacion m&eacute;dica que requiera para la evaluacion de expediente m&eacute;dico</span>
              
             
              <br>
	     <table style="width:100%; margin-top: 8px; border-spacing:0px;" border="0" >
                <tr style="text-align:right;">
			<td border="1" colspan="4" style="background-color:#000000; font-weight: bold; color:#ffffff; text-align:right; height:13px;" ><button type="submit">ORDEN DE MEDICAMENTO</button></td>			
		</tr> 
		<tr style="horizontal-align: center;">

                        <td style="text-align:left; width:100%; height: 5px;"></td>
			
		</tr>
                <tr style="horizontal-align: center;">

                        <td style="text-align:left; width:50%; "><button type="submit"><?php echo "Paciente: ".$nombrePac?></button></td>
			<td style="text-align:right; width:40%; ; horizontal-align: center;"><button type="submit"><?php echo "Orden Atencion Nº: "?></button></td>
			<td style="text-align:right;height: 5px; width:10%;font-size:12px; background-color:#000000; color:#ffffff;"><h4><button type="submit"><?php echo $sin_numOA?></button></h4></td>
      
		</tr>
		<tr>
                    <td><button type="submit"><?php echo "DNI: ".$numDoc?></button></td>
			<td rowspan="4" colspan="2" border="1">CONDICIONES DEL PLAN: <?php echo $nombrePlan?><br><br>
				<table class="tablestyle" border="0">
						<tbody>
						<?php foreach ($buscaPlan as $u): ?>
                                                    <?php if($u['planDeta_id']==31 or $u['planDeta_id']==11 ): ?>
							<tr>
								<td style="width:40%; padding:5px;"><?=$u['varPlan_deta']?> </td>
								<td style="width:2% ">:</td>
							        <td style="width:5% "></td>
								<td style="width:40%; font-weight: bold;"><?=$u['planDeta_textWeb']?></td>
							</tr>
                                                        <?php endif;?>
						<?php endforeach; ?>
						</tbody>
			        </table>
			</td>
		</tr>
		
		<tr>
                    <td><button type="submit"><?php echo "Fecha de Atención: ".$myDateTime->format('d/m/Y');?></button></td>
		</tr>
		
		<tr>
                    <td><button type="submit"><?php echo "Lugar de Atención: ".$nomEst_Prov?></button></td>
		</tr>	
	    </table> 
              <table>
                  <tr>
                      <td> <h3>Tratamiento:</h3></td>
                  </tr>
                  <tr>
                      <td> <h4> Cubierto: (El Plan solo cubre medicamentos en su presentación genérica)</h4></td>
                      <td> </td>
                  </tr>
              </table>
		<table style="width:100%; border-spacing:3px;" border="1" >

			<tr>
    			<th style="text-align:center; height:17px;"><h4>Medicamento Cubierto</h4></th>
    			<th style="text-align:center; height:17px;"><h4>Cantidad</h4></th>
    			<th style="text-align:center; height:17px;"><h4>Dosis</h4></th>    			
  			</tr>
                        <tr>
                                <td style="height:17px;"></td>
                                <td style="height:17px;"></td>
                                <td style="height:17px;"></td>
                        </tr>	
                        <tr>
                                <td style="height:17px;"></td>
                                <td style="height:17px;"></td>
                                <td style="height:17px;"></td>
                        </tr>	
                        <tr>
                                <td style="height:17px;"></td>
                                <td style="height:17px;"></td>
                                <td style="height:17px;"></td>
                        </tr>	
                        <tr>
                                <td style="height:17px;"></td>
                                <td style="height:17px;"></td>
                                <td style="height:17px;"></td>
                        </tr>	
                        <tr>
                                <td style="height:17px;"></td>
                                <td style="height:17px;"></td>
                                <td style="height:17px;"></td>
                        </tr>	
		</table>
                <table>
                    <tr>
                        <td><h4></h4></td>
                    </tr>
                    <tr>
                        <td><h4>No Cubierto:</h4></td>
                    </tr>
                </table>
              <table style="width:100%; border-spacing:3px; font-size:8px;" border="1" >

					<tr>
		    			<th style="text-align:center; height:17px;"><h4>Medicamento Cubierto</h4></th>
		    			<th style="text-align:center; height:17px;"><h4>Cantidad</h4></th>
		    			<th style="text-align:center; height:17px;"><h4>Dosis</h4></th>    			
		  			</tr>

                                        <tr>
                                                <td style="height:17px;"> </td>
                                                <td style="height:17px;"> </td>
                                                <td style="height:17px;"></td>
                                        </tr>											 
                                        <tr>
                                                <td style="height:17px;"> </td>
                                                <td style="height:17px;"> </td>
                                                <td style="height:17px;"></td>
                                        </tr>											 
                                        <tr>
                                                <td style="height:17px;"> </td>
                                                <td style="height:17px;"> </td>
                                                <td style="height:17px;"></td>
                                        </tr>											 
                                        <tr>
                                                <td style="height:17px;"> </td>
                                                <td style="height:17px;"> </td>
                                                <td style="height:17px;"></td>
                                        </tr>											 
                                        <tr>
                                                <td style="height:17px;"> </td>
                                                <td style="height:17px;"> </td>
                                                <td style="height:17px;"></td>
                                        </tr>
				</table>	

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
        </html>
	
<?php
    $content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output("'".$nombreCompleto.".pdf'", 'I');
$this->load->view ('view_mcaBuscaFail');	
 ?>
