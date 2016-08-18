
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
	}
 ?>