<?php
class Login extends CI_Controller{
  public function __construct(){
        parent::__construct();
}


function verify(){
	session_start();

	// //username: admin, password: admin naka md5 automatic sa db
	$this->load->model('mAccounts');
	$check = $this->mAccounts->validate();
	if($check){
		if($this->input->post('username') === "admin"){
			$_SESSION['username'] = $this->input->post('username');
			redirect('film/movies/dashboard/index');
		}
		else{
			$_SESSION['username'] = $this->input->post('username');
			$_SESSION['desc'] = "rater";
			redirect('film/movies/dashboard/index');

		}
		
		
	}
	// elseif ($check && $this->input->post('username') === "rene") {
	// 	echo 'Correct Entry';
	// 	// $_SESSION['username'] = "try";
	// 	// $_SESSION['desc'] = "rater";
	// 	// redirect('film/movies/dashboard/index');
	// }
	else{
		echo 'worng entry';
	}
}

function logout() {
	session_start();
	session_destroy();
	redirect('film/movies/dashboard/index');
}














}
?>