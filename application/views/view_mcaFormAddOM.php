
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

<!-- script para el autocomplete de diagnostico -->

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
var countRow = 0;
function addRow(frm) {
	if(countRow <= 3) //maximo de inputs permitidos						
	{
		countRow ++;
		rowNum ++;
		var valor=$( "#add_qty option:selected" ).text();
		var row = '<p id="rowNum'+rowNum+'"><input type="hidden" name="idMedi'+rowNum+'" value="'+frm.add_name.value+'"> <input style= "padding: 8px 6px; height: 22px; width: 24%;" name="sin_trat'+rowNum+'" value="'+valor+'" readonly> <input style= "padding: 8px 6px; height: 22px; width: 10%;" name="sin_cant'+rowNum+'" value="'+frm.add_cant.value+'" readonly> <input style= "padding: 8px 6px; height: 22px; width: 48%;" name="sin_dosis'+rowNum+'" value="'+frm.add_name.value+'" readonly> <input type="button" class="boton" value="Eliminar" onclick="removeRow('+rowNum+');"></p>';
		jQuery('#itemRows').append(row);
		frm.add_qty.value = '';
		frm.add_name.value = '';
		frm.add_cant.value = '';
	}else{alert("Solo puede agregar 4 campos");}
}

function removeRow(rnum) {
	jQuery('#rowNum'+rnum).remove();
	countRow --;
}
</script>



<script type="text/javascript">
var rowNumNC = 0;
var countRowNC = 0;
function addRowNC(frm) {
	if(countRowNC <= 3) //maximo de inputs permitidos						
	{
		countRowNC ++;
		rowNumNC ++;
		var valor1 = document.getElementById("mediNC").value;
		var valor2 = document.getElementById("cantNC").value;
		var valor3 = document.getElementById("dosisNC").value;
		var row = '<p id="rowNumNC'+rowNumNC+'"><input style= "padding: 8px 6px; height: 22px; width: 24%;" name="mediNC'+rowNumNC+'" value="'+valor1+'" readonly> <input style= "padding: 8px 6px; height: 22px; width: 10%;" name="cantNC'+rowNumNC+'" value="'+frm.cantNC.value+'" readonly> <input style= "padding: 8px 6px; height: 22px; width: 48%;" name="dosisNC'+rowNumNC+'" value="'+frm.dosisNC.value+'" readonly> <input type="button" class="boton" value="Eliminar" onclick="removeRowNC('+rowNumNC+');"></p>';
		jQuery('#itemRows2').append(row);
		frm.mediNC.value = '';
		frm.cantNC.value = '';
		frm.dosisNC.value = '';
	}else{alert("Solo puede agregar 4 campos");}
}

