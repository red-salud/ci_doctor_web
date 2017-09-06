
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
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

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
			<div id="maincol">
				<h1>Bienvenido Administrador </h1>
				<p>Gestione desde aquí la Red Médica</p> 
				<hr />
				<div id="tabs">
					  <ul>
					    <li><a href="#fragment-1"><span>Doctores</span></a></li>
					    <li><a href="#fragment-2"><span>Pacientes</span></a></li>
					    <li><a href="#fragment-3"><span>Consultas</span></a></li>
					  </ul>
					  <div id="fragment-1">
					  <!-- <input type="button" value="Nuevo" onclick="window.location='http://www.google.com';" /> -->
			<form name="tabla" action="accionEdita" method="POST">
				<table class="tablestyle">				   
				    <thead>
				        <tr class="tablehead">
				            <th> </th>
				            <th>
				                Tipo</th>
				            <th>
				                Nombre</th>
				            <th>
				                Apellido P.</th>
				            <th>
				                DNI</th>
				            <th>
				                RUC</th>
				            <th>
				                Especialidad</th>
				            <th>
				                Celular</th>
				            <th>
				                Email</th>
				        </tr>
				    </thead>
				    <tbody>
				    <?php foreach ($doctores as $u):?>
				       <tr>
						 <td><input type="radio" name="editar" value="<?=$u->id_Doc?>"/></td>
						 <td><?=$u->tipo_Doc?></td>
						 <td><?=$u->nom_Doc?></td>
						 <td><?=$u->apePat_Doc?></td>
						 <td><?=$u->dni_Doc?></td>
						 <td><?=$u->ruc_Doc?></td>
						 <td><?=$u->esp_Doc?></td>
						 <td><?=$u->cel_Doc?></td>
						 <td><?=$u->email_Doc?></td>						 
					   </tr>
						 
					<?php endforeach;?>
				    </tbody>
				</table> </br>
				<!-- <input type="submit" value="Editar" /> -->

			</form>
					  </div>
					  <div id="fragment-2">
					    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
					    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
					  </div>
					  <div id="fragment-3">
					    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
					    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
					    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
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