
<!doctype html>
<html>
<head>
<title>Red Salud Admin</title>
<meta charset="utf-8" />

<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Please link back to http://csscreator.com -->
<link rel="stylesheet" href="public/css/main.css" type="text/css" />
<link rel="stylesheet" href="public/css/form.css" type="text/css" />

<link rel="stylesheet" href="public/jqueryui/css/redmond/jqueryui.css">
<script src="public/jqueryui/js/jquery-1.10.2.js"></script>
<!--<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>-->
<script src="public/jqueryui/js/jquery-ui.js"></script>
<link rel="stylesheet" href="public/css/pure-min.css">


<!-- FancyBox -->
	<!-- Add jQuery library 
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	-->
	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="public/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox -->
	<link rel="stylesheet" href="public/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="public/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

	<script>
		$(".fancybox")
    .attr('rel', 'gallery')
    .fancybox({
        type: 'iframe',
        autoSize : false,
        beforeLoad : function() {         
            this.width  = parseInt(this.element.data('fancybox-width'));  
            this.height = parseInt(this.element.data('fancybox-height'));
        }
    });
	</script>







</head>
<body>

<?php 
	function strtoDate($cadena){
		$dato="-";
		$lugarAno=4;
		$lugarMes=2;
		$lugarDia=2;
		//$newCadena=substr($cadena, 0, $lugar).$dato.substr($cadena,$lugar);
		$ano=substr($cadena, 0, $lugarAno);
		$mes=substr($cadena, $lugarAno, $lugarMes);
		$dia=substr($cadena, 6, $lugarDia);

		$newCadena=$ano.$dato.$mes.$dato.$dia;
		return $newCadena;
		}

	function CalculaEdad( $fecha ) {
		list($Y,$m,$d) = explode("-",$fecha);
		return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}?>

