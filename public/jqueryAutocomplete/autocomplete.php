<?php
	$q=$_GET['q'];
	
	//$mysqli=mysqli_connect('localhost','root','','doctorweb') or die("Database Error");
	$mysqli=mysqli_connect('50.62.209.11:3306','redPeru_doctor','doc$%&54321','doctorweb') or die("Database Error");
	//$my_data=mysql_real_escape_string($q);
	//$sql="SELECT lds_nom_enfS, lds_cod_cieS FROM diagnostico WHERE lds_nom_enfS LIKE '%$q%' ORDER BY lds_nom_enfS";
	//$sql="SELECT nom_enf2, cod_enf2 FROM diagnosticosec WHERE nom_enf2 LIKE '%$q%' ORDER BY nom_enf2";
	
	$sql="SELECT lds_nom_enfS, lds_cod_cieS FROM lista_diagnosticos WHERE lds_nom_enfS LIKE '%$q%' ORDER BY lds_nom_enfS";
	
	$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			//echo "CIE ".$row['cod_enf2']." : ".$row['nom_enf2']."\n";
			echo "CIE ".$row['lds_cod_cieS']." : ".$row['lds_nom_enfS']."\n";
		}
	}
?>