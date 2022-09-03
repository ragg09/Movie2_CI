<?php
class Dashboard extends CI_Controller{
  public function __construct(){
        parent::__construct();

}


function index(){
	//use this for your home page
	$data['title'] = "Welcome to Users";
	$data['main'] = 'regform_users';
	$data['user_name'] = $this->mAccounts->getAllUser();
	$this->load->vars($data);
	$this->load->view('dashboard');

}


}
?>