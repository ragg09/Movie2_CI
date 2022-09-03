<?php
class mMovies extends CI_Model {
	public function __construct(){
        parent::__construct();
	}

function getAllMovie(){
$data = array();
$Q = $this->db->get('filmtitles');
if ($Q-> num_rows() > 0){
foreach ($Q->result_array() as $row){
$data[] = $row;
}
}
$Q->free_result();
return $data;
}


function getMovies($id){
	$data = array();
	$options = array('FilmTitleID' => $id);
	$Q = $this->db->get_where('filmtitles',$options,1);
	if ($Q->num_rows() > 0){
	$data = $Q->row_array();
	}
		$Q->free_result();
		return $data;
}

function addMovie(){
$data = array(
'GenreID' => $_POST['GenreID'],
'CertificateID' => $_POST['CertificateID'],
'FilmTitle' => $_POST['FilmTitle'],
'FilmStory' => $_POST['FilmStory'],
'FilmReleaseDate' => $_POST['FilmReleaseDate'],
'FIlmDuration' => $_POST['FIlmDuration'],
'FilmAdditionalInfo' => $_POST['FilmAdditionalInfo'],
'image' => $_POST['image'],
'video' => $_POST['video']
);
$this->db->insert('filmtitles', $data);
}

// function addMovie($GID, $CID, $ft, $fs, $frd, $fd, $fai){
// $data = array(
// 'GenreID' => $GID,
// 'CertificateID' => $CID,
// 'FilmTitle' => $ft,
// 'FilmStory' => $fs,
// 'FilmReleaseDate' => $frd,
// 'FilmDuration' => $fd,
// 'FilmAdditionalInfo' =>$this->db->escape($fai)
// );
// 	$config['upload_path'] = './images/';
// 	    $config['allowed_types'] = 'gif|jpg|png';
// 	    $config['max_size'] = '999999';
// 	    $config['remove_spaces'] = true;
// 	    $config['overwrite'] = false;
// 	    $config['max_width'] = '0';
// 	    $config['max_height'] = '0';
//         $this->load->library('upload', $config);
//         if(! $this->upload->do_upload('image')){
//             $this->upload->display_errors();
//             exit();
//         }
//         $image=$this->upload->data();
//         if ($image['file_name']){
//             $data['image'] = "/images/".$image['file_name'];
//         }
//         $this->db->insert('filmtitles',$data);
//         return true; 
// }


function getTopMovies(){
$data[0] = 'root';
$this->db->where('FilmTitleID',0);
$Q = $this->db->get('filmtitles');
if ($Q->num_rows() > 0){
foreach ($Q->result_array() as $row){
$data[$row['FilmTitleID']] = $row['FilmTitle'];
}
}
$Q->free_result();
return $data;
}

function updateMovies(){
$data = array(
'GenreID' => $_POST['GenreID'],
'CertificateID' => $_POST['CertificateID'],
'FilmTitle' => $_POST['FilmTitle'],
'FilmStory' => $_POST['FilmStory'],
'FilmReleaseDate' => $_POST['FilmReleaseDate'],
'FIlmDuration' => $_POST['FIlmDuration'],
'FilmAdditionalInfo' => $_POST['FilmAdditionalInfo'],
'image' =>$_POST['image'],
'video' =>$_POST['video']
);
// print($ActorID);
$this->db->where('FilmTitleID', $_POST['id']);
$this->db->update('filmtitles', $data);
}


function deleterecords($id){
$this->db->where('FilmTitleID', $id);
$this->db->delete('filmtitles');
}


function getRatingAve($id){
	$data=array();
	$where=array('FilmTitleID'=>$id);
	$this->db->select('AVG(rate)');
	$Q = $this->db->get_where('rating',$where,1);
	if ($Q->num_rows() > 0) {
		$data = $Q->row_array();
	}
	$Q->free_result();
	return $data;
}


}
?>
