
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

				
                <form action="generoConsulta" method="post">
            <fieldset>
                <legend>Paciente: Vasquez Rojas, Julio</legend>

                 Ingrese fecha de consulta: <input type="date" name="fecha" step="1" min="2014-01-01" max="2014-12-31" value="2014-01-01" style="height:34px">
                <br>Ingrese hora de consulta: <input type="text" name="horas" style="width:90px">

                <input type=text list=horas style="width:60px"> 
                <datalist id="horas"> 
                    <option> am 
                    <option> pm 
                </datalist>  
                 <br>Ingrese lugar de consulta: 
                 <input type=text list=lugar> 
                <datalist id="lugar"> 
                    <option> Las Acacias - San Borja 
                    <option> San Pablo - Surco 
                    <option> Ricardo Palma - San Isidro
                </datalist> 

                <br><input type="submit" name="submit" value="Generar Consulta"/>

                <hr />


                 <table class="tablestyle">
    <caption>
        Consultas Médicas</caption>
    <tbody>
        <tr class="tablehead">
            <th>
                Fecha</th>
            <th>
                Hora</th>
            <th>
                Consultorio</th>
            <th>
               Acciones</th>
        </tr>
        <tr>
            <th>
                15/10/2014</th>
            <td>
                13:00</td>
            <td>
                Las Acacias</td>
            <td>
                <a href="http://www.google.com"> <img src="public/images/cancel.png" height="20" width="20" alt="Cancelar Cita" title="Cancelar Cita"></a>&nbsp;&nbsp;
                <a href="http://www.google.com"> <img src="public/images/modi.png" height="20" width="20" alt="Modificar Cita" title="Modificar Cita"></a></td></td>
        </tr>
        <tr>
            <th>
                22/03/2014</th>
            <td>
                15:00</td>
            <td>
                Las Acacias</td>
            <td>
                <a href="http://www.google.com"> <img src="public/images/cancel.png" height="20" width="20" alt="Cancelar Cita" title="Cancelar Cita"></a>&nbsp;&nbsp;
                <a href="http://www.google.com"> <img src="public/images/modi.png" height="20" width="20" alt="Modificar Cita" title="Modificar Cita"></a></td>

        </tr>
        <tr>
            <th>
                29/02/2014</th>
            <td>
                15:00</td>
            <td>
                Las Acacias</td>
            <td>
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