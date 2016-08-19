
<?php
	/**
	*
	*/
	class Editorial_model extends CI_Model
	{

		function __construct()
		{
			# code...
			parent::__construct();
		}

		public function getEditorial_id($id)
		{
			# code...
			$this->db->where('ideditorial',$id);
			return $this->db->get('editorial')->row();
		}
		public function getEditorial_nombre($nombre)
		{
			# code...
			$this->db->where('nombre',$nombre);
			return $this->db->get('editorial')->row();
		}

		public function getEditoriales()
		{
			$query = $this->db->get('editorial');

			if ($query->num_rows()>0) {
				return $query->result();
			}
			return 0;
		}


	}
 ?>
