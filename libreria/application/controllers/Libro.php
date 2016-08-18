<?php 
	/**
	* 
	*/
	class Libro extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model('libro_model');
			$this->load->model('editorial_model');
			$this->load->model('autor_model');

			//$this->load->helper('url');
		}

		public function index()
		{
			$libros = $this->libro_model->getlibros();

			for ($i=0; $i < count($libros); $i++) { 
				
				$editorial = $this->editorial_model->getEditorial_id($libros[$i]->ideditorial);
				$autor = $this->autor_model->getAutor_id($libros[$i]->idautor);

				$libros[$i]->ideditorial = $editorial->nombre;

				$libros[$i]->idautor = $autor->nombre. " ".$autor->apellidopaterno;

			}
			$data['mensaje'] = "Bienvenido";
			$data['libros'] = $libros;
			$this->load->view('view_listar',$data);
		}

		public function anadirlibro()
		{
			# code...
			$this->load->view('view_añadir');
		}
	}

 ?>