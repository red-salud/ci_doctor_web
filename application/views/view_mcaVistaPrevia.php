
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
					    <li><a href="#fragment-1"><span>Historia Clinica</span></a></li>					    
					  </ul>
					  
					  <div id="fragment-1" style="width:auto;">

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
									}

								?>
					  
						
						
						<form class="pure-form" name= "guardaHC" action="" method="post">
				            
				                <!-- <legend>NUEVA HISTORIA CLINICA </legend> -->
				                <div>
				                    <input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
				                </div>				                
				                
				                <button type="button" class="pure-button pure-button-primary">Datos Generales</button>
				                <div  id="grupo">
				                	<br>
				                	Nombres:
				                    <input name="hcl_nomPac" value="<?php echo $hcl_nomPac?>" style="width:24%;" />&nbsp;&nbsp;
				                	Apellidos:
				                    <input name="hcl_apePac" value="<?php echo $hcl_apePac?>" style="width:24%;"/>&nbsp;&nbsp;
				                	Número DNI:
				                    <input name="hcl_numDocId" value="<?php echo $hcl_numDocId?>" style="width:17%;"/><br>
				                    Fecha de Nacimiento:
				                    <input name="hcl_fechNac" value="<?php echo $hcl_fechNac?>" style="width:13%;"/>&nbsp;&nbsp;
					                Edad Actual:
					                <input name="hcl_edadAct" value="<?php echo CalculaEdad(strtoDate($hcl_fechNac));?>" style="width:8%;"/>&nbsp;&nbsp;
					                Sexo:
				                	<input name="hcl_sexo" value="<?php echo $hcl_sexo?>" style="width:14%;"/>&nbsp;&nbsp;
				                	Teléfono:
				                    <input name="hcl_telef" value="<?php echo $hcl_telef?>" style="width:14.5%;"/><br>
				                    Dirección:
				                    <input name="hcl_direccion" value="<?php echo $hcl_direccion?>" style="width:86.5%;"/>
				                    <br><br>
				                    Antecedentes Personales:<br>
				                    <input name="hcl_antePers" style="width:95.1%;" value="<?php echo $hcl_antePers?>"/><br><br>
				                    Antecedentes Familiares:<br>
				                    <input name="hcl_anteFam" style="width:95.1%;" value="<?php echo $hcl_anteFam?>"/><br><br>
				                    Alergia Farmacos:<br>
				                    <input name="hcl_alergiaFarm" style="width:95.1%;" value="<?php echo $hcl_alergiaFarm?>"/><br><br>
				                    Alergia Alimentos:<br>
				                    <input name="hcl_alergiaAlim" style="width:95.1%;" value="<?php echo $hcl_alergiaAlim?>"/><br><br>
				                    Motivo de Primera Consulta:<br>
				                    <input name="hcl_motPrimConsul" style="width:95.1%;" value="<?php echo $hcl_motPrimConsul?>"/><br><br>
				                </div>
				                <br>

				                <button type="button" class="pure-button pure-button-primary">Historia Actual</button>
				                <div id="grupo">
				                	<br>
				                    <h3 style="color:#033766;">Examen Físico</h3>
							        PA: <input name="pa" id="pa" style="width:auto;" value="<?php echo $sin_pa?>">&nbsp;&nbsp;FC: <input name="fc" id="fc" value="<?php echo $sin_fc?>">&nbsp;&nbsp;FR: <input name="fr" id="fr" value="<?php echo $sin_fr?>"><br>
							        Peso: <input name="peso" id="peso" style="width:auto;" value="<?php echo $sin_peso?>"> Kg. &nbsp;&nbsp;Talla: <input name="talla" id="talla" value="<?php echo $sin_talla?>">&nbsp;&nbsp;<br>
							        Cabeza: <input name="cabeza" id="cabeza" style="width:90%;" value="<?php echo $sin_cabeza?>"><br>
							        Piel y Faneras: <input name="pielFaneras" id="pielFaneras" style="width:85%;" value="<?php echo $sin_pielFaneras?>"><br>
							        CV:RC: <input name="cvrc" id="cvrc" style="width:91%;" value="<?php echo $sin_cvrc?>"><br>
							        TP:MV: <input name="tpmv" id="tpmv" style="width:91%;" value="<?php echo $sin_tpmv?>"><br>
							        Abdomen: <input name="abdomen" id="abdomen" style="width:62%;" value="<?php echo $sin_abdomen?>">&nbsp;&nbsp;RHA: <input name="rha" id="rha" value="<?php echo $sin_rha?>"><br>
							        Neuro: <input name="neuro" id="neuro" style="width:91%;" value="<?php echo $sin_neuro?>"><br>
							        Osteomuscular: <input name="osteomuscular" id="osteomuscular" style="width:84%;" value="<?php echo $sin_osteomuscular?>"><br>
							        GU:PPL <input name="guppl" id="guppl" style="width:auto;" value="<?php echo $sin_guppl?>">&nbsp;&nbsp;GU:PRU <input name="gupru" id="gupru" value="<?php echo $sin_gupru?>">
				                    
				                </div>
				                <br>
				        </form>
				        <form>

				                <button type="submit" class="pure-button pure-button-primary">Diagnóstico</button>
				                <div id="grupo">
				                	<h3 style="color:#033766;">Diagnóstico Principal</h3>
				                	<input name="sin_diagnostico" id="sin_diagnostico" style="width:95%; height:2.5em; resize:none;" value="<?php echo $sin_diagnostico?>"><br>

				                	
				                	<h3 style="color:#033766;">Diagnóstico Secundario</h3>
				                	
				                	<input name="sin_diagnosticoSec" id="sin_diagnosticoSec" style="width:95%; height:2.5em; resize:none;" value="<?php echo $sin_diagnosticoSec?>"><br>
				                	
				                 <br><br>   
				                </div>
				                <br><br>

				        </form>

				        <form class="pure-form" name= "" action="" method="post">

				                <button type="button" class="pure-button pure-button-primary">Tratamiento</button>
				                <div id="grupo" style="clear:both;"><br>
				                	<h3 style="color:#033766;">Tratamiento Principal</h3>
				                	<table width="100%">
				                		<thead>
				                			<tr>
				                				<th>Medicina</th>
				                				<th>Dosis</th>
				                			</tr>
				                		</thead>
				                		<tbody>
				                			 <?php  if (isset($sin_trat1))
					 						{ ?>
												<tr>
				                				<th width="30%">
				                					<input name="sin_trat1" id="sin_trat1" style="width:100%; height:2.5em; resize:none;" value="<?php echo $sin_trat1?>">
				                				</th>
				                				<th width="65%">
				                					<input name="sin_dosis1" id="sin_dosis1" style="width:100%; height:2.5em; resize:none;" value="<?php echo $sin_dosis1?>"><br>
				                				</th>
				                			</tr>

											 <?php }?>


				                			<?php  if (isset($sin_trat2))
					 						{ ?>
												<tr>
				                				<th width="30%">
				                					<input name="sin_trat2" id="sin_trat2" style="width:100%; height:2.5em; resize:none;" value="<?php echo $sin_trat2?>">
				                				</th>
				                				<th width="65%">
				                					<input name="sin_dosis2" id="sin_dosis2" style="width:100%; height:2.5em; resize:none;" value="<?php echo $sin_dosis2?>"><br>
				                				</th>
				                			</tr>

											 <?php }?>


											 <?php  if (isset($sin_trat3))
					 						{ ?>
												<tr>
				                				<th width="30%">
				                					<input name="sin_trat3" id="sin_trat3" style="width:100%; height:2.5em; resize:none;" value="<?php echo $sin_trat3?>">
				                				</th>
				                				<th width="65%">
				                					<input name="sin_dosis3" id="sin_dosis3" style="width:100%; height:2.5em; resize:none;" value="<?php echo $sin_dosis3?>"><br>
				                				</th>
				                			</tr>

											 <?php }?>


											  <?php  if (isset($sin_trat4))
					 						{ ?>
												<tr>
				                				<th width="30%">
				                					<input name="sin_trat4" id="sin_trat4" style="width:100%; height:2.5em; resize:none;" value="<?php echo $sin_trat4?>">
				                				</th>
				                				<th width="65%">
				                					<input name="sin_dosis4" id="sin_dosis4" style="width:100%; height:2.5em; resize:none;" value="<?php echo $sin_dosis4?>"><br>
				                				</th>
				                			</tr>

											 <?php }?>					 
				                	
				                	
				                		</tbody>
				                	</table>

				                	<h3 style="color:#033766;">Tratamiento Secundario</h3>
				                	<textarea name="sin_tratamientoSec" id="sin_tratamientoSec" style="width:95%; height:4em; resize:none;" value="<?php echo $sin_tratamientoSec?>"><?php echo $sin_tratamientoSec?></textarea>
				                	<br><br>

				                	
				                 	<button  type="submit" class="pure-button pure-button-primary">Imprimir indicaciones de medicamentos</button>  
				                 	
				            </div>    
						</form>
				                
				                
				                <br><br>
				        

				        <form class="pure-form" name= "" action="" method="post">

				                <button type="button" class="pure-button pure-button-primary">Laboratorio</button>
				                <div id="grupo" style="height:10em;"><br>
				                	<textarea name="sin_lab1" id="sin_lab1" style="width:94%; height:4em; resize:none;" value="<?php echo $sin_lab1?>"><?php echo $sin_lab1?></textarea>
				                 <br><br> 
				                 	<div style="float:left; clear:both;">
				                 	<button  type="submit" class="pure-button pure-button-primary">Imprimir indicaciones de laboratorio</button>  
				                 	</div>  
				                </div>
				               <br><br>
				        </form>

				        <div id="grupo"> <br>
							<form class="pure-form" action="" style="float:left;" method="post">
								<input type="hidden" name="sin_numOA" value="<?php echo $sin_numOA?>">
								<input type="hidden" name="numDoc" value="<?php echo $hcl_numDocId?>">
								<input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
								<button type="submit" class="pure-button pure-button-primary" >Imprimir</button> <br><br>
							</form>
							<form class="pure-form" action="buscaAsegurado" method="post">								
								<input type="hidden" name="dni" value="<?php echo $hcl_numDocId?>">
								<input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
								<button type="submit" class="pure-button pure-button-primary" >Volver a Información del Asegurado</button><br><br>
							</form>
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
				</br>
			<div id="footer"><p>Red Salud 2014  - All rights reserved.</p></div>
	</div>
</div>

</body>
</html>