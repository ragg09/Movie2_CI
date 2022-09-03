<?php
class Dashboard extends CI_Controller{
  public function __construct(){
        parent::__construct();

}


function index(){

	//use this for your home page
	$data['title'] = "Welcome to Movies";
	$data['main'] = 'movie_home';
	$data['FilmTitle'] = $this->mMovies->getAllMovie();
	$this->load->vars($data);
	$this->load->view('dashboard');
}


function view($id){
	//use this for your home page
	$data['title'] = "MOVIES";
	$data['main'] = 'movie_home_detail';
	$data['FilmTitleID'] = $this->mMovies->getMovies($id);
	$data['GenreID'] = $this->mMovies->getMovies($id);
	$data['CertificateID'] = $this->mMovies->getMovies($id);
	$data['FilmTitle'] = $this->mMovies->getMovies($id);
	$data['FilmStory'] = $this->mMovies->getMovies($id);
	$data['FilmReleaseDate'] = $this->mMovies->getMovies($id);
	$data['FIlmDuration'] = $this->mMovies->getMovies($id);
	$data['FilmAdditionalInfo'] = $this->mMovies->getMovies($id);
	$data['image'] = $this->mMovies->getMovies($id);
	$data['video'] = $this->mMovies->getMovies($id);
	$data['price'] = $this->mMovies->getMovies($id);

	$this->load->vars($data);
	$this->load->view('dashboard');

}


}
?>