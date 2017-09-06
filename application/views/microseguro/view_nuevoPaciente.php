
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

				
                <form action="guardaPaciente" method="post">
            <fieldset>
                <legend>Nuevo Paciente</legend>
                <div>
                  <input type="hidden" name="id" value="">
                </div>
                <div>
                  <input type="hidden" name="est" value="1">
                </div>
                <div>Nombres:<br>
                  <input type="text" value="" placeholder="Nombres"/>
                  <input type="hidden" name="nombre" value=""/>
                </div>
                  <div>Apellidos:<br>
                  <input type="text" value=""/>
                  <input type="hidden" name="apellido" value="" placeholder="Apellidos"/>
                </div>
                <div>DNI:<br>
                   <input type="text" name="dni" placeholder="DNI"/>
                </div>
                <div>Dirección:<br>
                   <input type="text" name="cole" placeholder="Dirección"/>
                </div>
                <div>Fecha Nacimiento:<br>
                    <input type="date" name="fecha" step="1" min="1900-01-01" max="2014-04-31" value="2014-01-01">
                </div>
                    <div>Sexo:<br>
                <input type=text list=sexo style="width:120px" placeholder="Sexo"> 
                <datalist id="sexo"> 
                    <option> masculino 
                    <option> femenino 
                </datalist>  
                    </div>
                <div>Teléfono:<br>
                                    <input type="text" name="tel" placeholder="Telefono"/>
                                </div>
                                <div>Celular:<br>
                                    <input type="text" name="cel" placeholder="Celular"/>
                                </div>
                                <div>Email:<br>
                                    <input type="text" value="" placeholder="Email"/>
                                    <input type="hidden" name="email" value=""/>
                                </div>
                                <div>Compañia de Seguros:<br>
                                    <input type=text list=seguro style="width:220px" placeholder="Comp. Seguros">
                                    <datalist id="seguro"> 
                                        <option> Ninguna
                                        <option> Ace Seguros 
                                        <option> Cardif del Perú
                                        <option> Pacifico Peruano Suiza
                                        <option> Interseguro
                                        <option> Invita
                                        <option> La Positiva
                                        <option> La Protectora
                                        <option> Mapfre
                                        <option> Protecta 
                                        <option> Rimac Internacional
                                        <option> Secrex
                                    </datalist>
                                </div>
                                
                                <div>
                                    Todos los datos son necesarios para realizar correctamente el registro.                                    
                                </div><br>    
                                <input type="submit" name="submit" value="guardar"/>
                
                
               
            </fieldset>    
        </form>
				<hr />
				
			</div>
	</div>

	<div id="footer"><p>Red Salud 2014  - All rights reserved.</p></div>
</div>
</body>
</html>