
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
                    <a class="ml-outlined-button color-1 medium" href="nuevoPaciente">Nuevo</a>
                    
                </div> <br>

				
                <form action="resultBuscaPac" method="post">
            <fieldset>
                <legend>Paciente Registrado</legend>

                <table class="tablestyle">
                   
                    <tbody>
                        <tr class="tablehead">
                            <th>
                                Nombres</th>
                            <th>
                                Apellidos</th>
                            <th>
                                DNI</th>
                            <th>
                                Email</th>
                            <th>
                               Acciones</th>
                        </tr>
                        <tr>
                            <th>
                                Julio</th>
                            <td>
                                Vasquez Rojas</td>
                            <td>
                                12345678</td>
                            <td>
                                jvasquez@red-salud.com</td>
                            <td>
                                <a href="http://www.google.com"> <img src="public/images/hcli.png" height="20" width="20" alt="Historia Clinica" title="Historia Clinica"></a>&nbsp;&nbsp; 
                                <a href="http://www.google.com"> <img src="public/images/consultas.png" height="20" width="20" alt="Ver Consultas" title="Ver Consultas"></a>&nbsp;&nbsp;
                                <a href="http://www.google.com"> <img src="public/images/nepisodio.png" height="20" width="20" alt="Nuevo Episodio" title="Nuevo Episodio"></a>&nbsp;&nbsp;
                                <a href="http://www.google.com"> <img src="public/images/modificar.png" height="20" width="20" alt="Modificar Paciente" title="Modificar Paciente"></a></td>
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