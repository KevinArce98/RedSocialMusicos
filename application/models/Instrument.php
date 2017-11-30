<?php 
class Instrument extends CI_Model {


        
        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }

       public function save($instrument)
       {
         $r = $this->db->insert('intrument', $instrument);
         return $r;
       }


      public function all(){
        $query = $this->db->get('instruments');
        return $query->result();
      }


      function insert($array){
	$result = $this->db->insert('assigned_instruments', $arrray);
                return $result;
        }


}