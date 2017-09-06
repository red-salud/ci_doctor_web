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
<link rel="stylesheet" href="public/css/main.css" type="text/css" />
<link rel="stylesheet" href="public/css/form.css" type="text/css" />
<link rel="stylesheet" href="public/css/ml-outlined-icon-buttons.css" type="text/css" />
</head>
<body>
<div id="pagewidth" >
	
	<div id="header"><img src="public/images/logo.png"></div>

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
				<p>Gestión de Episodios</p> 
				<hr /><br>

                <div class="col">
                    <a class="ml-outlined-button color-1 medium" href="nuevoEpisodio">Nuevo</a>
                    
                </div> <br>				
                
            <fieldset>
                <legend>Paciente: Vasquez Rojas, Julio</legend>
                <form action="generoEpisodio1" method="post">

                 Buscar diagnostico: <input type="text" name="nom_enf" style="width:120px">
                 <br><input type="submit" name="submit" value="Generar Consulta"/>

                 <hr >
                 <br>
                 </form>

                 
                 <table class="tablestyle" style="font-size:14px">
                  
                    <caption> Resultados para el diagnóstico:<?php echo " ".$nom_enf?></caption>
                  
    
                    <thead>
                    <tr class="tablehead">
                        <th>Codigo CIE</th>                        
                        <th>Variantes</th>
                        <th>Detalle</th> 
                        <!-- <th>Descripcion</th> -->           
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($tratamiento as $u):?>
                    <form action="generoTratamiento" method="post">
                    <tr>
                
                    <input type="hidden" name="cod_enf2" value=<?=$u->cod_enf2?>>
                    <!-- <input type="hidden" name="cod_enf2" value=<?//=$u->cod_enf2?>> -->
                    <td><?=$u->cod_enf2?></td>
                    <td><?=$u->nom_enf2?></td>
                    <td><?=$u->det_enf2?></td>
                    <!-- <td><textarea style="resize: vertical; width: 200px; height: 100px;"></textarea></td> -->
                    <td><input type="submit" name="submit" value="Elegir"/></td>
                
                     <!--<td><a href="generoTratamiento/<?=$u->cod_enf2?>"> <img src="public/images/consultas.png" height="20" width="20" alt="Ver Tratamientos" title="Ver Tratamientos"></a></td> 
                    <td><a href="generoTratamiento"> <img src="public/images/consultas.png" height="20" width="20" alt="Ver Tratamientos" title="Ver Tratamientos"></a></td>-->
                    <tr>
                    
                    </form>
                    <?php endforeach;?>              
            
                    </tbody>
                </table>               
            </fieldset>    
        
				<hr />
				
			</div>
	</div>

	<div id="footer"><p>Red Salud 2014  - All rights reserved.</p></div>
</div>
</body>
</html>