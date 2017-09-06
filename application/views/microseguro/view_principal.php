
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
				<p>Gestión de Consultas</p> 
				<hr /><br>

                <div class="col">
                    <a class="ml-outlined-button color-1 medium" href="nuevaConsulta">Nueva</a>
                    <a class="ml-outlined-button color-1 medium" href="buscaConsulta">Buscar</a>
                </div> <br>

				
                <form action="regisOK" method="post">
            <fieldset>
                <legend>Citas para hoy <?php echo date("d-m-Y")?> </legend>
               <table class="tablestyle">
    <caption>
        Citas Médicas</caption>
    <tbody>
        <tr class="tablehead">
            <th>
                Hora</th>
            <th>
                Paciente</th>
            <th>
                Consultorio</th>
            <th>
               Acciones</th>
        </tr>
        <tr>
            <th>
                13:02</th>
            <td>
                Gustavo Ramirez</td>
            <td>
                Las Acacias</td>
            <td>
                <a href="http://www.google.com"> <img src="public/images/hcli.png" height="20" width="20" alt="Historia Clinica" title="Historia Clinica"></a>&nbsp;&nbsp; 
                <a href="http://www.google.com"> <img src="public/images/cancel.png" height="20" width="20" alt="Cancelar Cita" title="Cancelar Cita"></a>&nbsp;&nbsp;
                <a href="http://www.google.com"> <img src="public/images/modi.png" height="20" width="20" alt="Modificar Cita" title="Modificar Cita"></a></td>
        </tr>
        <tr>
            <th>
                14:20</th>
            <td>
                Roxanna Drago</td>
            <td>
                Las Acacias</td>
            <td>
                <a href="http://www.google.com"> <img src="public/images/hcli.png" height="20" width="20" alt="Historia Clinica" title="Historia Clinica"></a>&nbsp;&nbsp; 
                <a href="http://www.google.com"> <img src="public/images/cancel.png" height="20" width="20" alt="Cancelar Cita" title="Cancelar Cita"></a>&nbsp;&nbsp;
                <a href="http://www.google.com"> <img src="public/images/modi.png" height="20" width="20" alt="Modificar Cita" title="Modificar Cita"></a></td>

        </tr>
        <tr>
            <th>
                17:30</th>
            <td>
                Miguel Castillo</td>
            <td>
                Tezza - Surco</td>
            <td>
                <a href="http://www.google.com"> <img src="public/images/hcli.png" height="20" width="20" alt="Historia Clinica" title="Historia Clinica"></a>&nbsp;&nbsp; 
                <a href="http://www.google.com"> <img src="public/images/cancel.png" height="20" width="20" alt="Cancelar Cita" title="Cancelar Cita"></a>&nbsp;&nbsp;
                <a href="http://www.google.com"> <img src="public/images/modi.png" height="20" width="20" alt="Modificar Cita" title="Modificar Cita"></a></td>
        </tr>
        <tr>
            <th colspan="3">
                 </th>
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