<?php
class crud extends CI_Controller{
  public function __construct(){
        parent::__construct();
		
		//session_start();
}

function create(){
	if ($this->input->post('Genre')){
	$this->mGenre->addGenre();
	// $this->session->set_flashdata('message','Category created');
	redirect('film/Genre/dashboard','refresh');
	}
	else{
	$data['title'] = "Create Genre";
	$data['main'] = 'genre_create';
	$data['Genre'] = $this->mGenre->getTopGenre();
	$this->load->vars($data);
	$this->load->view('dashboard');
	}
}

function edit($id=0){
if ($this->input->post('Genre')){
$this->mGenre->updateGenre();
//var_dump($ActorNotes);
// $this->session->set_flashdata('message','Category updated');
redirect('film/genre/dashboard','refresh');
}else{
$data['title'] = "Edit Genre";
$data['main'] = 'genre_edit';
$data['Genre'] = $this->mGenre->getGenre($id);
$this->load->vars($data);
$this->load->view('dashboard');
}
}

function delete($id){
// $this->db->delete('Actors', $data = array('id' => $id));
// $this->db->where('id', $id);
// $this->db->delete('Actors');
	$this->mGenre->deleterecords($id);
redirect('film/genre/dashboard','refresh');
}

}
?> 	