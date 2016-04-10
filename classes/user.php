<?php
include('password.php');
class User extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();
    
    	$this->_db = $db;
    }

	private function get_user_hash($username){	

		try {
			$stmt = $this->_db->prepare('SELECT password FROM members WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));
			
			$row = $stmt->fetch();
			return $row['password'];

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function get_user_id($username){
		
		try {
			$stmt = $this->_db->prepare('SELECT memberId FROM members WHERE username = :username');
			$stmt->execute(array('username' => $username));
			
			$row = $stmt->fetch();
			return $row['memberId'];

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function login($username,$password){

		$hashed = $this->get_user_hash($username);
		
		if($this->password_verify($password,$hashed) == 1){
		    
		    $_SESSION['loggedin'] = true;
		    return true;
		} 	
	}
		
	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}

	public function get_user($memberID){

    	try {
			$stmt = $this->_db->prepare('SELECT * FROM members WHERE memberID = :memberID');
			$stmt->execute(array('memberID' => $memberID));
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $row;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
    }

    public function get_user_profile($username){

    	try {
			$stmt = $this->_db->prepare('SELECT * FROM members WHERE username = :username');
			$stmt->execute(array('username' => $username));
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $row;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
    }

	public function get_request($reqID){

    	try {
			$stmt = $this->_db->prepare('SELECT * FROM request WHERE reqID = :reqID');
			$stmt->execute(array('reqID' => $reqID));
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $row;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
    }

}

?>