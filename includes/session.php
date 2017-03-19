<?php
// A class to help work with Sessions
// In our case, primarily to manage logging users in and out
class Session {

	private $logged_in=false;
	public $user_id;
	public $message;

	function __construct() {
		session_start();
		$this->check_message();
		$this->check_login();
    if($this->logged_in) {
    } else {
    }
	}

  public function is_logged_in() {
    return $this->logged_in;
  }

	public function login($user) {
    // database should find user based on username/password
    if($user){
      $this->user_id = $_SESSION['user_id'] = $user->id;
      $this->logged_in = true;
    }
  }

  public function logout() {
    unset($_SESSION['user_id']);
    unset($this->user_id);
    $this->logged_in = false;
  }

	public function message($msg="") {
	  if(!empty($msg)) {
	    $_SESSION['message'] = $msg;
	  } else {
			return $this->message;
	  }
	}
//use session to check if user login
//if session already has user_id, means user already login
	private function check_login() {
    if(isset($_SESSION['user_id'])) {
      $this->user_id = $_SESSION['user_id'];
      $this->logged_in = true;
    } else {
      unset($this->user_id);
      $this->logged_in = false;
    }
  }

	private function check_message() {
		// check if there is  a message stored in the session
		if(isset($_SESSION['message'])) {
      $this->message = $_SESSION['message'];
      unset($_SESSION['message']);
    } else {
      $this->message = "";// clean after use
    }
	}
}
$session = new Session();//use constructor to start session
$message = $session->message();

?>
