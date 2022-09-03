<?php
class mProducers extends CI_Model {
	public function __construct(){
        parent::__construct();
	}

function getAllProducer(){
$data = array();
$Q = $this->db->get('producers');
if ($Q-> num_rows() > 0){
foreach ($Q->result_array() as $row){
$data[] = $row;
}
}
$Q->free_result();
return $data;
}

function getProducer($id){
	$data = array();
	$options = array('ProducerID' => $id);
	$Q = $this->db->get_where('producers',$options,1);
	if ($Q->num_rows() > 0){
	$data = $Q->row_array();
	}
		$Q->free_result();
		return $data;
}

function addProducer(){
$data = array(
'ProducerName' => $_POST['ProducerName'],
'ContactEmailAddress' => $_POST['ContactEmailAddress'],
'Website' => $_POST['Website']
);
$this->db->insert('producers', $data);
}


function getTopProducer(){
$data[0] = 'root';
$this->db->where('ProducerID',0);
$Q = $this->db->get('producers');
if ($Q->num_rows() > 0){
foreach ($Q->result_array() as $row){
$data[$row['ProducerID']] = $row['ProducerName'];
}
}
$Q->free_result();
return $data;
}

function updateProducer(){
$data = array(
'ProducerName' => $_POST['ProducerName'],
'ContactEmailAddress' => $_POST['ContactEmailAddress'],
'Website' => $_POST['Website']
);
// print($ActorID);
$this->db->where('ProducerID', $_POST['id']);
$this->db->update('producers', $data);
}


function deleterecords($id){
$this->db->where('ProducerID', $id);
$this->db->delete('producers');
}


// function getGenreDropDown(){
//      $data = array();
//      $this->db->select('GenreID,Genre');
//      $this->db->where('GenreID !=',0);
//      $Q = $this->db->get('filmgenres');
//      if ($Q->num_rows() > 0){
//        foreach ($Q->result_array() as $row){
//          $data[$row['GenreID']] = $row['Genre'];
//        }
//     }
//     $Q->free_result();  
//     return $data; 
//  }

}
?>
