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

      public function dropbox()
      {
            $query = $this->db->get('instruments');      
          foreach ($query as $row) {
         
         echo '<option value" ">.'$row['name']'</option>';

      }
  } 

}