<div id="pagewidth" >
	
	<div id="header"><img src="public/images/logo.png"></div>

	<nav>
		<div id="menuhorizontal">
			<ul>
				<li></li>
				<li></li>
				<li></li>
				
			</ul>
		</div>
	</nav>
	
	<div id="wrapper" style="width:auto;" class="clearfix">
			<div id="maincol" style="width:60%; padding-left:20%;">
				<h4>BIENVENIDO <?php echo $nomEst_Prov?></h4> 
				<div id="tabs" style="width:auto;">
					  <ul>
					    <li><a href="#fragment-1"><span>Asegurados</span></a></li>					    
					  </ul>
					  
					  <div id="fragment-1" style="width:auto;">
					  <!-- <input type="button" value="Nuevo" onclick="window.location='http://www.google.com';" /> -->
						<div id="grupo">
						<form class="pure-form" action="buscaAsegurado" method="post">
						<!-- <form class="pure-form" action="buscaAsegurado" method="post" target="_blank"> -->
							<input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
						    <fieldset>
						        <h3 style="color:#033766;">Búsqueda</h3>
						        <h4>Ingrese el DNI del asegurado para iniciar una búsqueda.</h4>
						        <input name="dni" id="dni" placeholder="DNI">
						        <button type="submit" class="pure-button pure-button-primary">Buscar</button> <div style="width:65%; float:right; text-align:right;"><h4 style="color:#DC0606; margin-top:0px; margin-bottom:0px;">Si tuviera algun problema o consulta, puede comunicarse con Red-Salud. <br>Central Telefónica: (01) 445-3019. RPM: #959942999. <br>Email: contacto@red-salud.com</h4></div>
						    </fieldset>
						</form>

						</div><br>
						
						<button type="submit" class="pure-button pure-button-primary"><?php echo $nombreEmpresa?></button> 
						<button type="submit" class="boton fancybox" href="verPlan/<?php echo $cert_plan?>" data-fancybox-width="800" data-fancybox-height="550">Condiciones del Plan :<?php echo ' '. $plan ?></button><br><br>						
						<button type="submit" class="pure-button pure-button-primary"><?php echo $nom1." ".$nom2." ".$ape1." ".$ape2?></button>
						 
						<div id="grupo">
							
							<br>
							<div id="grupo">
								
							<form class="pure-form" >

								<?php 
								// calculo de fechas
								if (!empty($sin_fecha)){
								$sin_fechaCalculo = DateTime::createFromFormat('Y-m-d', $sin_fecha);
								$fechaHoy = date('Y/m/d'); 
								$ultAtencion = $sin_fechaCalculo->format('Y/m/d');
								}else{
									$fechaHoy = date('Y/m/d');
									$ultAtencion = "1900/01/01";

								}
								function dias_transcurridos($fecha_i,$fecha_f)
									{
									$dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
									$dias = abs($dias); $dias = floor($dias);
									return $dias;
									}

								$diasTranscurridos=dias_transcurridos($ultAtencion, $fechaHoy);

								//echo $finVigencia->format('Y-m-d')."<br>";
								//echo $fechIniVig->format('Y-m-d')."<br>";
								//echo $hoy->format('Y-m-d')."<br>";
								//echo $cert_plan;
								
								?>									
									DNI <input name="numDoc" id="numDoc" style="color:<?php echo $color?>; width:11%; text-align:center;" readonly="readonly" value="<?php echo $numDoc?>">
									&nbsp;&nbsp;

									<?php if ($diasTranscurridos<1 OR $diasTranscurridos>7){?>

										Estado <input name="estadoFail" id="estadoFail" style="color:<?php echo $color?>; width:13%; text-align:center;" readonly="readonly" value="<?php echo $estadoCerti?>">
									
									<?php } elseif ($diasTranscurridos>=1 and $diasTranscurridos<8) { ?>

										Estado <input name="estadoFail" id="estadoFail" style="color:#E21919; width:13%; text-align:center;" readonly="readonly" value="INACTIVO">					
									
									<?php } ?>

								<?php if (empty($sin_fecha)){?>
									&nbsp;&nbsp;Fech. Ult. Aten. <input name="fechaFail" id="fechaFail" style="color:#469A05; width:13%; text-align:center;" readonly="readonly" value="Ninguna">
								<?php } else {
									$sin_fecha = DateTime::createFromFormat('Y-m-d', $sin_fecha);?>
									&nbsp;&nbsp;Fech. Ult. Aten. <input name="fechaOk" id="fechaOk" style="color:#E21919; width:13%;" readonly="readonly" value="<?php echo $sin_fecha->format('d/m/Y');?>">
								<?php } ?>

								<?php if (empty($sin_lugar)){?>
									&nbsp;&nbsp;Lugar Ult. Atención <input name="lugarFail" id="lugarFail" style="color:#469A05; width:15%; text-align:center;" readonly="readonly" value="Ninguno">
								<?php } else {?>
									&nbsp;&nbsp;Lugar Ult. Atención <input name="lugarOk" id="lugarOk" style="color:#E21919; width:15%;" readonly="readonly" value="<?php echo $sin_lugar?>">
								<?php }?>
							</form>
							<br>
							</div>
							<br>


							<div id="grupo">
								<form class="pure-form" >
								
								<?php
									
									//$iniVigencia = DateTime::createFromFormat('Y-m-d', $cert_iniVigencia);
									//$finVigencia = DateTime::createFromFormat('Y-m-d', $cert_finVigencia);
									$newFechNac = DateTime::createFromFormat('Y-m-d', strtoDate($fechNac));									
									//echo $date->format('d/m/Y');


								?>

								<br>
								Nombres y Apellidos: <input name="numDoc" id="numDoc" style="color:#469A05; width:53%; text-align:left;" readonly="readonly" value="<?php echo trim($nom1)." ".trim($nom2)." ".trim($ape1)." ".trim($ape2)?>">&nbsp;&nbsp; F. Nacimiento: <input name="numDoc" id="numDoc" style="color:#469A05; width:13%; text-align:center;" readonly="readonly" value="<?php echo $newFechNac->format('d/m/Y');?>"><br>

								<!-- Sexo: <input name="sexo" id="sexo" style="color:#469A05; width:14.3%; text-align:center;" readonly="readonly" value="<?php echo $sexo;?>">&nbsp;&nbsp;  -->Edad Actual: <input name="edad" id="edad" style="color:#469A05; width:13%; text-align:center;" readonly="readonly" value="<?php echo CalculaEdad(strtoDate($fechNac))." años";?>">&nbsp;&nbsp;Vigencia Inicio: <input name="vIni" id="vIni" style="color:#469A05; width:13%; text-align:center;" readonly="readonly" value="<?php echo $fechIniVig->format('d/m/Y');?>">&nbsp;&nbsp;Vigencia Final: <input name="vFin" id="vFin" style="color:#469A05; width:13%; text-align:center;" readonly="readonly" value="<?php echo $finVigencia->format('d/m/Y');?>"><br>

								Dirección: <input name="direcc" id="direcc" style="color:#469A05; width:66.2%; text-align:center;" readonly="readonly" value="<?php echo $aseg_direcc?>">&nbsp;&nbsp;Teléfono: <input name="telef" id="telef" style="color:#469A05; width:13%; text-align:center;" readonly="readonly" value="<?php echo $aseg_telef?>"><br><br><?php //echo $adicionada?>
								
								</form>

	<!--  inicio de eliminado, solo qeda generar formulario -->
								<?php //if ($diasTranscurridos>7){?>

								<?php //if (empty($hcl_numDocId) and $estadoCerti=="ACTIVO"){?>
								<!-- <form class="pure-form" action="generaHC" method="post">
									<input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
									<input type="hidden" name="numDoc" value="<?php echo trim($numDoc)?>">
									<input type="hidden" name="nombres" value="<?php echo trim($nom1)." ".trim($nom2)?>">
									<input type="hidden" name="apellidos" value="<?php echo trim($ape1)." ".trim($ape2)?>">
									<input type="hidden" name="fechNac" value="<?php echo strtoDate($fechNac)?>">
									<input type="hidden" name="sexo" value="<?php echo $sexo;?>">
									<input type="hidden" name="telefono" value="<?php echo trim($aseg_telef)?>">
									<input type="hidden" name="direccion" value="<?php echo trim($aseg_direcc)?>">
									El Asegurado no tiene Historia Clinica <button type="submit" class="pure-button pure-button-primary">Generar Historia Clínica</button>
																	
								</form> -->

							<?php //} elseif (empty($hcl_numDocId) and $estadoCerti=="INACTIVO") {?>
								<!-- <form class="pure-form" action="generaHC" method="post">		
									El Asegurado no tiene Historia Clinica <button type="submit" class="pure-button pure-button-primary" disabled>Generar Historia Clínica</button>
																	
								</form> -->

							<?php //} elseif (empty($hcl_numDocId) and $estadoCerti=="CANCELADO") {?>
								<!-- <form class="pure-form" action="generaHC" method="post">		
									El Asegurado no tiene Historia Clinica <button type="submit" class="pure-button pure-button-primary" disabled>Generar Historia Clínica</button>
																	
								</form> -->

							<?php //} elseif (!empty($hcl_numDocId) and $estadoCerti=="INACTIVO") {?>
								<!-- <form class="pure-form" action="generaHC" method="post">		
									Historia Clínica Nº: <button type="submit" class="pure-button pure-button-primary" disabled><?php echo "REDES".$hcl_numDocId?></button>
																	
								</form> -->

							<?php //}elseif (!empty($hcl_numDocId)) {?> 
								<!-- Historia Clínica Nº: <a class="boton fancybox" style="color:#ffffff;" title="<?php echo $hcl_nomHC?>" href="verHC/<?php echo $hcl_nomHC?>" data-fancybox-width="800" data-fancybox-height="550"><?php echo "REDES".$hcl_numDocId?></a><br> -->
								<!-- Historia Clínica Nº: <button type="submit" class="pure-button pure-button-primary" style="height:33px;"><?php echo "REDES".$hcl_numDocId?></a><br> -->
								<?php // } ?>
								<!-- <br> -->

								<?php //} else { ?>

								<!-- <form class="pure-form" action="generaHC" method="post">		
									Historia Clínica Nº: <button type="submit" class="pure-button pure-button-primary" disabled><?php echo "REDES".$hcl_numDocId?></button>
																	
								</form> -->

								<?php //}?>	
  <!--aqui termina lo eliminado -->
							</div>
							<br>

							<table>
								<tr valign="bottom">						

									<td>
										<?php if ($diasTranscurridos>7){?>
												<form class="pure-form" action="previoImpresion" style="float:left;" method="post" >
													<input type="hidden" name="aseg_id" value="<?php echo $aseg_id?>">
													<input type="hidden" name="prov_id" value="<?php echo $prov_id?>">
													<input type="hidden" name="cert_id" value="<?php echo $cert_id?>">
													<input type="hidden" name="nombreCompleto" value="<?php echo $nom1." ".$nom2." ".$ape1." ".$ape2?>">
													<input type="hidden" name="sexo" value="<?php echo $sexo?>">
													<input type="hidden" name="fechNac" value="<?php echo $fechNac?>">
													<input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
													<input type="hidden" name="numDoc" value="<?php echo $numDoc?>">
													<input type="hidden" name="sin_fecha" id="sin_fecha" value="<?php echo date("Y-m-d");?>">
													<!-- estos hidden son para guardar la HC, antes no habia.-->
													<input type="hidden" name="nombres" value="<?php echo trim($nom1)." ".trim($nom2)?>">
													<input type="hidden" name="apellidos" value="<?php echo trim($ape1)." ".trim($ape2)?>">
													
													<?php if (empty($hcl_numDocId) and $estadoCerti=="ACTIVO1"){?>
														<button type="submit" class="pure-button pure-button-primary">Imprimir Formulario de Orden de Atención</button>
													<?php } elseif (!empty($hcl_numDocId) and $estadoCerti=="ACTIVO1"){?>
														<button type="submit" class="pure-button pure-button-primary">Imprimir Formulario de Orden de Atención</button>
													<?php } elseif (empty($hcl_numDocId) and $estadoCerti=="INACTIVO"){?>
														<button type="submit" class="pure-button pure-button-primary" disabled>Imprimir Formulario de Orden de Atención</button>
													<?php } elseif (empty($hcl_numDocId) and $estadoCerti=="ACTIVO"){?>
														<button type="submit" class="pure-button pure-button-primary">Imprimir Formulario de Orden de Atención</button>
													<?php } elseif (!empty($hcl_numDocId) and $estadoCerti=="ACTIVO"){?>
														<input type="hidden" name="hcl_nomHC" value="<?php echo $hcl_nomHC?>">
														<button type="submit" class="pure-button pure-button-primary">Imprimir Formulario de Orden de Atención</button>
													<?php } elseif (!empty($hcl_numDocId) and $estadoCerti=="CANCELADO") { ?>
														<input type="hidden" name="hcl_nomHC" value="<?php echo $hcl_nomHC?>">
														<button type="submit" class="pure-button pure-button-primary" disabled>Imprimir Formulario de Orden de Atención</button>
													<?php } elseif (!empty($hcl_numDocId) and $estadoCerti=="INACTIVO") { ?>
														<input type="hidden" name="hcl_nomHC" value="<?php echo $hcl_nomHC?>">
														<button type="submit" class="pure-button pure-button-primary" disabled>Imprimir Formulario de Orden de Atención</button>
													<?php }?>


												<!-- esto se reemplazo por lo de arriba para eliminar el boton de HC 
													<?php if (empty($hcl_numDocId)){?>
														<button type="submit" class="pure-button pure-button-primary" disabled>Imprimir Formulario de Orden de Atención</button>														
													<?php } elseif (!empty($hcl_numDocId) and $estadoCerti=="ACTIVO"){?>
														<input type="hidden" name="hcl_nomHC" value="<?php echo $hcl_nomHC?>">
														<button type="submit" class="pure-button pure-button-primary">Imprimir Formulario de Orden de Atención</button>
													<?php } elseif (!empty($hcl_numDocId) and $estadoCerti=="CANCELADO") { ?>
														<input type="hidden" name="hcl_nomHC" value="<?php echo $hcl_nomHC?>">
														<button type="submit" class="pure-button pure-button-primary" disabled>Imprimir Formulario de Orden de Atención</button>
													<?php } elseif (!empty($hcl_numDocId) and $estadoCerti=="INACTIVO") { ?>
														<input type="hidden" name="hcl_nomHC" value="<?php echo $hcl_nomHC?>">
														<button type="submit" class="pure-button pure-button-primary" disabled>Imprimir Formulario de Orden de Atención</button>
													<?php }?>

												-->
												    <br><br>
												</form>															

										<?php } else { ?>
										<input type="hidden" name="hcl_nomHC" value="<?php echo $hcli_nom?>">
										<input type="hidden" name="aseg_id" value="<?php echo $aseg_id?>">
										<input type="hidden" name="cert_id" value="<?php echo $cert_id?>">
										<button type="submit" class="pure-button pure-button-primary" disabled>Imprimir Formulario de Orden de Atención</button>
										<?php }?>
									</td>

									<!-- <td>
										<?php if ($diasTranscurridos>7){?>	
											<form class="pure-form" action="formSiniestro" method="post">
												<input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
												<input type="hidden" name="numDoc" value="<?php echo $numDoc?>">
												<input type="hidden" name="nombrePac" value="<?php echo trim($nom1)." ".trim($nom2)." ".trim($ape1)." ".trim($ape2)?>">
												<input type="hidden" name="sin_fecha" id="sin_fecha" value="<?php echo date("Y-m-d");?>">&nbsp;&nbsp;
												
												<?php if (empty($hcl_numDocId)){?>
													<br><button type="submit" class="pure-button pure-button-primary" disabled>Generar Nueva Atención Médica</button>
													
												<?php } elseif (!empty($hcl_numDocId) and $estadoCerti=="ACTIVO"){?>
													<input type="hidden" name="hcl_nomHC" value="<?php echo $hcl_nomHC?>">
													<br><button type="submit" class="pure-button pure-button-primary">Generar Nueva Atención Médica</button>
												<?php } elseif (!empty($hcl_numDocId) and $estadoCerti=="CANCELADO") { ?>
													<input type="hidden" name="hcl_nomHC" value="<?php echo $hcl_nomHC?>">
													<br><button type="submit" class="pure-button pure-button-primary" disabled>Generar Nueva Atención Médica</button>
												<?php } elseif (!empty($hcl_numDocId) and $estadoCerti=="INACTIVO") { ?>
													<input type="hidden" name="hcl_nomHC" value="<?php echo $hcl_nomHC?>">
													<br><button type="submit" class="pure-button pure-button-primary" disabled>Generar Nueva Atención Médica</button>
												<?php }?>
											    <br><br>
											</form>

										<?php } else { ?>
										<input type="hidden" name="hcl_nomHC" value="<?php echo $hcl_nomHC?>">
										<br><button type="submit" class="pure-button pure-button-primary" disabled>Generar Nueva Atención Médica</button>
										<?php }?>
									</td> -->
								</tr>
							</table>	

							

								    <?php 
								    if(empty($siniestros)){ ?>
								    		<h3>No existen atenciones médicas para el asegurado</h3>
								    	<?php } 
								    		else { ?>
									    		
										    		<h4>Atenciones Médicas:</h4>
													<table class="tablestyle">				   
													    <thead>
													        <tr class="tablehead">
													            
													            <th>Num</th>
													            <th width="75px">ID Orden</th>
													            <th>Fecha</th>
													            <th>Lugar</th>
													            <th>Estado Atenci&oacute;n</th>
													            <th>Medicamentos</th>
													            <!-- <th>Tx</th>
													            <th>Lab</th> -->
													            
													        </tr>
													    </thead>
													
														<?php $nro_fila = 0; ?>
														<tbody>
															<?php $PREF="OA"; foreach ($siniestros as $u): 
															
															$nro_fila =$nro_fila+1;
															?>
													    <tr>

														 <!-- <td><input type="radio" name="editar" value="<?=$u->id_Doc?>"/></td> -->

														 <!-- Orden de atencion con link-->
														 <!-- <td><a class="botonOA fancybox" style="color:#ffffff;" title="<?php echo $u->sin_numOA?>" href="verOA/<?php echo $u->sin_numOA?>" data-fancybox-width="800" data-fancybox-height="550"><?php echo $PREF ?><?=$u->sin_numOA?></a></td> -->

														 <!-- Orden de atencion sin link-->
														 <td><?php echo $nro_fila?></td>
														 <td><a class="botonOA" style="color:#ffffff;" title="<?php echo $u->sin_numOA?>"  data-fancybox-width="800" data-fancybox-height="550"><?php echo $PREF ?><?=$u->sin_numOA?></a></td>
														 <td><?=$u->sin_fech?></td>
														 <td><?=$u->prov_nomCom?></td>
														 <?php 
														 $fechaHoy = date('Y-m-d'); 
														 if ((($u->prov_nomCom)==$nomEst_Prov) and (($u->sin_fech)==$fechaHoy)  ) {

														 		switch ($u->sin_est) {

														 					case '0':
															 					echo "<td>
															 							<form action='editOA' method='post'><input type='hidden' name='sin_numOA' value='".$u->sin_numOA."'> <input type='hidden' name='sin_id' value='".$u->sin_id."'> <input type='hidden' name='hcli_nom' value='".$hcli_nom."'> <input type='hidden' name='nomEst_Prov' value='".$nomEst_Prov."'> <input type='hidden' name='prov_id' value='".$prov_id."'> <input type='hidden' name='aseg_id' value='".$aseg_id."'> <input type='hidden' name='plan_id' value='".$plan_id."'> <input type='hidden' name='nombrePac' value='".trim($nom1).' '.trim($nom2).' '.trim($ape1).' '.trim($ape2)."'><button type='submit' class='pure-button-sin'>Abierta</button>  </form></td>";
															 					break;
															 				case '1':
															 					echo "<td>
															 							<form action='editOA' method='post'><input type='hidden' name='sin_numOA' value='".$u->sin_numOA."'>  <input type='hidden' name='sin_id' value='".$u->sin_id."'> <input type='hidden' name='hcli_nom' value='".$hcli_nom."'> <input type='hidden' name='nomEst_Prov' value='".$nomEst_Prov."'> <input type='hidden' name='prov_id' value='".$prov_id."'> <input type='hidden' name='aseg_id' value='".$aseg_id."'> <input type='hidden' name='plan_id' value='".$plan_id."'> <input type='hidden' name='nombrePac' value='".trim($nom1).' '.trim($nom2).' '.trim($ape1).' '.trim($ape2)."'><button type='submit' class='pure-button-sin'>Abierta</button>  </form></td>";
															 					break;
															 				case '2':
															 					echo "<td>
															 							<form action='editOA' method='post'><input type='hidden' name='sin_numOA' value='".$u->sin_numOA."'> <input type='hidden' name='sin_id' value='".$u->sin_id."'> <input type='hidden' name='hcli_nom' value='".$hcli_nom."'> <input type='hidden' name='nomEst_Prov' value='".$nomEst_Prov."'> <input type='hidden' name='prov_id' value='".$prov_id."'> <input type='hidden' name='aseg_id' value='".$aseg_id."'> <input type='hidden' name='plan_id' value='".$plan_id."'> <input type='hidden' name='nombrePac' value='".trim($nom1).' '.trim($nom2).' '.trim($ape1).' '.trim($ape2)."'> <button type='submit' class='pure-button-sin'>Abierta</button>  </form></td>";
															 					break;
															 				case '3':
															 					echo "<td style='color:#E21919;'>Atencion Concluida</td>";
															 					break;
															 				
															 				default:
															 					echo "<td>Atencion Concluida</td>";
															 					break;
															 			}
														 			
														 			
														 	} else{

															 			switch ($u->sin_est) {
															 				case '0':
															 					echo "<td style='color:#469A05;'>Atencion Inconclusa</td>";
															 					break;
															 				case '1':
															 					echo "<td style='color:#469A05;'>Atencion Inconclusa</td>";
															 					break;
															 				case '2':
															 					echo "<td style='color:#469A05;'>Atencion Inconclusa</td>";
															 					break;
															 				case '3':
															 					echo "<td style='color:#E21919;'>Atencion Concluida</td>";
															 					break;
															 				
															 				default:
															 					echo "<td style='color:#E21919;'>Atencion Concluida</td>";
															 					break;
															 			}
																	 	
																	 } 
														 

														  
														 //$fechaHoy = date('Y-m-d'); 
														 // esto se quito por que lo desactivaba al dia siguiente
														 //if ((($u->prov_nomCom)==$nomEst_Prov) and (($u->sin_fech)>=$fechaHoy)  ) {

														 if ((($u->prov_nomCom)==$nomEst_Prov)) {

														 	if (($u->sin_labFlag==1) and ($u->sin_est==3))
														 		{
														 		echo "<td>
																<form action='addOM' method='post'><input type='hidden' name='sin_numOA' value='".$u->sin_numOA."'>  <input type='hidden' name='nomEst_Prov' value='".$nomEst_Prov."'>  <input type='hidden' name='sin_id' value='".$u->sin_id."'> <input type='hidden' name='dni' value='".rtrim($numDoc)."'> <input type='hidden' name='nombrePac' value='".trim($nom1).' '.trim($nom2).' '.trim($ape1).' '.trim($ape2)."'> <button type='submit' style='color:#469A05;'>Reconsulta por Laboratorio</button>  </form>
																</td>";														 		
														 		}

														 	//para desactivar luego de guardar una reconsulta

															elseif(($u->sin_labFlag==1) and ($u->sin_est==4))
														 		{
														 		echo "<td style='color:#469A05;'><button type='button' disabled>Reconsulta por Laboratorio</button></td>";														 		
														 		}

														 	elseif($u->sin_labFlag==0){
														 		echo "<td style='color:#469A05;'><button type='button' disabled>Reconsulta por Laboratorio</button></td>";
																 	
															}


														}else {echo "<td><button type='button' disabled>Reconsulta por Laboratorio</button></td>";}?>


														  <!--<td><?=$u->sin_hclinica?></td>
														 <td><?=$u->sin_laboratorio?></td> -->
														 						 
													   </tr>

															<?php endforeach;} ?>
															
									    				</tbody>
													</table>
												

							
							<br>

							<!-- <form class="pure-form" action="formSiniestro" method="post">
								<input type="hidden" name="nomCm_Doc" value="<?php echo $nomCm_Doc?>">
								<input type="hidden" name="numDoc" value="<?php echo $numDoc?>">
								<input type="hidden" name="nombrePac" value="<?php echo $nom1." ".$nom2." ".$ape1." ".$ape2?>">
								<input type="hidden" name="sin_fecha" id="sin_fecha" value="<?php echo date("Y-m-d");?>">&nbsp;&nbsp;
								
								<?php if (empty($hcl_numDocId)){?>
									
								<?php } else {?>
									<input type="hidden" name="hcl_nomHC" value="<?php echo $hcl_nomHC?>">
								<?php }?>
							    
							        <button type="submit" class="pure-button pure-button-primary">Generar Nueva Atención Médica</button>
							    <br><br>
							</form> -->

							</div>

							<!-- <form class="pure-form" action="guardaSiniestro" method="post">
									<input type="hidden" name="numDoc" value="<?php echo $numDoc?>">
									<input type="hidden" name="nombrePac" value="<?php echo trim($nom1)." ".trim($nom2)." ".trim($ape1)." ".trim($ape2)?>">
									<h4>Diagnóstico:</h4>								
									<textarea rows="10" cols="10" name="sin_diagnostico" id="sin_diagnostico" style="width:90%;"></textarea>
									<br>								<br>
									Fecha:
									<input name="sin_fecha" id="sin_fecha" readonly="readonly" value="<?php echo date("Y-m-d");?>">&nbsp;&nbsp;
																	
									Lugar de Atención:
									<input name="nomCm_Doc"  id="nomCm_Doc" readonly="readonly" value="<?php echo $nomCm_Doc?>">&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="submit" class="pure-button pure-button-primary">Guardar</button>
									<button type="reset" class="pure-button pure-button-primary">Limpiar</button>
								
							</form>	 -->
							<br>					
						</div>
						<br>
						<div id="grupo">						
						<h4 style="color:#DC0606;">Si tuviera algun problema o consulta, puede comunicarse con Red-Salud. <br>Central Telefónica: (01) 445-3019. RPM: #959942999. Email: contacto@red-salud.com</h4>
						</div>
					  </div>
					  

					<script>
						$( "#tabs" ).tabs();
						$( "#tabs" ).tabs( "option", "disabled", [ 1, 2 ] );
					</script>
				
				</div>
			</div>
			</br>			
		
		<div id="footer"><p>Red Salud 2014  - All rights reserved.</p></div>
	</div>

</div>

</body><br>

</html><?php //$this->output->enable_profiler(TRUE); ?>