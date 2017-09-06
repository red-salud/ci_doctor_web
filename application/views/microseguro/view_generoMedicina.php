<!doctype html>
<html>
<head>
<title>CssCreator-->HTML5 Template</title>
<meta charset="utf-8" />
<meta generator="csscreator.com" />

<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Please link back to http://csscreator.com -->
<link rel="stylesheet" href="http://localhost/ci_doctorweb/public/css/main.css" type="text/css" />
<link rel="stylesheet" href="http://localhost/ci_doctorweb/public/css/form.css" type="text/css" />
<link rel="stylesheet" href="http://localhost/ci_doctorweb/public/css/ml-outlined-icon-buttons.css" type="text/css" />
</head>
<body>
<div id="pagewidth" >
	
	<div id="header"><img src="http://localhost/ci_doctorweb/public/images/logo.png"></div>

	<nav>
        <div id="menuhorizontal">
            <ul>
                <li><a href="consultas"> CONSULTAS</a></li>
                <li><a href="pacientes"> PACIENTES</a></li>                
                <li><a href="episodios"> EPISODIOS</a></li>
                <li><a href="tartamientos"> TRATAMIENTOS</a></li>
                <li><a href="ordenes"> ORDENES</a></li>
                
            </ul>
        </div>
    </nav>
	
	<div id="wrapper" class="clearfix">
			<div id="maincol">
				<br>
				<p>Gestión de Consultas</p> 
				<hr /><br>

                <div class="col">
                    <a class="ml-outlined-button color-1 medium" href="nuevoEpisodio">Nuevo</a>
                    
                </div> <br>				
                
            <fieldset>
            <?php echo form_open('resumenTratamiento'); ?>
                <legend>Paciente: Vasquez Rojas, Julio</legend>
                

                 <table class="tablestyle">
                    <caption> Lista de Diagnosticos</caption>
    
                    <thead>
                    <tr class="tablehead">
                        <th> </th>
                        <th>Codigo CIE</th>
                        <th>Nombre</th>
                        <th>Presentacion</th>
                        <th>Dosis</th>
                        <th>Periodo</th>            
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($medicamento as $u):?>

                    <tr>
                    <td><input name="cod_med[]" type="checkbox" id='cod_med' value=<?=$u->cod_med?> />
                        
                    </td>
                    <td><?=$u->cod_enf2?></td>
                    <td><?=$u->nom_med?></td>
                    <td><?=$u->presen_med?></td>
                    <td><?=$u->dosis_med?></td>
                    <td><?=$u->periodo_med?></td>
                   
                    <tr>
                    <?php endforeach;?>              
            
                    </tbody>
                </table>
            <?php echo form_submit('submit','Generar'); ?>
            <?php echo form_close(); ?>

            <?php echo form_open('imprimir'); ?>
            <?php echo form_submit('submit','Imprimir'); ?>
            <?php echo form_close(); ?>

            </fieldset>    
        
				<hr />
				
			</div>
	</div>

	<div id="footer"><p>Red Salud 2014  - All rights reserved.</p></div>
</div>
</body>
</html>