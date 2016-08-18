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
	}

 ?>