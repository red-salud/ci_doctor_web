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
				<p>Indíquenos porfavor que tipo de usuario es:</p> 
				<hr />
				<?php echo validation_errors(); ?>
				<?php echo form_open('update_type') ?></pre>
	            <fieldset>
	                <legend>Elija una opción </legend>
	                <div>
				        <input type="hidden" name="id" value="<?php echo $id_Doc?>">
				    </div>
				    
	                <div>
	                	<input type="radio" name="tipo" value="Médico"/> Médico &nbsp;&nbsp;&nbsp;
	                	<input type="radio" name="tipo" value="Centro Médico"/> Centro Médico &nbsp;&nbsp;&nbsp;
	                	<input type="radio" name="tipo" value="Laboratorio"/> Laboratorio &nbsp;&nbsp;&nbsp;
	                	<input type="radio" name="tipo" value="Farmacia"/> Farmacia	                    
	                </div><br>	                
	                
	               <input type="submit" name="submit" value="ENVIAR"/>
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