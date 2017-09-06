
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
					    <li><a href="#fragment-1"><span>Nueva Historia Clinica</span></a></li>					    
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
					  
						
						
						<form class="pure-form" name= "guardaHC" action="guardaHC" method="post">
				            <fieldset>
				                <!-- <legend>NUEVA HISTORIA CLINICA </legend> -->
				                <div>
				                    <input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
				                </div>				                
				                
				                <div  id="grupo">
				                	<br>
				                	Nombres:
				                    <input name="hcl_nomPac" value="<?php echo $nombres?>" style="width:24%;" readonly/>&nbsp;&nbsp;
				                	Apellidos:
				                    <input name="hcl_apePac" value="<?php echo $apellidos?>" style="width:24%;" readonly/>&nbsp;&nbsp;
				                	Número DNI:
				                    <input name="hcl_numDocId" value="<?php echo $numDoc?>" style="width:18%;" readonly/><br>
				                    Fecha de Nacimiento:
				                    <input name="hcl_fechNac" value="<?php echo $fechNac?>" style="width:12%;" readonly/>&nbsp;&nbsp;
					                Edad Actual:
					                <input name="hcl_edadAct" value="<?php echo CalculaEdad(strtoDate($fechNac));?>" style="width:6%;" readonly/> años&nbsp;&nbsp;
					                Sexo:
				                	<input name="hcl_sexo" value="<?php echo $sexo?>" style="width:12%;" readonly/>&nbsp;&nbsp;
				                	Teléfono:
				                    <input name="hcl_telef" value="<?php echo $telefono?>" style="width:16%;" readonly/><br>
				                    Dirección:
				                    <input name="hcl_direccion" value="<?php echo $direccion?>" style="width:87.3%;" readonly/>
				                    <br><br>
				                </div>
				                <br>


				                <div id="grupo">
				                	<br>
				                    Antecedentes Personales:<br>
				                    <input name="hcl_antePers" style="width:95%;" required/><br><br>
				                    Antecedentes Familiares:<br>
				                    <input name="hcl_anteFam" style="width:95%;" required/><br><br>
				                    Alergia Farmacos:<br>
				                    <input name="hcl_alergiaFarm" style="width:95%;" required/><br><br>
				                    Alergia Alimentos:<br>
				                    <input name="hcl_alergiaAlim" style="width:95%;" required/><br><br>
				                    Motivo de Primera Consulta:<br>
				                    <input name="hcl_motPrimConsul" style="width:95%;" required/><br><br>
				                </div>
				                <br>
				                <!-- <div>Sexo: <br>
				                	<select name="hcl_sexo">
										<option value ="M">Masculino</option>
										<option value ="F">Femenino</option>
									</select>
				                </div> -->				                

				                				                
				                
				                <div>
				                    <div class="small">Todos los datos son necesarios para realizar correctamente el registro.</div>
				                    
				                </div>    
				                <input type="submit" name="submit" value="Guardar"/>
				            </fieldset>    
				        </form>

						<br><br>
						
						
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