<?php
	$q=$_GET['q'];
	
	//$mysqli=mysqli_connect('localhost','root','','doctorweb') or die("Database Error");
	$mysqli=mysqli_connect('50.62.209.11:3306','redPeru_doctor','doc$%&54321','doctorweb') or die("Database Error");
	//$my_data=mysql_real_escape_string($q);
	$sql="SELECT idAnalisis, detaAnalisis FROM analisis WHERE detaAnalisis LIKE '%$q%' ORDER BY detaAnalisis";
	$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			echo $row['detaAnalisis']."\n";
		}
	}
?>