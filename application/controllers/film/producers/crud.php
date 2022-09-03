<?php
class crud extends CI_Controller{
  public function __construct(){
        parent::__construct();
		
		//session_start();
}

function create(){
	if ($this->input->post('ProducerName')){
	$this->mProducers->addProducer();
	// $this->session->set_flashdata('message','Category created');
	redirect('film/producers/dashboard','refresh');
	}
	else{
	$data['title'] = "Create Producer";
	$data['main'] = 'producer_create';
	$data['ProducerName'] = $this->mProducers->getTopProducer();
	$this->load->vars($data);
	$this->load->view('dashboard');
	}
}

function edit($id=0){
if ($this->input->post('ProducerName')){
$this->mProducers->updateProducer();
//var_dump($ActorNotes);
// $this->session->set_flashdata('message','Category updated');
redirect('film/producers/dashboard/index','refresh');
}
else{
$data['title'] = "Edit Producer";
$data['main'] = 'producer_edit';
$data['ProducerName'] = $this->mProducers->getProducer($id);
// $data['ContactEmailAddress'] = $this->mProducers->getProducer($id);
// $data['Website'] = $this->mProducers->getPoducer($id);
$this->load->vars($data);
$this->load->view('dashboard', $data);
}
}

function delete($id){
// $this->db->delete('Actors', $data = array('id' => $id));
// $this->db->where('id', $id);
// $this->db->delete('Actors');
	$this->mProducers->deleterecords($id);
redirect('film/producers/dashboard','refresh');
}

}
?> 	