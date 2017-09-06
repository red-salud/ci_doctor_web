
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

<?php require_once 'public/jqueryTratamiento/Connection.simple.php'; ?>
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


<script type="text/javascript"> 
  function tabE(obj,e){ 
   var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
   if(e.keyCode==13){ 
     var ele = document.forms[0].elements; 
     for(var i=0;i<ele.length;i++){ 
       var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
       if(obj==ele[i]){ele[q].focus();break} 
     } 
  return false; 
   } 
  } 
</script> 


<!-- script para el autocomplete de diagnostico -->

<link rel="stylesheet" type="text/css" href="public/jqueryAutocomplete/jquery.autocomplete.css" />
<script type="text/javascript" src="public/jqueryAutocomplete/jquery.js"></script>
<script type="text/javascript" src="public/jqueryAutocomplete/jquery.autocomplete.js"></script>

<script>
	jQuery.noConflict(); 
	var j = jQuery.noConflict();
 j(document).ready(function(){
  j("#add_qty").autocomplete("public/jqueryAutocomplete/autocomplete3.php", {
        selectFirst: true
  });
  j("#add_qty").autocomplete("public/jqueryAutocomplete/autocomplete3.php", {
        selectFirst: true
  });
 });
</script>


<script type="text/javascript">
var rowNum = 0;
function addRow(frm) {
	if(rowNum <= 13) //maximo de inputs permitidos						
	{
		rowNum ++;
		//var valor=$( "#add_qty option:selected" ).text();
		var valor = document.getElementById("add_qty").value;
		//var row = '<p id="rowNum'+rowNum+'"><input type="hidden" name="idMedi'+rowNum+'" value="'+frm.add_name.value+'"> <input style= "padding: 8px 6px; height: 22px; width: 24%;" name="sin_trat'+rowNum+'" value="'+valor+'" readonly> <input style= "padding: 8px 6px; height: 22px; width: 50%;" name="sin_dosis'+rowNum+'" value="'+frm.add_name.value+'" readonly> <input type="button" class="boton" value="Eliminar" onclick="removeRow('+rowNum+');"></p>';
		var row = '<p id="rowNum'+rowNum+'"><input text class="fila-base" style= "padding: 8px 6px; height: 28px; width: 70%;" name="analisis'+rowNum+'" value="'+valor+'" readonly>  <input type="button" class="boton" value="Eliminar" onclick="removeRow('+rowNum+');"></p>';
		jQuery('#itemRows').append(row);
		frm.add_qty.value = '';
		frm.add_name.value = '';
	}else{alert("Solo puede agregar 13 campos");}
}

