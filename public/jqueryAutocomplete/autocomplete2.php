<?php
	$q=$_GET['q'];
	
	//$mysqli=mysqli_connect('localhost','root','','doctorweb') or die("Database Error");
	$mysqli=mysqli_connect('50.62.209.11:3306','redPeru_doctor','doc$%&54321','doctorweb') or die("Database Error");
	//$my_data=mysql_real_escape_string($q);
	//$sql="SELECT cod_enf2 FROM diagnosticosec WHERE nom_enf2 == 'q'";
	$sql="SELECT lds_cod_cieS FROM lista_diagnosticos WHERE lds_nom_enfs == 'q'";
	$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			echo $row['lds_cod_cieS']."\n";
		}
	}
?>