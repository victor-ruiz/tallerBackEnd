<html>
<head>
<title>Problema</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<body>

<?php
//Mostramos los números de los días del 1 a la fecha actual;
$d=date("d");

$inicio=1;
while($inicio<=$dia)
{
  echo $inicio."<br>";
  $inicio++;
}
?>

</body>
</html>