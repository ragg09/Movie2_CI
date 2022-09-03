<?php
class Dashboard extends CI_Controller{
  public function __construct(){
        parent::__construct();

}


function index(){
	//use this for your home page
	$data['title'] = "Welcome to Actors";
	$data['main'] = 'ratings_home';
	$data['ratee'] = $this->mRatings->getAllRatings();
	$this->load->vars($data);
	$this->load->view('dashboard');

}


}
?>