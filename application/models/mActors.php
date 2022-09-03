<?php
class mActors extends CI_Model {
	public function __construct(){
        parent::__construct();
	}

function getAllActors(){
$data = array();
$Q = $this->db->get('Actors');
if ($Q-> num_rows() > 0){
foreach ($Q->result_array() as $row){
$data[] = $row;
}
}
$Q->free_result();
return $data;
}

function getActors($id){
	$data = array();
	$options = array('ActorID' => $id);
	$Q = $this->db->get_where('Actors',$options,1);
	if ($Q->num_rows() > 0){
	$data = $Q->row_array();
	}
		$Q->free_result();
		return $data;
}

// function addActor(){
// $data = array(
// 'ActorFullName' => $_POST['ActorFullName'],
// 'ActorNotes' => $_POST['ActorNotes']
// );
// $this->db->insert('Actors', $data);
// }

function AddActor($afn, $an){
        $data=array(
            'ActorFullName'=>$afn,
            'ActorNotes'=>$this->db->escape($an)
            // 'image' => $_POST['image']
        );
        $config['upload_path'] = './images/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['max_size'] = '999999';
	    $config['remove_spaces'] = true;
	    $config['overwrite'] = false;
	    $config['max_width'] = '0';
	    $config['max_height'] = '0';
        $this->load->library('upload', $config);
        if(! $this->upload->do_upload('image')){
            $this->upload->display_errors();
            exit();
        }
        $image=$this->upload->data();
        var_dump($image['file_name']);
        if ($image['file_name']){
            $data['image'] = "/images/".$image['file_name'];
        }
        $this->db->insert('Actors',$data);
        return true; 
}


function getTopActors(){
$data[0] = 'root';
$this->db->where('ActorID',0);
$Q = $this->db->get('Actors');
if ($Q->num_rows() > 0){
foreach ($Q->result_array() as $row){
$data[$row['ActorID']] = $row['ActorFullName'];
}
}
$Q->free_result();
return $data;
}

function updateActors(){
$data = array(
'ActorFullName' => $_POST['ActorFullName'],
'ActorNotes' => $_POST['ActorNotes'],
'image' => "/images/".$_POST['image']
);
// print($ActorID);
$this->db->where('ActorID', $_POST['id']);
$this->db->update('Actors', $data);
}


function deleterecords($id){
$this->db->where('ActorID', $id);
$this->db->delete('Actors');
}

}
?>
