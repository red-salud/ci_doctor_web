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
						        <h3 style="color:#033766;">Detalle Historia Clínica</h3>
								Numero HC <input name="numDoc" id="numDoc" style="color:#469A05; width:130px; text-align:center;" readonly="readonly" value="<?php echo "REDES".$hcl_numDocId?>"><br>						   
						    	Nombres <input name="numDoc" id="numDoc" style="color:#469A05; width:215px; text-align:left;" readonly="readonly" value="<?php echo $hcl_nomPac?>">&nbsp;&nbsp;
						    	Apellidos <input name="numDoc" id="numDoc" style="color:#469A05; width:215px; text-align:left;" readonly="readonly" value="<?php echo $hcl_apePac?>"><br>
						    	
						    	DNI <input name="numDoc" id="numDoc" style="color:#469A05; width:90px; text-align:center;" readonly="readonly" value="<?php echo $hcl_numDocId?>">&nbsp;&nbsp;
						    	Edad <input name="numDoc" id="numDoc" style="color:#469A05; width:50px; text-align:center;" readonly="readonly" value="<?php echo $hcl_edadAct?>">&nbsp;&nbsp;
						    	Sexo <input name="numDoc" id="numDoc" style="color:#469A05; width:130px; text-align:center;" readonly="readonly" value="<?php echo $hcl_sexo?>">&nbsp;&nbsp;
						    	Telefono <input name="numDoc" id="numDoc" style="color:#469A05; width:100px; text-align:center;" readonly="readonly" value="<?php echo $hcl_telef?>"><br>
						    	Direccion <input name="numDoc" id="numDoc" style="color:#469A05; width:500px; text-align:left;" readonly="readonly" value="<?php echo $hcl_direccion?>"><br><br>
						    	Antec. Personales <textarea name="sin_diagnostico" id="sin_diagnostico" style="color:#469A05; width:90%; text-align:left; height:3em; resize:none;" readonly="readonly"><?php echo $hcl_antePers?></textarea><br><br>
						    	Antec. Familiares <textarea name="sin_diagnostico" id="sin_diagnostico" style="color:#469A05; width:90%; text-align:left; height:3em; resize:none;" readonly="readonly"><?php echo $hcl_anteFam?></textarea><br><br>
						    	Alergias Farmaceuticos <textarea name="sin_diagnostico" id="sin_diagnostico" style="color:#469A05; width:90%; text-align:left; height:3em; resize:none;" readonly="readonly"><?php echo $hcl_alergiaFarm?></textarea><br><br>
						    	Alergias Alimentos <textarea name="sin_diagnostico" id="sin_diagnostico" style="color:#469A05; width:90%; text-align:left; height:3em; resize:none;" readonly="readonly"><?php echo $hcl_alergiaAlim?></textarea><br><br>
						    	Motivo 1ra Consulta <textarea name="sin_diagnostico" id="sin_diagnostico" style="color:#469A05; width:90%; text-align:left; height:3em; resize:none;" readonly="readonly"><?php echo $hcl_motPrimConsul?></textarea><br>
						    	
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