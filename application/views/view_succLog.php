
<!doctype html>
<html>
<head>
<title>Red Salud Login</title>
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
				<h1>Gracias</br></h1>
				<p>Su registro ha sido completado. Porfavor ingrese con su email y password.</p> 
				<hr />
				<?php echo validation_errors(); ?>
				<?php echo form_open('nueva_sesion') ?></pre>
	            <fieldset>
	                <legend>INGRESO </legend>
	                <div>
	                    <input type="text" name="email" id="email" placeholder="Email"/>
	                </div>
	                <div>
	                    <input type="password" name="pass" placeholder="Password"/>
	                </div>
	                
	               <input type="submit" name="submit" value="INGRESAR"/>
	            </fieldset>    
        		<pre>
				<?php echo form_close() ?>
				<hr />
				
			</div>
	</div>

	<div id="footer"><p>Red Salud 2014  - All rights reserved.</p></div>
</div>
</body>
</html>