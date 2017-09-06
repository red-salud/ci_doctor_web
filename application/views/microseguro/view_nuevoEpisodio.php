
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

				
                <form action="resultNuevoBuscaEpi" method="post">
            <fieldset>
                <legend>Nuevo Episodio</legend>

                Ingrese apellido de paciente a generar episodio: <br><br>  <input type="text" name="nombre">  <input type="submit" name="submit" value="Buscar"/>
               
            </fieldset>    
        </form>
				<hr />
				
			</div>
	</div>

	<div id="footer"><p>Red Salud 2014  - All rights reserved.</p></div>
</div>
</body>
</html>