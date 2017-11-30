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
}