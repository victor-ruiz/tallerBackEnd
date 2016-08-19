
<?php
	/**
	*
	*/
	class Autor_model extends CI_Model
	{

		function __construct()
		{
			# code...
			parent::__construct();
		}

		public function getAutor_id($id)
		{
			# code...
			$this->db->where('idautor',$id);
			return $this->db->get('autor')->row();
		}
		
		public function getAutor_nombre($nombre)
		{
			#
			$this->db->where('nombre',$nombre);
			return $this->db->get('autor')->row();
		}

		public function getAutores()
		{
			/*
			$this->db->select('titulo, contenido, fecha');
			$consulta = $this->db->get('mitabla');
			Produce: SELECT titulo, contenido, fecha FROM mitabla
			*/
			//$query = $this->db->query("SELECT * FROM autor");
			$query = $this->db->get('autor');

			if ($query->num_rows()>0) {
				return $query->result();
			}
			return 0;
		}
	}
 ?>
