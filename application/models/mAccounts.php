<?php
class mAccounts extends CI_Model {
    public function __construct(){
        parent::__construct();
}


function validate(){
	$arr['username'] = $this->input->post('username');
	$arr['password'] = md5($this->input->post('password'));
	if($this->db->get_where('admin', $arr)->row()){
		return $this->db->get_where('admin', $arr)->row();
	}
	elseif ($this->db->get_where('ratee', $arr)->row()) {
		return $this->db->get_where('ratee', $arr)->row();
	}
	
}

function addUser(){
$data = array(
'username' => $_POST['username'],
'password' => md5($_POST['password'])
);
$this->db->insert('ratee', $data);
redirect('/film/movies/dashboard/index','refresh');
}

function getAllUser(){
$data = array();
$Q = $this->db->get('ratee');
if ($Q-> num_rows() > 0){
foreach ($Q->result_array() as $row){
$data[] = $row;
}
}
$Q->free_result();
return $data;
}

}
?>