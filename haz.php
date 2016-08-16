<?php 
	
	/**
	* 
	*/
	class Imaginario
	{
		var $real, $imag;

		function __construct($r,$i)
		{
			$this->real = $r;
			$this->imag = $i;
		}
		function __toString()
		{
			return $this->real." + ". $this->imag."i";
		}

		static function Suma(Imaginario $a, Imaginario $b)
		{
			$resultado = new Imaginario($a->real+$b->real,$a->imag+$b->imag);

			return $resultado;
		}

		static function Resta(Imaginario $a, Imaginario $b)
		{
			$resultado = new Imaginario($a->real-$b->real,$a->imag-$b->imag);

			return $resultado;
		}
	}
	
	$imaginario1 = new Imaginario($_GET['real1'],$_GET["imag1"]);

	$imaginario2 = new Imaginario($_GET['real2'],$_GET["imag2"]);

	switch ($_GET["oper"]) {
		case "Suma":
			# code...
		$res = Imaginario::Suma($imaginario1,$imaginario2);
			break;
		case "Resta":
			# code...
		$res = Imaginario::Resta($imaginario1,$imaginario2);
			break;
		default:
			echo "Error<br>";
			break;
	}
	echo "El resultado  de la operacion es: ".$res;
 ?>