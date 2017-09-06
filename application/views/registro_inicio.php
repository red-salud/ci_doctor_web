
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
</head>
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
	
	<div id="wrapper" class="clearfix">
			<div id="maincol">
				<h1>Bienvenido</h1>
				<p>Estimado usuario para iniciar el proceso de registro necesitamos completar algunos datos:</p> 
				<hr />
				<form name= "alta" action="altaDoctor" method="post">
            <fieldset>
                <legend>FORMULARIO DE REGISTRO </legend>
                <div>
                    <input type="text" name="nombre" placeholder="Nombres"/>
                </div>
                <div>
                    <input type="text" name="apellido" placeholder="Apellidos"/>
                </div>
                <div>
                    <input type="text" name="email" placeholder="Email"/>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password"/>
                </div>
                
                <div>
                    <div class="small">Todos los datos son necesarios para realizar correctamente el registro.</div>
                    
                </div>    
                <input type="submit" name="submit" value="registro"/>
            </fieldset>    
        </form>
				<hr />
				
			</div>
	</div>

	<div id="footer"><p>Red Salud 2014  - All rights reserved.</p></div>
</div>
</body>
</html>