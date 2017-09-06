
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

	
	<div id="wrapper" class="clearfix">
			<div id="maincol">
				<br>
				<p>Activar afiliado</p> 
				<hr /><br>

                <!-- <div class="col">
                    <a class="ml-outlined-button color-1 medium" href="nuevaConsulta">Nueva</a>
                    <a class="ml-outlined-button color-1 medium" href="buscaConsulta">Buscar</a>
                </div> <br> -->

				
                <form action="searchafi" method="post">
            <fieldset>
                <legend>Busqueda</legend>

                <!-- Por fecha de consulta: <input type="date" name="fecha" step="1" min="2014-01-01" max="2014-12-31" value="2014-01-01">  <input type="submit" name="submit" value="Buscar"/> -->
                <br><br>DNI Paciente: <input type="text" name="dni">  <input type="submit" name="submit" value="Buscar"/>
               
            </fieldset>    
        </form>
				<hr />
				
			</div>
	</div>

	<div id="footer"><p>Red Salud 2014  - All rights reserved.</p></div>
</div>
</body>
</html>