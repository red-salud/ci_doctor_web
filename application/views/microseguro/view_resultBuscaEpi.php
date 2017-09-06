
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
				<p>Gestión de Pacientes</p> 
				<hr /><br>

                <div class="col">
                    <a class="ml-outlined-button color-1 medium" href="nuevoEpisodio">Nuevo</a>
                    
                </div> <br>

				
                <form action="resultBuscaEpi" method="post">
            <fieldset>
                <legend>Busqueda de Episodios</legend>

                Ingrese apellido de paciente: <input type="text" name="nombre">  <input type="submit" name="submit" value="Buscar"/>

                <table class="tablestyle">
                    <caption>
                        Lista de Episodios</caption>
                    <tbody>
                        <tr class="tablehead">
                            <th>
                                Codigo
                            </th>
                            <th>
                                Nombres
                            </th>
                            <th>
                                Apellidos
                            </th>
                            <th>
                                Doctor
                            </th>
                            <th>
                                Fecha Episodio
                            </th>
                            <th>
                               Acciones
                            </th>
                        </tr> 
                                               
                        <tr>
                            <td>
                                EP000020
                            </td>
                            
                            <td>
                                Julio
                            </td>
                            <td>
                                Vasquez Rojas
                            </td>
                            <td>
                                Ruben Castro Ramirez
                            </td>
                            <td>
                                21/04/2014
                            <td>
                                <a href="http://www.google.com"> <img src="public/images/hcli.png" height="20" width="20" alt="Historia Clinica" title="Historia Clinica"></a>&nbsp;&nbsp; 
                                <a href="verEpisodioPac"> <img src="public/images/consultas.png" height="20" width="20" alt="Ver Episodio" title="Ver Episodio"></a></td>
                        </tr>
                        
                       
                    </tbody>
                </table>
               
            </fieldset>    
        </form>
				<hr />
				
			</div>
	</div>

	<div id="footer"><p>Red Salud 2014  - All rights reserved.</p></div>
</div>
</body>
</html>