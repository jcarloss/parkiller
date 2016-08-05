<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mapa extends CI_Controller {
	var $template  = array();
   	var $data      = array();
	function __construct() {
		parent::__construct();
		$this->load->model("position_model");
	}
	 
	
	function index(){
		$this->template['header']   = $this->load->view('layout/headerAdmin', $this->data, true);
     	$this->template['footer'] = $this->load->view('layout/footerAdmin', $this->data, true);
		$this->load->view("Maps/administrador", $this->template);
	}
	
	
	/**
	 * This functions views company wall page
	 */
	function viewPost()
	{
		$this->load->view("posting");		
	}
	
	/**
	 * This function add post into DB
	 */
	function addPost() 
	{
	 	$postText =  $this -> input -> post("postText");	
		$type =  $this -> input -> post("type");
		$rec = array('position'=>$postText,'user_type'=>$type);
		
		$postId = $this->position_model->addPost($rec);
		
		$postData = $this->position_model->getPostById($postId);
		
		if ($postId > 0) {echo json_encode(array('status' => 'success', 'postData'=>$postData[0]));}
		else {echo json_encode(array('status' => 'error'));}
	}
	function deleteAllPost(){
		$this->position_model->deleteAllPost();	
		echo json_encode(array('status' => 'success', 'postData'=>"Eliminado"));
	}
	function getPosts()
	{
		$posts = $this->position_model->getPosts();	
		echo json_encode(array('posts'=>$posts));
	}
	function cliente(){
		$this->template['header']   = $this->load->view('layout/header', $this->data, true);
     	$this->template['footer'] = $this->load->view('layout/footer', $this->data, true);
		
		$data=$this->position_model->getPostAll();
		$clientes=$this->position_model->getUsers(2);
		$conductores=$this->position_model->getUsers(1);
		$data=array("data"=>$data,"clientes"=>$clientes,"conductores"=>$conductores,"templates"=>$this->template);
		$this->load->view("Maps/map-cliente",array("data"=>$data));
	}
}

?>