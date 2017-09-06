<!doctype html>
<html>
<head>
<title>Red Salud Admin</title>
<meta charset="utf-8" />

<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Please link back to http://csscreator.com -->
<link rel="stylesheet" href="..//public/css/main.css" type="text/css" />
<link rel="stylesheet" href="..//public/css/form.css" type="text/css" />

<link rel="stylesheet" href="public/jqueryui/css/redmond/jqueryui.css">
<script src="..//public/jqueryui/js/jquery-1.10.2.js"></script>
<!--<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>-->
<script src="..//public/jqueryui/js/jquery-ui.js"></script>
<link rel="stylesheet" href="..//public/css/pure-min.css">

</head>
<body>

<div id="wrapper" style="width:auto;" class="clearfix">
			<div id="maincol">
				
				<div id="tabs" style="width:auto;">
					  
					  
					  <div id="fragment-1" style="width:auto; text-align:left;">
					  <!-- <input type="button" value="Nuevo" onclick="window.location='http://www.google.com';" /> -->
						<div id="grupo" style="background-color:white;">
						<form class="pure-form" action="buscaAsegurado" method="post">
							<fieldset style="font-family: Lucida Grande,Lucida Sans,Arial,sans-serif; font-size: 0.8em;">
						        <button type="submit" class="pure-button pure-button-primary">Historia Actual</button>
				                <div id="grupo">
				                	<br>
				                    <h3 style="color:#033766;">Examen Físico</h3>
							        PA: <input name="pa" id="pa" style="width:13%;" value="<?php echo $sin_pa;?>" readonly>&nbsp;&nbsp;FC: <input name="fc" id="fc" style="width:13%;" value="<?php echo $sin_fc?>" readonly>&nbsp;&nbsp;FR: <input name="fr" id="fr" style="width:13%;" value="<?php echo $sin_fr?>" readonly>
							        Peso: <input name="peso" id="peso" style="width:10%;" value="<?php echo $sin_peso?>" readonly> Kg. &nbsp;&nbsp;Talla: <input name="talla" id="talla" style="width:15%;" value="<?php echo $sin_talla?>" readonly>&nbsp;&nbsp;<br>
							        Cabeza: <input name="cabeza" id="cabeza" style="width:88%;" value="<?php echo $sin_cabeza?>" readonly><br>
							        Piel y Faneras: <input name="pielFaneras" id="pielFaneras" style="width:82%;" value="<?php echo $sin_pielFaneras?>" readonly><br>
							        CV:RC: <input name="cvrc" id="cvrc" style="width:89%;" value="<?php echo $sin_cvrc?>" readonly><br>
							        TP:MV: <input name="tpmv" id="tpmv" style="width:89%;" value="<?php echo $sin_tpmv?>" readonly><br>
							        Abdomen: <input name="abdomen" id="abdomen" style="width:62%;" value="<?php echo $sin_abdomen?>" readonly>&nbsp;&nbsp;RHA: <input name="rha" id="rha" style="width:16%;"value="<?php echo $sin_rha?>" readonly><br>
							        Neuro: <input name="neuro" id="neuro" style="width:89%;" value="<?php echo $sin_neuro?>" readonly><br>
							        Osteomuscular: <input name="osteomuscular" id="osteomuscular" style="width:80%;" value="<?php echo $sin_osteomuscular?>" readonly><br>
							        GU:PPL <input name="guppl" id="guppl" style="width:auto;" value="<?php echo $sin_guppl?>" readonly>&nbsp;&nbsp;GU:PRU <input name="gupru" id="gupru" value="<?php echo $sin_gupru?>" readonly>
				                    
				                </div>
				                <br>

				                <button type="submit" class="pure-button pure-button-primary">Diagnóstico</button>
				                <div id="grupo"><br>
				                	<p>Diagnóstico Principal</p>
				                	<textarea name="sin_diagnostico" id="sin_diagnostico" style="width:94%; height:1em; resize:none;" value="<?php echo $sin_diagnostico?>" readonly><?php echo $sin_diagnostico?></textarea><br>
				                	<p>Diagnóstico Secundario</p>
				                	<textarea name="sin_diagnosticoSec" id="sin_diagnosticoSec" style="width:94%; height:1em; resize:none;" value="<?php echo $sin_diagnosticoSec?>" readonly><?php echo $sin_diagnosticoSec?></textarea>
				                 <br><br>   
				                </div>
				                <br><br>

				                <button type="submit" class="pure-button pure-button-primary">Tratamiento</button>
				                
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
				                 	
				            </div>



				                <br><br>

				                <button type="submit" class="pure-button pure-button-primary">Laboratorio</button>
				                <div id="grupo"><br>
				                	<textarea name="sin_lab1" id="sin_lab1" style="width:94%; height:4em; resize:none;" value="<?php echo $sin_lab1?>"><?php echo $sin_lab1?></textarea>
				                 <br><br>   
				                </div><br>
						    	
						    </fieldset>
						</form>

						</div>
												
						<br>
						<div id="grupo">						
						<h5 style="color:#DC0606;">Si tuviera algun problema o consulta, puede comunicarse con Red-Salud. <br>Central Telefónica: (01) 445-3019. RPM: #959942999. Email: contacto@red-salud.com</h5>
						</div>
					  </div>
					  

					
				
				</div>
			</div>
			</br>
			</br>

		
	</div>
</body>
</html>