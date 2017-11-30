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

      public function select($id){
        $sql = 'SELECT it.* FROM assigned_instruments ai, instruments it WHERE ai.musicians_id = ? AND ai.instruments_id = it.id';
        $res =  $this->db->query($sql, array($id));
        return $res->result();
      }

     

      public function insert($array, $id){
          foreach ($array as $instrument) {
            $aux = [
              'musicians_id' => $id,
              'instruments_id' => $instrument,
            ];
            $this->db->insert('assigned_instruments', $aux);
         }
      }


}