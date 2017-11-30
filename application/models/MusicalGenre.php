<?php 
class MusicalGenre extends CI_Model {


        
        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }


        public function all(){
	        $query = $this->db->get('musicalgenre');
			return $query->result();

        }

        function insert($array){
	$result = $this->db->insert('assigned_musicalgenre', $arrray);
                return $result;
        }


}