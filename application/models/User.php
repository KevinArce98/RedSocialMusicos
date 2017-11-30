<?php 
class User extends CI_Model {

        private $rotations = 0 ;
        
        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }

		function encrypt_password($password, $username){

				$salt = hash('sha256', uniqid(mt_rand(), true) . "somesalt" . strtolower($username));

				$hash = $salt . $password;


				for ( $i = 0; $i < $this->rotations; $i ++ ) {
				  $hash = hash('sha256', $hash);
				}


				return $salt . $hash;
			}


			function is_valid_password($password,$dbpassword){
				$salt = substr($dbpassword, 0, 64);

				$hash = $salt . $password;

				for ( $i = 0; $i < $this->rotations; $i ++ ) {
						$hash = hash('sha256', $hash);
				}

				//Sleep a bit to prevent brute force
				time_nanosleep(0, 400000000);
				$hash = $salt . $hash;

				return $hash == $dbpassword;


			}


			function insert($array){
				$this->db->insert('musicians', $array);
				$this->db->trans_complete();
    			return $this->db->insert_id();
			}

			 public function all(){
		        $query = $this->db->get('musicians');
		        return $query->result();
	  
			
			}

			public function search($genres, $tools){
				
			$sql = "SELECT ms.name, ms.lastname, ms.address, ms.avatar, ms.email, ms.id
				 FROM musicians ms, assigned_instruments ai, assigned_musicalgenre am ";
			$aux = [];
			$aux2 = false;
			if ($genres != 0 || $tools != 0 ) {
				$sql = $sql."WHERE ";
			}
            if ($genres != 0) {
                $sql = $sql. "ms.id = am.musicians_id AND am.musicalgenre_id = ?";
                $aux = [$genres];
                $aux2 = true;
            }
           
            if ($tools != 0) {
            	 if ($aux2) {
            	$sql = $sql. " AND ";
            }
                $sql = $sql. "ms.id = ai.musicians_id AND ai.instruments_id = ? ";
                array_push($aux, $tools);
            }
	            $sql = $sql." GROUP by ms.id;";
				$res =  $this->db->query($sql, $aux);

				return $res->result();
			}
			public function find($id)
			{
				$this->db->where('id',$id);			
				return $this->db->get('musicians')->result();			
			}
		}