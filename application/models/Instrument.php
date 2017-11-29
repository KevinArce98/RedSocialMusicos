<?php 
class Instrument extends CI_Model {


        
        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }

function save($instrument)
  {
    $r = $this->db->insert('intrument', $instrument);
    return $r;
  }


        function all(){
    
    $query = $this->db->get('instruments');

    return $query->result_object();

  }


}