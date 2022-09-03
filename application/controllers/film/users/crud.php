<?php
class crud extends CI_Controller{
  public function __construct(){
        parent::__construct();
		
		//session_start();
}

function create(){
	if ($this->input->post('username')){
		if($this->mAccounts->AddUser($_POST['username'], $_POST['password'])){
// $this->load->view('dashboard');
			redirect('/film/movies/dashboard/index','refresh');
	// $this->session->set_flashdata('message','Category created');
		// print_r($data);
		// $this->load->view('actors_home');
	}
}
	else{
	$data['title'] = "Create users";
	$data['main'] = 'regform_users';
	$data['user_name'] = $this->mAccounts->getAllUser();
	$this->load->vars($data);
	$this->load->view('dashboard');
	}
}

// function edit($id=0){
// if ($this->input->post('ActorFullName')){
// $this->mActors->updateActors();
// //var_dump($ActorNotes);
// // $this->session->set_flashdata('message','Category updated');
// redirect('film/actor/dashboard_admin','refresh');
// }else{
// $data['title'] = "Edit Actors";
// $data['main'] = 'actor_edit';
// $data['ActorFullName'] = $this->mActors->getActors($id);
// $data['ActorNotes'] = $this->mActors->getActors($id);
// $data['image'] = $this->mActors->getActors($id);
// $this->load->vars($data);
// $this->load->view('dashboard2');
// }
// }

// function delete($id){
// // $this->db->delete('Actors', $data = array('id' => $id));
// // $this->db->where('id', $id);
// // $this->db->delete('Actors');
// 	$this->mActors->deleterecords($id);
// redirect('film/actor/dashboard_admin','refresh');
// }

}
?> 	