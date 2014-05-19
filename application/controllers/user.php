<?php

class User extends CI_Controller{
	
	public function index(){
		$data["title"] = "Login - PM";
		
		$data["user"] = $this->user_model->gibBenutzer();
		
		$this->load->view("templates/header" , $data);
		$this->load->view("user/index" , $data);
		$this->load->view("templates/footer");
	}
	
}
