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
						        <h3 style="color:#033766;">Condiciones del Plan</h3>
								
							<?php if(empty($buscaPlan)){ ?>
								<h3>No existen informacion</h3>


							<?php } else { ?>
							
								<table class="tablestyle">

									<thead>
										<tr class="tablehead">
										 <th width="75px">Item</th>
										 <th>Descripcion</th>										 
										</tr>
									</thead>

									<tbody>
									 <?php foreach ($buscaPlan as $u): ?>
										<tr>
											<td><?=$u['varPlan_deta']?></td>
											<td><?=$u['planDeta_textWeb']?></td>
										</tr>											 
									 <?php endforeach; } ?>
									</tbody>
								</table>


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