function removeRowNC(rnum) {
	jQuery('#rowNumNC'+rnum).remove();
	countRowNC --;
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
// $(document).ready(function() {
    // $("form").keypress(function(e) {
        // if (e.which == 13) {
            // return false;
        // }
    // });
// });
// </script>

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
					    <li><a href="#fragment-1"><span>Diagnóstico</span></a></li>					    
					  </ul>
					  
					  <div id="fragment-1" style="width:auto;">
					  <!-- <input type="button" value="Nuevo" onclick="window.location='http://www.google.com';" /> -->
					<div id="grupo">
						<form id="form1" name="form1" class="pure-form" role="form" action="guardaOMAdd" method="post">
							<input type="hidden" name="hcl_nomHC" id="hcl_nomHC" value="<?php echo $hcl_nomHC;?>">
							<input  type="hidden" name="sin_numOA" id="sin_numOA" value="<?php echo $sin_numOA;?>">
							
						    <fieldset>
						        
						        <br>Nº Historia Clínica: <a class="boton fancybox" style="color:#ffffff;" title="<?php echo $hcl_nomHC?>" href="verHC/<?php echo $hcl_nomHC?>" data-fancybox-width="800" data-fancybox-height="550"><?php echo "HC".$numDoc?></a><br><br><br>
						        Nombres y Apellidos: <input name="nombrePac" id="nombrePac" style="width:50%;" value="<?php echo $nombrePac?>" readonly>&nbsp;&nbsp;Nº DNI: <input name="numDoc" id="numDoc" value="<?php echo $numDoc?>" readonly><br>
						        Lugar de Atención: <input name="nomEst_Prov" id="nomEst_Prov" style="width:42%;" value="<?php echo $nomEst_Prov?>" readonly>&nbsp;&nbsp;Fecha de Atención: <input name="sin_fecha" id="sin_fecha" value="<?php echo $sin_fecha?>" readonly><br><br>
						        Especialidad: 
						        <input name="sin_especialidad" id="sin_especialidad" value="<?php echo $sin_especialidad?>" readonly><br>
						        					        
						    </fieldset>						    

						</form>

						<fieldset>
						        <h3 style="color:#033766;">Diagnóstico Presuntivo</h3>
						    
						        <input style="padding: 8px 6px; height: 22px; width: 95%;" disabled= "true" value="<?php echo $sin_diagnostico;?>"/><br>						        

						</fieldset> <br>
					
					
					
						<form id="form2" name="form2" role="form" action="guardaOMAdd" method="post">						    
						    <fieldset>
						        <h3 style="color:#033766;">Diagnóstico Principal</h3>
						    <div id="messageAtention">
						        <p>Ingrese las primeras letras de su diagnóstico y ubique el código CIE en la lista desplegable. Si en caso no se encontrara el diagnóstico buscado, o quisiera elegir un diagnóstico adicional, digítelo en el recuadro de Diagnóstico Secundario.  </p>
						    </div>
						        <input name="sin_diagnostico" id="sin_diagnostico" style="padding: 8px 6px; height: 22px; width: 95%;"/><br>
						        <br><button type="submit" class="pure-button pure-button-primary btnSearch">Generar Tratamiento para Diagnóstico Principal</button>

						    </fieldset>				    

						    
						    <div id="grupo4">
						    	<input type="hidden" name="hcl_nomHC" id="hcl_nomHC" value="<?php echo $hcl_nomHC;?>">
								<input type="hidden" name="sin_numOA" id="sin_numOA" value="<?php echo $sin_numOA;?>">
								<input type="hidden" name="nombrePac" id="nombrePac" value="<?php echo $nombrePac?>">
								<input type="hidden" name="numDoc" id="numDoc" value="<?php echo $numDoc?>">
								<input type="hidden" name="nomEst_Prov" id="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
								<!-- <input type="hidden" name="sin_fecha" id="sin_fecha" value="<?php echo $sin_fecha?>"> -->
								<!-- <input  type="hidden" name="sin_id" id="sin_id" value="<?php echo $sin_id;?>">
								<input  type="hidden" name="prov_id" id="prov_id" value="<?php echo $prov_id;?>">
								<input  type="hidden" name="aseg_id" id="aseg_id" value="<?php echo $aseg_id;?>"> -->

								<input type="hidden" name="sin_especialidad" id="sin_especialidad" value="<?php echo $sin_especialidad?>">
						    
						    </div><br><br>

						    
							<br>

							
							<div id="grupo5">
							
							<fieldset>						        
						        <!-- <h3 style="color:#033766;">Diagnóstico Secundario</h3> -->
						        <input type='hidden' name="sin_diagnosticoSec" id="sin_diagnosticoSec" style="padding: 8px 6px; height: 22px; width: 95%;" /><br>
						        <input  type="hidden" name="sin_id" id="sin_id" value="<?php echo $sin_id;?>">
							<input  type="hidden" name="prov_id" id="prov_id" value="<?php echo $prov_id;?>">
							<input  type="hidden" name="aseg_id" id="aseg_id" value="<?php echo $aseg_id;?>">
							<!-- <input type="hidden" name="plan_id" value="<?php echo $plan_id?>"> -->
						        <h3 style="color:#033766;">Tratamiento Secundario</h3>
						        <div id="messageAtention">
						        <p>Todo tratamiento indicado como tratamiento secundario y que no se encuentre en la lista desplegable de medicamentos, deberán ser asumidas por el paciente.</p>
						    	</div>


						    	<div id='itemRows2'>
					             <table>
					             <thead>
					             <tr>
					             <th style='width:15.5em; text-align:center;'>MEDICINA</th>
					             <th style='width:15.5em; text-align:center;'>CANTIDAD</th>
					             <th style='width:35.5em; text-align:center;'>DOSIS</th>
					             </tr>
					             </thead>
						        <br>        
								
								
								<tr class='fila-base'>
								<td>
								<input type='text' name='mediNC' id='mediNC' style='width:15.5em;' ><br><br>
								</td>
								
								<td>
								<input type='text' name='cantNC' id='cantNC' style='width:10em;' ><br><br>
								</td>
								<td>
								<input type='text' name='dosisNC' id='dosisNC' style='width:25.5em;' ><br><br>
								</td>		
								<td> 
								<input onclick='addRowNC(this.form);' type='button' value='Agregar' class='boton'  style='margin-bottom:15px;'/>
								</td>
								</tr>
								</table>
								</div>
						    </fieldset>
							
							</div>

						<button class="pure-button pure-button-primary" value="Click Me!" onclick="submitForms()">Guardar y continuar</button><br><br>
						</form> <br>

						

						<form class="pure-form" action="buscaAsegurado" method="post">								
								<input type="hidden" name="dni" value="<?php echo $numDoc?>">
								<input type="hidden" name="nomEst_Prov" value="<?php echo $nomEst_Prov?>">
								<button type="submit" class="pure-button pure-button-primary">Volver a inicio</button><br><br>
						</form>

						
												
											
						</div>
						<br>
						<div id="grupo">						
						<h4 style="color:#DC0606;">Si tuviera algun problema o consulta, puede comunicarse con Red-Salud. <br>Central Telefónica: (01) 445-3019. RPM: #959942999. Email: contacto@red-salud.com</h4>
						</div>
					  </div>
					  

					<script>
						$( "#tabs" ).tabs();
						$( "#tabs" ).tabs( "option", "disabled", [ 1, 2] );
					</script>

					<!--<script src="public/jqueryTratamiento/js/jquery-1.10.2.js"></script> -->
				    <!-- Include all compiled plugins (below), or include individual files as needed -->
				    <script src="public/jqueryTratamiento/js/bootstrap.min.js"></script>

					<script type="text/javascript">
					
					submitForms = function(){
								var hcl_nomHC=$("#hcl_nomHC").val();
								var sin_diagnostico=$("#sin_diagnostico").val();
								var nomEst_Prov=$("#nomEst_Prov").val();
								var nombrePac=$("#nombrePac").val();
								var numDoc=$("#numDoc").val();
								var sin_fecha=$("#sin_fecha").val();
								var sin_numOA=$("#sin_numOA").val();
								var sin_especialidad=$("#sin_especialidad").val();
								var sin_id=$("#sin_id").val();
								var aseg_id=$("#aseg_id").val();
								var prov_id=$("#prov_id").val();								
								var sin_diagnosticoSec=$("#sin_diagnosticoSec").val();
				            	
				                $.ajax({				                	

				                    url: 'public/jqueryTratamiento/search.php', 
				                    type: 'GET',
				                    
				                    data: 	"hcl_nomHC="+hcl_nomHC+
				                    		"&sin_diagnostico="+sin_diagnostico+
				                    		"&nomEst_Prov="+nomEst_Prov+
				                    		"&nombrePac="+nombrePac+
				                    		"&numDoc="+numDoc+
				                    		"&sin_fecha="+sin_fecha+
				                    		"&sin_numOA="+sin_numOA+
				                    		"&sin_especialidad="+sin_especialidad+
				                    		"&sin_id="+sin_id+
				                    		"&aseg_id="+aseg_id+
				                    		"&prov_id="+prov_id+
				                    		"&sin_diagnosticoSec="+sin_diagnosticoSec,
				                    //data: {	name: $('input#hcl_nomHC').val()},
				                    success: function(response) {
				                       $('#grupo4').html(response);
				                    }
				                });

					    document.getElementById("form1").submit();
					    document.getElementById("form2").submit();
					    
					}

				    	jQuery(document).ready(function($) {
				    		$('.btnSearch').click(function(){
				    			makeAjaxRequest();
				    		});

				            $("#form2").submit(function(e){
				                e.preventDefault();
				                makeAjaxRequest();
				                return false;
				            
				            });

				      

				            function makeAjaxRequest() {
				            	var hcl_nomHC=$("#hcl_nomHC").val();
								var sin_diagnostico=$("#sin_diagnostico").val();
								var nomEst_Prov=$("#nomEst_Prov").val();
								var nombrePac=$("#nombrePac").val();
								var numDoc=$("#numDoc").val();
								var sin_fecha=$("#sin_fecha").val();
								var sin_numOA=$("#sin_numOA").val();
								var sin_especialidad=$("#sin_especialidad").val();
								var sin_id=$("#sin_id").val();
								var aseg_id=$("#aseg_id").val();
								var prov_id=$("#prov_id").val();
								var sin_diagnosticoSec=$("#sin_diagnosticoSec").val();
				            	
				                $.ajax({				                	

				                    url: 'public/jqueryTratamiento/search.php', 
				                    type: 'GET',
				                    
				                    data: 	"hcl_nomHC="+hcl_nomHC+
				                    		"&sin_diagnostico="+sin_diagnostico+
				                    		"&nomEst_Prov="+nomEst_Prov+
				                    		"&nombrePac="+nombrePac+
				                    		"&numDoc="+numDoc+
				                    		"&sin_fecha="+sin_fecha+
				                    		"&sin_numOA="+sin_numOA+
				                    		"&sin_especialidad="+sin_especialidad+
				                    		"&sin_id="+sin_id+
				                    		"&aseg_id="+aseg_id+
				                    		"&prov_id="+prov_id+
				                    		"&sin_diagnosticoSec="+sin_diagnosticoSec,
				                    //data: {	name: $('input#hcl_nomHC').val()},
				                    success: function(response) {
				                       $('#grupo4').html(response);
				                    }
				                });
				            }

				    	});
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
</html>