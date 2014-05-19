<?php

class User extends CI_Controller{
	
	public function index(){
		
		$data["title"] = "Login - PM";
		$this->load->view("templates/header" , $data);
		$this->load->view("user/index");
		$this->load->view("templates/footer");
	}
	
}
