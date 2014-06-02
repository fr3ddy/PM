<?php

class Projekte extends CI_Controller {
	public function index() {
		if ($this -> user_model -> istAngemeldet()) {
			$data["title"] = "Projekte";
			
			$data["projekte"] = $this->projekte_model->gibProjekteVonAktuellemMitarbeiter();
			
			$this -> load -> view("templates/header", $data);
			$this -> load -> view("projekte/index");
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}
	}
	
	public function neu(){
		$data["title"] = "Projekte";
			
			$this -> load -> view("templates/header", $data);
			$this -> load -> view("projekte/neu");
			$this -> load -> view("templates/footer");
	}

}
