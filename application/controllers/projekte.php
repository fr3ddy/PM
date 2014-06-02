<?php

class Projekte extends CI_Controller {
	public function index() {
		if ($this -> user_model -> istAngemeldet()) {
			$data["title"] = "Projekte";

			$data["projekte"] = $this -> projekte_model -> gibProjekteVonAktuellemMitarbeiter();

			$this -> load -> view("templates/header", $data);
			$this -> load -> view("projekte/index" , $data);
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}
	}

	public function neu() {
		$data["title"] = "Projekte";
		
		$data["hauptstrategien"] = $this->projekte_model->gibHauptstrategien();
		
		$this -> load -> view("templates/header", $data);
		$this -> load -> view("projekte/neu" , $data);
		$this -> load -> view("templates/footer");
	}

	public function einreichen() {
		$postData = $this -> input -> post();
		// $this->projekt_model->einreichen($postData);
	}

}
