
<!doctype html>
<html>
<head>
<title>Red Salud Admin</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="public/jqueryAutocomplete/jquery.js"></script>
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
					    <li><a href="#fragment-1"><span>Genera Impresión</span></a></li>					    
					  </ul>
					  
					  <div id="fragment-1" style="width:auto;">					  
						<div id="grupo">
						<br><br>
						    <table style="width:100%; border-spacing:3px; text-align:center;" border="0" >
						    	<tr>
						    		<td style="width:50%;">
						    			<form class="pure-form" action="imprimeFormulario" method="post" target="_blank" >
													<input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto?>">
													<input type="hidden" name="sexo" value="<?php echo $sexo?>">
													<input type="hidden" name="fechNac" value="<?php echo $fechNac?>">
													<input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
													<input type="hidden" name="numDoc" value="<?php echo $numDoc?>">
													<input type="hidden" name="sin_fecha" id="sin_fecha" value="<?php echo date("Y-m-d");?>">
													<input type="hidden" name="hcl_nomHC" value="<?php echo $hcl_nomHC?>">

													<input type="hidden" name="aseg_id" value="<?php echo $aseg_id?>">
													<input type="hidden" name="prov_id" value="<?php echo $prov_id?>">
													<input type="hidden" name="cert_id" value="<?php echo $cert_id?>">
													
													<button type="submit" onclick="javascript:this.form.submit();this.disabled= true;" class="pure-button pure-button-primary">Imprimir Formulario de Orden de Atención</button>
													
												    <br><br>
										</form>
						    		</td> 
						    		<td>
						    			<form class="pure-form" action="buscaAsegurado" method="post">								
											<input type="hidden" name="dni" value="<?php echo $numDoc?>">
											<input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
											<input type="hidden" name="prov_id" value="<?php echo $prov_id?>">
											<input type="hidden" name="cert_id" value="<?php echo $cert_id?>">
											<button type="submit" class="pure-button pure-button-primary">Volver a Información de Asegurado</button><br><br>
										</form>
						    		</td>
						    	</tr>
						    </table>

						</div>			
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

</body>
</html>