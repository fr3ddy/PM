<?php

class Admin extends CI_Controller {
	
	private $sidenavigation = array("Konfiguration" => "admin", "Mitarbeiter" => "admin/mitarbeiter" , "Neuer Mitarbeiter" => "admin/neuerMitarbeiter");

	public function index() {
		$data["title"] = "Administration";
		
		$data["sidenavigation"] = $this->sidenavigation;
		$data["sidenavigationtitle"] = "Konfiguration";

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("admin/index");
		$this -> load -> view("templates/footer");
	}

	public function mitarbeiter() {
		$data["title"] = "Administration";
		
		$data["sidenavigation"] = $this->sidenavigation;
		$data["sidenavigationtitle"] = "Mitarbeiter";
		
		$data["mitarbeiter"] = $this->admin_model->gibAlleMitarbeiter();

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("admin/mitarbeiter" , $data);
		$this -> load -> view("templates/footer");
	}
	
	public function neuerMitarbeiter(){
		$data["title"] = "Administration";
		
		$data["sidenavigation"] = $this->sidenavigation;
		$data["sidenavigationtitle"] = "Neuer Mitarbeiter";
		
		$data["mitarbeiter"] = $this->admin_model->gibAlleMitarbeiter();

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("admin/neuerMitarbeiter");
		$this -> load -> view("templates/footer");
	}
	
	public function speichereNeuenMitarbeiter(){
		$this->admin_model->speichereNeuenMitarbeiter($this->input->post());
		$this->mitarbeiter();
	}

}