function removeRow(rnum) {
	jQuery('#rowNum'+rnum).remove();
}
</script>

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
					    <li><a href="#fragment-1"><span>Laboratorio</span></a></li>					    
					  </ul>
					  
					  <div id="fragment-1" style="width:auto;">
					  <!-- <input type="button" value="Nuevo" onclick="window.location='http://www.google.com';" /> -->
					<div id="grupo">
						<form class="pure-form" action="guardaSiniestroP3" method="post" onsubmit="return confirm('¿Quiere guardar esta información?');">
							<input type="hidden" name="hcl_nomHC" id="hcl_nomHC" value="<?php echo $hcl_nomHC;?>">
							<input  type="hidden" name="sin_numOA" id="sin_numOA" value="<?php echo $sin_numOA;?>">
							<input type="hidden" name="sin_id" id="sin_id" value="<?php echo $sin_id;?>">
							<input  type="hidden" name="prov_id" id="prov_id" value="<?php echo $prov_id;?>">
							<input  type="hidden" name="aseg_id" id="aseg_id" value="<?php echo $aseg_id;?>">
							<input  type="hidden" name="plan_id" id="plan_id" value="<?php echo $plan_id;?>">
							<input  type="hidden" name="lab" id="lab" value="<?php echo $lab;?>">
							

						    <fieldset>
						        
						        <br>Nº Historia Clínica: <a class="boton fancybox" style="color:#ffffff;" title="<?php echo $hcl_nomHC?>" href="verHC/<?php echo $hcl_nomHC?>" data-fancybox-width="800" data-fancybox-height="550"><?php echo "REDES".$numDoc?></a><br><br><br>
						        Nombres y Apellidos: <input name="nombrePac" id="nombrePac" style="width:50%;" value="<?PHP echo $nombrePac;?>" readonly>&nbsp;&nbsp;Nº DNI: <input name="numDoc" id="numDoc" value="<?php echo $numDoc?>" readonly><br>
						        Lugar de Atención: <input name="nomEst_Prov" id="nomEst_Prov" style="width:42%;" value="<?php echo $nomEst_Prov?>" readonly>&nbsp;&nbsp;Fecha de Atención: <input name="sin_fecha" id="sin_fecha" value="<?php echo $sin_fecha?>" readonly><br><br>
						        Especialidad: 
						        <input name="sin_especialidad" id="sin_especialidad" value="<?php echo $sin_especialidad?>" readonly><br>
						    </fieldset>	
					
					
						    <div id="grupo">						    	
						    <fieldset>
						    	<table border="0" >
						    	<tr>
						    		<td style="width:60%" valign="top" > 
							        <h3 style="color:#033766; padding-left:10px;">Examenes, Laboratorios e Imágenes Cubiertos</h3>
							        <div id="messageAtention">
						        <p>Ingrese las primeras letras del exámen requerido y elija una de las opciones mostradas. A continuación presione el boton AGREGAR. Si en caso no se encontrara el exámen buscado, digítelo en el campo de Examenes, Laboratorios e Imágenes No Cubiertos.</p>
						    	</div>
							        
							        <div id='itemRows' style="padding:10px 10px">
										<table border="0">
											<?php if ($lab==0){ ?>

												<tr class='fila-base'>									
													<td>
													<input text name="add_qty" id="add_qty" style='width:25.5em;'/>				
													</td>
													
													<td><input onclick='addRow(this.form);' type='button' value='Agregar' class='boton'  style='margin-bottom:15px;'/></td>

												</tr>

											<?php }elseif($lab==1) { ?>

												<tr class='fila-base'>									
													<td>
													<h3 style="color:#E21919; padding-left:10px;">El Plan actual no cuenta con Exámenes de Laboratorio</h3>
													</td>
												</tr>

												<tr class='fila-base'>									
													<td>
													<input text name="add_qty2" id="add_qty" style='width:25.5em;' />				
													</td>
													
													<td><input onclick='addRow(this.form);' type='button' value='Agregar' class='boton'  style='margin-bottom:15px;' /></td>

												</tr>

											<?php } ?>

											
										</table>
									</div>
									</td>
								
									<td rowspan="5" colspan="2" border="1" valign="top"><h4>CONDICIONES DEL PLAN</h4>

									<table class="tablestyle" border="1">													

										<tbody>
											<?php foreach ($buscaPlan as $u): ?>
											<tr>
											<td style="width:45% padding:5px;"><?=$u['varPlan_deta']?> </td>
											<td style="width:55% "> :  <?=$u['planDeta_textWeb']?></td>
											</tr>											 
											<?php endforeach; ?>
										</tbody>
									</table>

								</td>
									
								</tr>
								
								<tr>
									<td style="width:28%" valign="top">										
										<h3 style="color:#033766; padding-left:10px;">Examenes, Laboratorios e Imágenes No Cubiertos</h3>
										<div style="padding:10px 10px">
										<?php if ($lab==0){ ?>
											<textarea name="sin_labNC" id="sin_labNC" style="width:94%; resize:none; height: 5em;"></textarea>				
										<?php }elseif($lab==1) { ?>
											<textarea name="sin_labNC" id="sin_labNC" style="width:94%; resize:none; height: 5em;" ></textarea>				
										<?php } ?>
										</div>
										<div id="messageAtention">
									        <p>Los Examenes, Laboratorios e Imágenes indicados como No Cubiertos, deberán ser cancelados por el paciente. </p>
									    </div>
										
									</td>

								</tr>

								</table>
						    </fieldset>	
							</div>
						    
						    <br>
						    <button type="submit" class="pure-button pure-button-primary">Guardar y Finalizar</button><br><br>
						</form>
						<form class="pure-form" action="buscaAsegurado" method="post">								
								<input type="hidden" name="dni" value="<?php echo $numDoc?>">
								<input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
								<button type="submit" class="pure-button pure-button-primary">Volver a inicio</button><br><br>
						</form>
						<br>
						</div><br>
						
												
											
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

					<!--<script src="public/jqueryTratamiento/js/jquery-1.10.2.js"></script> -->
				    <!-- Include all compiled plugins (below), or include individual files as needed -->
				    <script src="public/jqueryTratamiento/js/bootstrap.min.js"></script>				
					<?php //$this->output->enable_profiler(TRUE); ?>
				
				</div>
			</div>
			</br>
			</br>

		<div id="footer"><p>Red Salud 2014  - All rights reserved.</p></div>
	</div>
</div>
</body>
</html><?php //$this->output->enable_profiler(TRUE); ?>