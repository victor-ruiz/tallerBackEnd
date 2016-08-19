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
			$this->db->where('titulo', $valor);
				//$query = $this->db->where('libro',array('nombre'=>$nombre));
				//$this->db->where('nombre', $nombre);
		    return $this->db->get('libro')->row();

		}


	}












 ?>
