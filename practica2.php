<?php 
		
	/**
	* 
	*/
	class Personas 
	{
		public $nombres = array();
		public $apellidos = array();

		public function guardar($nombre,$apellido)
		{
			# los comentarios son asi 
			// o asi 
			$this->nombres[] = $nombre;
			$this->apellidos[] = $apellido;
		}
		/**
			nos mostrara los nombres 
		*/
		public function mostrar()
		{
			for ($i=0; $i<count($this->nombres); $i++) { 
				echo $this->nombres[$i]." ".$this->apellidos[$i]."<br>";
			}
		}
	}

	$persona = new Personas();
	$persona->guardar("victor","ruiz");
	$persona->guardar("omar","solis");
	$persona->guardar("humberto","espinoza");

	$persona->mostrar();

	function suma(float ...$enteros)
	{
		return array_sum($enteros);
	}

	var_dump(suma(2,'3.5',4,1.5));

	function sumaArrays(array ...$arrays):array
	{
		return array_map(function(array $array):int{
			return array_sum($array);
		}, $arrays);
	}

	print_r(sumaArrays([1,2,3], [4,5,6], [7,8,9]));
 ?>