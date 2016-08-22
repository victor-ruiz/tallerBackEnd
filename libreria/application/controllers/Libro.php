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
			$data['mensaje'] = "Bienvenido";
			$data['autores'] = $this->autor_model->getAutores();
			$data['editoriales'] = $this->editorial_model->getEditoriales();
			$this->load->view('view_añadir',$data);
		}

		public function insertarLibro()
		{
			# ya esta cargada la libreria form_validation
			if ($this->input->post('submit')) {
				# code...
				//reglas de validacion
				//trim -> borrar todos los espacios
				//required -> requerido
				// max_length[cantidad] ->
				 // min_length[cantidad]
				 //xss_clean ->
				 //integer ->
				//$this->form->set_rule('name','Identificator','reglas de validacion')
				$this->form_validation->set_rules('titulo','Titulo','trim|required|max_length[30]|min_length[5]');
				$this->form_validation->set_rules('isbn','isbn','required|integer');
				$this->form_validation->set_rules('precio','Precio','required|integer');

				$this->form_validation->set_message('required','El campo %s es obligatorio');
				$this->form_validation->set_message('integer','El campo %s debe de ser entero');
				$this->form_validation->set_message('min_length','El campo %s debe tener al menos %s caracteres');
				$this->form_validation->set_message('max_length','El campo %s debe tener a lo mas %s caracteres');

				if (!$this->form_validation->run()) {
					# si no pasamos las validaciones
					$this->anadirlibro();
					//echo "<script></script>";
				} else {
					#si pasamos las validaciones correctamente pasamos a insertar en la BD.
					$titulo = $this->input->post('titulo');
					$isbn = $this->input->post('isbn');
					$precio = $this->input->post('precio');
					$autor = $this->input->post('autor');//nombre y apellido
					$editorial = $this->input->post('editorial');

					$nombreA = explode(" ",$autor);
					//vamos a obtener un arreglo para ocupar el id
					$idautor = $this->autor_model->getAutor_nombre($nombreA[0]);
					$ideditorial = $this->editorial_model->getEditorial_nombre($editorial);

					$data = array(
						'titulo' =>$titulo,
					 	'isbn' => $isbn,
						'precio' => $precio,
						'ideditorial' => $ideditorial->ideditorial,
						'idautor' => $idautor->idautor
					);
						$insertar = $this->libro_model->insertar($data);
						if ($insertar) {
							echo "<script>alert('Exito');</script>";
								$this->anadirlibro();
						} else {
							echo "<script>alert('Ups algo salio mal');</script>";
								$this->anadirlibro();
						}
					}
			}
		}

		public function buscarlibro()
		{
			# cargar la vista
			$this->load->view('view_buscar');
		}

		public function buscar()
		{
			if ($this->input->post('submit')) {

				$this->form_validation->set_rules('titulo','Titulo','trim|required|max_length[30]|min_length[5]');
				//las reglas de validaciones
				$this->form_validation->set_message('required','El campo %s es obligatorio');
				$this->form_validation->set_message('min_length','El campo %s debe tener al menos %s caracteres');
				$this->form_validation->set_message('max_length','El campo %s debe tener a lo mas %s caracteres');

				if (!$this->form_validation->run()) {
					# si no pasamos las validaciones
					$this->buscarlibro();
				} else {
						$titulo = $this->input->post('titulo');
						$libro = $this->libro_model->getLibro($titulo);
						//var_dump($libro);
						if ($libro) {
							# code...
							for ($i=0; $i < count($libro); $i++) {
								$autor = $this->autor_model->getAutor_id($libro[$i]->idautor);
								$libro[$i]->idautor = $autor->nombre. " ".$autor->apellidopaterno;
							}
							$data['autores'] = $this->autor_model->getAutores();
							$data['editoriales'] = $this->editorial_model->getEditoriales();
							$data['libro'] = $libro;
							$this->load->view('view_actualizar',$data);
						}else{
							echo "<script>alert('No se encontro un registro un base de datos');</script>";
							$this->buscarlibro();
						}
				}

			}
		}

		public function actualizarLibro()
		{
			# code...
			if ($this->input->post('submit')) {
				//reglas de validacion
				//trim -> borrar todos los espacios
				//required -> requerido
				// max_length[cantidad] ->
				 // min_length[cantidad]
				 //xss_clean ->
				 //integer ->
				//$this->form->set_rule('name','Identificator','reglas de validacion')
				$this->form_validation->set_rules('titulo','Titulo','trim|required|max_length[30]|min_length[5]');
				$this->form_validation->set_rules('isbn','isbn','required|integer');
				$this->form_validation->set_rules('precio','Precio','required|integer');

				$this->form_validation->set_message('required','El campo %s es obligatorio');
				$this->form_validation->set_message('integer','El campo %s debe de ser entero');
				$this->form_validation->set_message('min_length','El campo %s debe tener al menos %s caracteres');
				$this->form_validation->set_message('max_length','El campo %s debe tener a lo mas %s caracteres');

				if (!$this->form_validation->run()) {
					# si no pasamos las validaciones
					$this->buscarlibro();
					//echo "<script></script>";
				} else {
					#si pasamos las validaciones correctamente pasamos a insertar en la BD.
					$idtitulo = $this->input->post('identificador');
					$titulo = $this->input->post('titulo');
					$isbn = $this->input->post('isbn');
					$precio = $this->input->post('precio');
					$autor = $this->input->post('autor');//nombre y apellido
					$editorial = $this->input->post('editorial');

					$nombreA = explode(" ",$autor);
					//vamos a obtener un arreglo para ocupar el id
					$idautor = $this->autor_model->getAutor_nombre($nombreA[0]);
					$ideditorial = $this->editorial_model->getEditorial_nombre($editorial);

					$data = array(
						'idtitulo' => $idtitulo,
						'titulo' =>$titulo,
					 	'isbn' => $isbn,
						'precio' => $precio,
						'ideditorial' => $ideditorial->ideditorial,
						'idautor' => $idautor->idautor
					);

						$actualizar = $this->libro_model->actualizar($data);
						if ($actualizar) {
							echo "<script>alert('Exito');</script>";
							$this->buscarlibro();
						} else {
							echo "<script>alert('Ups algo salio mal');</script>";
								$this->buscarlibro();
						}
					}
			}

		}



	}














 ?>
