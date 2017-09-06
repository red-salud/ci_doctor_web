
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


<link rel="stylesheet" type="text/css" href="public/jqueryAutocomplete/jquery.autocomplete.css" />
<script type="text/javascript" src="public/jqueryAutocomplete/jquery.js"></script>
<script type="text/javascript" src="public/jqueryAutocomplete/jquery.autocomplete.js"></script>
<script>
	jQuery.noConflict(); 
	var j = jQuery.noConflict();
 j(document).ready(function(){
  j("#sin_diagnostico").autocomplete("public/jqueryAutocomplete/autocomplete.php", {
        selectFirst: true
  });
  j("#sin_diagnosticoSec").autocomplete("public/jqueryAutocomplete/autocomplete.php", {
        selectFirst: true
  });
 });
</script>


<!--Script para agregar medicinas -->

<script type="text/javascript">
var rowNum = 0;
function addRow(frm) {
	if(rowNum <= 3) //maximo de inputs permitidos						
	{
		rowNum ++;
		var valor=$( "#add_qty option:selected" ).text();
		var row = '<p id="rowNum'+rowNum+'"><input type="hidden" name="valorGuarda'+rowNum+'" value="'+frm.add_name.value+'"> <input style= "padding: 8px 6px; height: 22px; width: 24%;" name="cantidad'+rowNum+'" value="'+valor+'"> <input style= "padding: 8px 6px; height: 22px; width: 50%;" name="nombre'+rowNum+'" value="'+frm.add_name.value+'"> <input type="button" class="boton" value="Remove" onclick="removeRow('+rowNum+');"></p>';
		jQuery('#itemRows').append(row);
		frm.add_qty.value = '';
		frm.add_name.value = '';
	}else{alert("Solo puede agregar 4 campos");}
}

function removeRow(rnum) {
	jQuery('#rowNum'+rnum).remove();
}
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

<script type="text/javascript">
   function nobackbutton(){
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
	}
</script> 



</head>
<body onload="nobackbutton();">
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
					    <li><a href="#fragment-1"><span>Historia Actual</span></a></li>					    
					  </ul>
					  
					  <div id="fragment-1" style="width:auto;">
					  <!-- <input type="button" value="Nuevo" onclick="window.location='http://www.google.com';" /> -->
						<div id="grupo">
						<form class="pure-form" action="guardaSiniestroP1" method="post" onsubmit="return confirm(¿Desea grabar esta información.? No podrá modificarla después.');">
						
							<input type="hidden" name="hcl_nomHC" id="hcl_nomHC" value="<?php echo $hcl_nomHC?>">

							<?php if (!empty($sin_numOA)){ ?>

								<input type="hidden" name="sin_numOA" id="sin_numOA" value="<?php echo $sin_numOA?>">
								<input type="hidden" name="aseg_id" value="<?php echo $aseg_id?>">
								<input type="hidden" name="sin_id" value="<?php echo $sin_id?>">								
								<input type="hidden" name="sin_est" value="<?php echo $sin_est?>">
								<input type="hidden" name="prov_id" value="<?php echo $prov_id?>">
								<input type="hidden" name="plan_id" value="<?php echo $plan_id?>">

							<?php }?>

						    <fieldset>
						        
						        <br>Nº Historia Clínica: <a class="boton fancybox" style="color:#ffffff;" title="<?php echo $hcl_nomHC?>" href="verHC/<?php echo $hcl_nomHC?>" data-fancybox-width="800" data-fancybox-height="550"><?php echo "REDES".$hcl_nomHC?></a><br><br><br>
						        Nombres y Apellidos: <input name="nombrePac" id="nombrePac" style="width:50%;" value="<?php echo $nombrePac?>" readonly>&nbsp;&nbsp;Nº DNI: <input name="numDoc" id="numDoc" value="<?php echo $numDoc?>" readonly><br>
						        Lugar de Atención: <input name="nomEst_Prov" id="nomEst_Prov" style="width:42%;" value="<?php echo $nomEst_Prov?>" readonly>&nbsp;&nbsp;Fecha de Atención: <input name="sin_fecha" id="sin_fecha" value="<?php echo $sin_fecha?>" readonly><br><br>
						        Especialidad: 
						        <select name="sin_especialidad" style="width:30%;">
								  <option value=" ">Elija una especialidad</option>
								  <option value="Medicina General">Medicina General</option>
								  <option value="Pediatria">Pediatría</option>
								  <option value="Ginecologia">Ginecología</option>								  
								</select><br><br>
								Motivo de Consulta: <input name="hactual_motcons" id="hactual_motcons" style="width:50%;"><br>						        
						    </fieldset>


						    <div id="grupo">
						    <fieldset>
						        <h3 style="color:#033766;">Examen Físico</h3>
						        PA: <input name="pa" id="pa" style="width:auto;" onkeypress="return tabE(this,event)">&nbsp;&nbsp;FC: <input name="fc" id="fc" onkeypress="return tabE(this,event)">&nbsp;&nbsp;FR: <input name="fr" id="fr" onkeypress="return tabE(this,event)"><br>
						        Peso: <input name="peso" id="peso" style="width:auto;" onkeypress="return tabE(this,event)"> Kg. &nbsp;&nbsp;Talla: <input name="talla" id="talla" onkeypress="return tabE(this,event)">&nbsp;&nbsp;<br>
						        Cabeza: <input name="cabeza" id="cabeza" style="width:90%;" onkeypress="return tabE(this,event)"><br>
						        Piel y Faneras: <input name="pielFaneras" id="pielFaneras" style="width:85%;" onkeypress="return tabE(this,event)"><br>
						        CV:RC: <input name="cvrc" id="cvrc" style="width:91%;" onkeypress="return tabE(this,event)"><br>
						        TP:MV: <input name="tpmv" id="tpmv" style="width:91%;" onkeypress="return tabE(this,event)"><br>
						        Abdomen: <input name="abdomen" id="abdomen" style="width:62%;" onkeypress="return tabE(this,event)">&nbsp;&nbsp;RHA: <input name="rha" id="rha" onkeypress="return tabE(this,event)"><br>
						        Neuro: <input name="neuro" id="neuro" style="width:91%;" onkeypress="return tabE(this,event)"><br>
						        Osteomuscular: <input name="osteomuscular" id="osteomuscular" style="width:84%;" onkeypress="return tabE(this,event)"><br>
						        GU:PPL <input name="guppl" id="guppl" style="width:auto;" onkeypress="return tabE(this,event)">&nbsp;&nbsp;GU:PRU <input name="gupru" id="gupru" onkeypress="return tabE(this,event)">
						    </fieldset>	
						    </div>
						    <br> <button type="submit" class="pure-button pure-button-primary btnSearch">Guardar y continuar</button><br><br>

						</form>

						<form class="pure-form" action="buscaAsegurado" method="post">								
								<input type="hidden" name="dni" value="<?php echo $numDoc?>">
								<input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">								
								<button type="submit" class="pure-button pure-button-primary">Volver a inicio</button><br><br>
							</form>

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

					
				
				</div>
			</div>
			</br>
			</br>

		<div id="footer"><p>Red Salud 2014  - All rights reserved.</p></div>
	</div>
</div>
</body>
</html>