<?php 
class MusicalGenre extends CI_Model {


        
        public function __construct(){
                parent::__construct();
                // Your own constructor code
        }


        public function all(){
	        $query = $this->db->get('musicalgenre');
			return $query->result();

        }

        public function insert($array, $id){
			foreach ($array as $genre) {
				$aux = [
					'musicians_id' => $id,
					'musicalgenre_id' => $genre,
				];
				$this->db->insert('assigned_musicalgenre', $aux);
			}
        }


}