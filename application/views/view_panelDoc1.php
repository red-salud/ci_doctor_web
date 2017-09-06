
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
				<h4>BIENVENIDO <?php echo $nom_Doc?> </h4>
				<p>Aquí podras revisar las citas para el dia de hoy</p> 
				<hr />
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
        </tr>
        <tr>
            <th>
                13:02</th>
            <td>
                Gustavo Ramirez</td>
            <td>
                Las Acacias</td>
        </tr>
        <tr>
            <th>
                14:20</th>
            <td>
                Roxanna Drago</td>
            <td>
                Las Acacias</td>
        </tr>
        <tr>
            <th>
                17:30</th>
            <td>
                Miguel Castillo</td>
            <td>
                Tezza - Surco</td>
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