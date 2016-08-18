
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
	}
 ?>