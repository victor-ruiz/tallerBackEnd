<?php
	/**
	*
	*/
	class Libro_model extends CI_Model
	{

		function __construct()
		{
			//
			parent::__construct();
		}
		/*
		select l.idlibro,l.titulo,l.isbn,l.precio,e.nombre,a.nombre
		from libro l, Editorial e, Autor a
		where l.ideditorial = e.ideditorial
		AND l.idautor = a.idautor;
		*/
		public function getLibros()
		{
			//$query = "SELECT * FROM libro";
			//$resultado = $this->db->query($query);
			//
			//$this->db->where('valor',$valor):
			$query2 = $this->db->get('libro');
			if ($query2->num_rows()>0) {
				# code...
				return $query2->result();
			} else {
				# code...
				return 0;
			}
		}

		public function insertar($libro)
		{
			#insert into value('')
			if ($this->db->insert('libro',$libro)) {
				return true;
			} else {
				return false;
			}
		}

		public function getLibro($valor)
		{
				//$this->db->where('titulo', $valor);
				//$query = $this->db->where('libro',array('nombre'=>$nombre));
				//$this->db->where('nombre', $nombre);
		    //return $this->db->get('libro')->row();
/*
				$query = $this->db->query("select libro.idlibro,libro.titulo,libro.isbn,libro.precio,editorial.nombre,autor.nombre
																		from libro, editorial, autor
																		where libro.ideditorial = editorial.ideditorial
																		AND libro.idautor = autor.idautor
																		AND libro.titulo = '".$valor."'");
				return $query->result();
				*/
			$this->db->select('libro.idlibro,libro.titulo,libro.isbn,libro.precio,autor.idautor,editorial.ideditorial,editorial.nombre');
    	$this->db->where('libro.titulo ',$valor);
    	$this->db->join('editorial','libro.ideditorial = editorial.ideditorial');
    	$this->db->join('autor','libro.idautor = autor.idautor');
    	$query = $this->db->get('libro');
			return $query->result();
		}

		public function actualizar($libro)
		{
			# code...
			$this->db->set($libro);
			$this->db->where('titulo',$libro['titulo'])->update('libro');
			if ($this->db->affected_rows()===1){
				return true;
			}else{
				return false;
			}
		}


	}














 ?>
