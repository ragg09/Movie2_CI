<?php
class Dashboard extends CI_Controller{
  public function __construct(){
        parent::__construct();

}


function index(){
	//use this for your home page
	$data['title'] = "Welcome to Producer";
	$data['main'] = 'producer_home';
	$data['ProducerName'] = $this->mProducers->getAllProducer();
	$this->load->vars($data);
	$this->load->view('dashboard');

}


}
?>