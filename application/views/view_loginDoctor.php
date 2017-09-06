<!doctype html>
<html style="height:100%;">
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
<body id="login">
<div id="pagewidth">
	
	<div id="headerLogin"><img src="public/images/logo.png"></div>

	
	
	<div id="wrapper" class="clearfix" style="padding-top:6%;">
			<div id="maincol">
				 				
				<?php echo validation_errors(); 
				  echo form_open('prov_sesion'); ?>
	            <fieldset class="loginFieldset">	
	                 <div id="leftCol">
	                 	<div> <input type="text" name="email" id="email" placeholder="Email"/> </div>
	                    <div> <input type="password" name="pass" placeholder="Password"/> </div>
	                    <input type="submit" name="submit" value="INGRESAR"/>
	                 </div>

	                 <div id="rightCol">
	                 	<img src="public/images/logoRedes.png" style="padding-left:6%;" ><br><br>
	                 	<p style="text-align:right; font-size: 12px;">¿No recuerda su contraseña?. <a href="#">Recupérela aquí 1</a></p>
	                 	
	                 </div id="clearFix">
	                 
	                 
	               
	            </fieldset> 
	                 	<p style="text-align:left; font-size: 10px; color:#ffffff;">REDES pertenece a Health Care Administration Red Salud</p>

        		<pre>
				<?php echo form_close() ?>				
				
			</div>

	</div>

	<div id="footer"><p>Red Salud 2014  - All rights reserved.</p></div>
</div>
</body>
</html>