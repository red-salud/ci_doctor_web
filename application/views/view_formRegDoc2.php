<!doctype html>
<html>
<head>
<title>Red Salud Registro</title>
<meta charset="utf-8" />

<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Please link back to http://csscreator.com -->

<link rel="stylesheet" href="public/css/main.css" type="text/css" />
<link rel="stylesheet" href="public/css/form.css" type="text/css" />

<link rel="stylesheet" href="public/jqueryui/css/redmond/jqueryui.css">
<script src="public/jqueryui/js/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script>
	$(function() {
		$( "#tabs" ).tabs();
		$( "#tabs" ).tabs( "option", "disabled", [ 1,2 ] );
	});
</script>
</head>
<body>
<div id="pagewidth">
	
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
	
	<div id="wrapper" class="clearfix">
			<div id="maincol">
				<h1>Bienvenido <?php echo $nom_Doc?> </h1>
				<p>Estimado usuario, para completar su registro y empezar a usar nuestro servicio necesitamos completar algunos datos:</p> 
				<hr />
				<div id="tabs">
					  <ul>
					    <li><a href="#tabs-1"><span>General</span></a></li>
					    <li><a href="#tabs-2"><span>Consultorios</span></a></li>
					    <li><a href="#tabs-3"><span>Horarios</span></a></li>
					  </ul>
					  <div id="tabs-1">
					   <form name= "update" action="updateDoctor" method="post">
				            <fieldset>
				                <legend>FORMULARIO DE REGISTRO </legend>
				                <div>
				                    <input type="hidden" name="id" value="<?php echo $id_Doc?>">
				                </div>
				                <div>
				                    <input type="hidden" name="est" value="<?php echo $est_Doc?>">
				                </div>
				                <div>Tipo de Afiliado:<br>
				                
				                	<select name="tipo">
										<option value ="<?php echo $tipo_Doc?>"><?php echo $tipo_Doc?></option>
									</select>
				                   
				                </div>
				                <div>Nombre:<br>
				                    <input type="text" name="nombre" value="<?php echo $nom_Doc?>"/>
				                    <!-- <input type="hidden" name="nombre" value="<?php echo $nom_Doc?>"/> -->
				                </div>
				                <div>Apellido Paterno:<br>
				                    <input type="text" name="apellidoPat" value="<?php echo $apePat_Doc?>"/>
				                    <!-- <input type="hidden" name="apellidoPat" value="<?php echo $apePat_Doc?>"/> -->
				                </div>
				                <div>Apellido Materno:<br>
				                    <input type="text" name="apellidoMat" value="<?php echo $apeMat_Doc?>"/>
				                    <!-- <input type="hidden" name="apellidoMat" value="<?php echo $apeMat_Doc?>"/> -->
				                </div>
				                <div>DNI:<br>
				                    <input type="text" name="dni" value="<?php echo $dni_Doc?>"/>
				                </div>
				                <div>RUC (En caso de centros Médicos y Laboratorios):<br>
				                    <input type="text" name="ruc" value="<?php echo $ruc_Doc?>"/>
				                </div>
				                <div>Dirección:<br>
				                    <input type="text" name="direc" value="<?php echo $direc_Doc?>"/>
				                </div>				                
				                <div>Ciudad:<br>
				                    <input type="text" name="ciu" value="<?php echo $ciu_Doc?>"/>
				                </div>
				                <div>Provincia:<br>
				                    <input type="text" name="prov" value="<?php echo $prov_Doc?>"/>
				                </div>
				                <div>Nº Colegiatura:<br>
				                    <input type="text" name="cole" value="<?php echo $ncol_Doc?>"/>
				                </div>
				                <div>Especialidad:<br>
				                    <input type="text" name="espe" value="<?php echo $esp_Doc?>"/>
				                </div>
				                <div>Nº RNE:<br>
				                    <input type="text" name="rne" value="<?php echo $rne_Doc?>"/>
				                </div>
				                <div>Teléfono:<br>
				                    <input type="text" name="tel" value="<?php echo $tel_Doc?>"/>
				                </div>
				                <div>Celular:<br>
				                    <input type="text" name="cel" value="<?php echo $cel_Doc?>"/>
				                </div>
				                <div>Email:<br>
				                    <input type="text" name="email" value="<?php echo $email_Doc?>"/>
				                    <!-- <input type="hidden" name="email" value="<?php echo $email_Doc?>"/> -->
				                </div>
				                <div>Password:<br>
				                    <input type="password" name="password" value="<?php echo $pass_Doc?>"/>
				                    <!-- <input type="hidden" name="password" value="<?php echo $pass_Doc?>"/> -->
				                </div>
				                
				                <div>
				                    <div class="small">Todos los datos son necesarios para realizar correctamente el registro.</div>
				                    
				                </div>    
				                <input type="submit" name="submit" value="actualizar"/>
				            </fieldset>    
				        </form>
					  </div>
					  <div id="tabs-2">
					    <form name= "consultorioNuevo" action="#" method="post">
				            <fieldset>
				                <legend>NUEVO CONSULTORIO</legend>
				                <div>
				                    <input type="hidden" name="idDoc" value="<?php echo $id_Doc?>">
				                </div>
				                <div>
				                    <input type="hidden" name="nomDoc" value="<?php echo $nom_Doc?>">
				                </div>
				                <div>
				                    <input type="hidden" name="apellidoPat" value="<?php echo $apePat_Doc?>">
				                </div>
				                <div>Nombre Consultorio: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dirección:<br>
				                    <input type="text" name="nomCon" placeholder="Nombre Consultorio"/>	
				                    <input type="text" name="dirCon" placeholder="Dirección"/>				                    
				                </div>
				                
				                <div>Departamento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Provincia:<br>
				                    <input type="text" name="depCon" placeholder="Departamento"/>
				                	
				                    <input type="text" name="proCon" placeholder="Provincia"/>				                	
				                </div>
				                <div>Distrito: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pais:<br>
				                    <input type="text" name="disCon" placeholder="Distrito"/>
				                    
				                    <input type="text" name="paisCon" placeholder="Pais"/>
				                </div>
				                <div>
				                	Teléfono: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Celular:<br>
				                    <input type="text" name="telCon" placeholder="Teléfono"/>

				                    <input type="text" name="celCon" placeholder="Celular"/>
				                </div>
				                	                
				                <div>
				                    <div class="small">Todos los datos son necesarios para realizar correctamente el registro.</div>
				                    
				                </div>    
				                <input type="submit" name="submit" value="guardar"/>
				            </fieldset>    
				        </form>
				        <br><br>

				        <fieldset>
				                <legend>LISTA DE CONSULTORIOS</legend>
				                
				                	                
				                <div>
				                    <div class="small">Todos los datos son necesarios para realizar correctamente el registro.</div>
				                    
				                </div>    
				                <input type="submit" name="submit" value="guardar"/>
				        </fieldset>

					  </div>
					  <div id="tabs-3">
					    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
					    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
					    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
					  </div>				
				</div>
			</div>
			</br>
			</br>

		<div id="footer"><p>Red Salud 2014  - All rights reserved.</p></div>
	</div>
</div>
</body>
</html>