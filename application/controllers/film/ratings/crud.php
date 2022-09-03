<?php
class crud extends CI_Controller{
  public function __construct(){
        parent::__construct();
		
		//session_start();
}

function create(){
	if ($this->input->post('ratee')){
	$this->mRatings->addRatings();
	// $this->session->set_flashdata('message','Category created');
	redirect('film/movies/dashboard','refresh');
	}
	else{
	echo 'WRONG ENTRY';
	}
}

// function create(){
// 	if ($this->input->post('FilmTitle')){
// 		if($this->mMovies->addMovie($_POST['GenreID'], $_POST['CertificateID'],$_POST['FilmTitle'],$_POST['FilmStory'],$_POST['FilmReleaseDate'],$_POST['FilmDuration'],$_POST['FilmAdditionalInfo'])){
// // $this->load->view('dashboard');
// 			 $this->load->view('movie_home');
// 	// $this->session->set_flashdata('message','Category created');
// 		// print_r($data);
// 		// $this->load->view('actors_home');
// 	}
// }
// 	else{
// 	$data['title'] = "Create Movie";
// 	$data['main'] = 'movie_create';
// 	$data['FilmTitle'] = $this->mMovies->getTopMovies();
// 	$this->load->vars($data);
// 	$this->load->view('dashboard');
// 	}
// }


function edit($id=0){
if ($this->input->post('FilmTitle')){
$this->mMovies->updateMovies();
//var_dump($ActorNotes);
// $this->session->set_flashdata('message','Category updated');
redirect('film/movies/dashboard_admin','refresh');
}else{
$data['title'] = "Edit Movie";
$data['main'] = 'movie_edit';
$data['GenreID'] = $this->mMovies->getMovies($id);
$data['CertificateID'] = $this->mMovies->getMovies($id);
$data['FilmTitle'] = $this->mMovies->getMovies($id);
$data['FilmStory'] = $this->mMovies->getMovies($id);
$data['FilmReleaseDate'] = $this->mMovies->getMovies($id);
$data['FIlmDuration'] = $this->mMovies->getMovies($id);
$data['FilmAdditionalInfo'] = $this->mMovies->getMovies($id);
$data['image'] = $this->mMovies->getMovies($id);
$data['video'] = $this->mMovies->getMovies($id);
$this->load->vars($data);
$this->load->view('dashboard2');
}
}

function delete($id){
// $this->db->delete('Actors', $data = array('id' => $id));
// $this->db->where('id', $id);
// $this->db->delete('Actors');
$this->mMovies->deleterecords($id);
redirect('film/movies/dashboard_admin','refresh');
}

}
?> 	