
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

<script type="text/javascript">
   function nobackbutton(){
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
	}
</script>

</head>
<body onload="nobackbutton();">
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
							<input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">

						    <fieldset>
						        <h3 style="color:#033766;">Búsqueda</h3>
						        <h4>Ingrese el DNI del asegurado para iniciar una búsqueda.</h4>
						        <input name="dni" id="dni" placeholder="DNI">
						        <button type="submit" class="pure-button pure-button-primary">Buscar</button>
						    </fieldset>
						</form>

						</div><br>
						<div id="grupo">
						<h4>La Orden de Medicamentos se cargó correctamente con la siguiente información:</h4>
						<h4>Número Orden Atención: <?php echo "OA".$sin_numOA?></h4>
						<h4>Nombre Paciente: <?php echo $nombrePac?></h4>
						<h4>DNI Paciente: <?php echo $numDoc?></h4>
						<h4>Lugar de Atención: <?php echo $nomEst_Prov?></h4>
						<h4>Especialidad: <?php echo $sin_especialidad?></h4>
						<br>

						<div id="grupo"> <br>							

							<form class="pure-form" action="imprimeTratamientoAdicional" style="float:left;" method="post" target="_blank">
								<input type="hidden" name="sin_numOA" value="<?php echo $sin_numOA?>">
								<input type="hidden" name="numDoc" value="<?php echo $numDoc?>">
								<input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
								<input type="hidden" name="nombrePac" value="<?php echo $nombrePac?>">
								<input type="hidden" name="sin_id" value="<?php echo $sin_id?>">
								<button type="submit" class="pure-button pure-button-primary">Imprimir Orden de Medicamentos</button> <br><br>
							</form>
							
							<form class="pure-form" action="buscaAsegurado" method="post">								
								<input type="hidden" name="dni" value="<?php echo $numDoc?>">
								<input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
								<input type="hidden" name="sin_numOA" value="<?php echo $sin_numOA?>">
								<button type="submit" class="pure-button pure-button-primary">Volver a Información del Asegurado</button><br><br>
							</form>

							

						</div>
						<br>
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