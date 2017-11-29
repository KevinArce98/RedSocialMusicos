<?php 
class MusicalGenre extends CI_Model {


        
        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }


        public function All(){

         $query = $this->db->get('assigned_musicalgenre');

return $query->result_object();

        }


}