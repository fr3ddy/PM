<?php

class User extends CI_Controller{
	
	public function index(){
		$data["title"] = "Login";
		
		if(!$this->user_model->istAngemeldet()){
			$this->load->view("templates/header" , $data);
			$this->load->view("user/login");
			$this->load->view("templates/footer");
		}else{
			redirect("/projekte");
		}
	}
	
	public function login(){
		$post = $this->input->post();
		if($this->user_model->existiertBenutzer($post["benutzername"])){
			if($this->user_model->loginKorrekt($post["benutzername"] , $post["passwort"])){
				
				$flag = true;
			}else{
				$data["benutzername"] = $post["benutzername"];
				$data["pwerror"] = "has-error";
				$flag = false;
			}
		}else{
			$data['usererror'] = "has-error";
			$flag = false;
		}
		if($flag){
			$userdata = $this->user_model->gibBenutzerdaten($post["benutzername"]);
			$this->session->set_userdata($userdata);
			redirect("/projekte");
		}else{
			$data["title"] = "Login";
			$this->load->view("templates/header" , $data);
			$this->load->view("user/login" , $data);
			$this->load->view("templates/footer");
		}
	}
	
	public function logout(){
		$userdata = $this->user_model->gibBenutzerdaten($this->session->userdata("Benutzername"));
		foreach ($userdata as $dataname => $data) {
			$userdata[$dataname] = "";
		}
		$this->session->unset_userdata($userdata);
		$this->index();
	}
	
}
