<?php
class mGenre extends CI_Model {
	public function __construct(){
        parent::__construct();
	}

function getAllGenre(){
$data = array();
$Q = $this->db->get('filmgenres');
if ($Q-> num_rows() > 0){
foreach ($Q->result_array() as $row){
$data[] = $row;
}
}
$Q->free_result();
return $data;
}

function getGenre($id){
	$data = array();
	$options = array('GenreID' => $id);
	$Q = $this->db->get_where('filmgenres',$options,1);
	if ($Q->num_rows() > 0){
	$data = $Q->row_array();
	}
		$Q->free_result();
		return $data;
}

function addGenre(){
$data = array(
'Genre' => $_POST['Genre']
);
$this->db->insert('filmgenres', $data);
}


function getTopGenre(){
$data[0] = 'root';
$this->db->where('GenreID',0);
$Q = $this->db->get('filmgenres');
if ($Q->num_rows() > 0){
foreach ($Q->result_array() as $row){
$data[$row['GenreID']] = $row['Genre'];
}
}
$Q->free_result();
return $data;
}

function updateGenre(){
$data = array(
'Genre' => $_POST['Genre']
);
// print($ActorID);
$this->db->where('GenreID', $_POST['id']);
$this->db->update('filmgenres', $data);
}


function deleterecords($id){
$this->db->where('GenreID', $id);
$this->db->delete('filmgenres');
}


function getGenreDropDown(){
     $data = array();
     $this->db->select('GenreID,Genre');
     $this->db->where('GenreID !=',0);
     $Q = $this->db->get('filmgenres');
     if ($Q->num_rows() > 0){
       foreach ($Q->result_array() as $row){
         $data[$row['GenreID']] = $row['Genre'];
       }
    }
    $Q->free_result();  
    return $data; 
 }








}
?>
