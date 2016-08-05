<?php defined('BASEPATH') OR exit('No direct script access allowed');

class position_model extends CI_Model
{
	function getPosts()
	{
		$this->db->select('*');
  		$this->db->from('positions');
  		$this->db->join('cat_users CU', 'CU.id=positions.user_type', 'left');
		$data = $this->db->get();
		return $data->result();
	}
	
	function addPost($postData)
	{ 
	 	$this->db->insert("positions", $postData);
		$insertId = $this->db->insert_id();
		return $insertId;
	}
	
	function getPostById($position)
	{
		$this->db->select('*');
  		$this->db->from('positions');
  		$this->db->join('cat_users CU', 'CU.id=positions.user_type', 'left');
		$this->db->where('positions.id', $position);
		$data = $this->db->get();
		return $data->result();
	}
	function getPostAll()
	{
		$this->db->select('positions.*');
  		$this->db->from('positions');
  		$this->db->join('cat_users CU', 'CU.id=positions.user_type', 'left');
		$data = $this->db->get();
		return $data->result_array();
	}
	function getUsers($idtypeUSer){
		$this->db->select('position, user_type,status,creation');
  		$this->db->from('positions');
  		$this->db->where('user_type', $idtypeUSer);
		$data = $this->db->get();
		return $data->result_array();
	}
	function deleteAllPost(){
		
   		$this->db->query("delete from positions");
	}
}