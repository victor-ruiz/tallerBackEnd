<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

	echo "<h2>Hola Mundo</h2>";
	//declara
	$dia = 24;
	$double = 77.5;
	$nombre = "25";
	$existe = true;

	$suma = $dia+$double+$nombre;
	echo "variable entera".$dia;
	echo "suma ". $suma;
	echo "nombre". $nombre;
	echo "variable BOLEANO ". $existe;

	echo "<br>";
	//$clave = array(5);
	//arrglor
	$clave["ana"] = "hola1213";
	$clave["juan"] = "565hola1213";
	$clave["valeria"] = "3646hola1213";
	$clave["omar"] = "6465hola1213";

	echo "<br>";

	echo "la clave de juan es: ". $clave["juan"];
	echo "<br>";

	foreach ($clave as $key => $value) {
		echo "nombre ". $key. "clave ". $value."<br>";
	}
	for ($i=0; $i < sizeof($clave); $i++) { 
		echo "clave".$clave[$i];
	}

	$day = date("d");
	$inicio = 1;
	while ( $inicio<= $day) {
		echo $inicio."<br>";
		$inicio++;
	}
 ?>

</body>
</html>
