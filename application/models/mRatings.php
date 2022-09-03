<?php
class mRatings extends CI_Model {
	public function __construct(){
        parent::__construct();
	}

function getAllRatings(){
$data = array();
$Q = $this->db->get('rating');
if ($Q-> num_rows() > 0){
foreach ($Q->result_array() as $row){
$data[] = $row;
}
}
$Q->free_result();
return $data;
}


function getRatings($id){
	$data = array();
	$options = array('FilmTitleID' => $id);
	$Q = $this->db->get_where('rating',$options,1);
	if ($Q->num_rows() > 0){
	$data = $Q->row_array();
	}
		$Q->free_result();
		return $data;
}

function addRatings(){
$data = array(
'ratee' => $_POST['ratee'],
'movie' => $_POST['movie'],
'rate' => $this->input->post('demo'),
);
$this->db->insert('rating', $data);
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


function getTopRatings(){
$data[0] = 'root';
$this->db->where('ratingID',0);
$Q = $this->db->get('rating');
if ($Q->num_rows() > 0){
foreach ($Q->result_array() as $row){
$data[$row['ratingID']] = $row['ratee'];
}
}
$Q->free_result();
return $data;
}

// function updateMovies(){
// $data = array(
// 'GenreID' => $_POST['GenreID'],
// 'CertificateID' => $_POST['CertificateID'],
// 'FilmTitle' => $_POST['FilmTitle'],
// 'FilmStory' => $_POST['FilmStory'],
// 'FilmReleaseDate' => $_POST['FilmReleaseDate'],
// 'FIlmDuration' => $_POST['FIlmDuration'],
// 'FilmAdditionalInfo' => $_POST['FilmAdditionalInfo'],
// 'image' =>$_POST['image'],
// 'video' =>$_POST['video']
// );
// // print($ActorID);
// $this->db->where('FilmTitleID', $_POST['id']);
// $this->db->update('filmtitles', $data);
// }


// function deleterecords($id){
// $this->db->where('FilmTitleID', $id);
// $this->db->delete('filmtitles');
// }





}
?>
