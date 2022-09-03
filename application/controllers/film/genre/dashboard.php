<?php
class Dashboard extends CI_Controller{
  public function __construct(){
        parent::__construct();

}


function index(){
	//use this for your home page
	$data['title'] = "Welcome to Genre";
	$data['main'] = 'genre_home';
	$data['Genre'] = $this->mGenre->getAllGenre();
	$this->load->vars($data);
	$this->load->view('dashboard');

}


}
?>