<?php

class Admin extends CI_Controller {

	private $sidenavigation = array("Konfiguration" => "admin", "Bereiche" => "admin/bereiche", "Neuer Bereich" => "admin/neuerBereich", "Abteilungen" => "admin/abteilungen", "Neue Abteilung" => "admin/neueAbteilung", "Mitarbeiter" => "admin/mitarbeiter", "Neuer Mitarbeiter" => "admin/neuerMitarbeiter");

	public function index() {
		$gl = $this->user_model->gibAbteilung(0);
		if ($gl["Abteilungsleiter"]["BenutzerID"] == $this -> session -> userdata("BenutzerID")) {
			$data["title"] = "Administration";

			$data["sidenavigation"] = $this -> sidenavigation;
			$data["sidenavigationtitle"] = "Konfiguration";
			
			$data["konfig"] = $this->konfig_model->gibKonfig();
			$data["strategien"] = $this->konfig_model->gibStrategien();
			
			$this -> load -> view("templates/header", $data);
			$this -> load -> view("admin/index" , $data);
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}
	}

	public function mitarbeiter() {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {

			$data["title"] = "Administration";

			$data["sidenavigation"] = $this -> sidenavigation;
			$data["sidenavigationtitle"] = "Mitarbeiter";

			$data["mitarbeiter"] = $this -> user_model -> gibBenutzer();

			$this -> load -> view("templates/header", $data);
			$this -> load -> view("admin/mitarbeiter", $data);
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}
	}

	public function neuerMitarbeiter() {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {

			$data["title"] = "Administration";

			$data["sidenavigation"] = $this -> sidenavigation;
			$data["sidenavigationtitle"] = "Neuer Mitarbeiter";

			$data["abteilungen"] = $this -> user_model -> gibAbteilungen();

			$this -> load -> view("templates/header", $data);
			$this -> load -> view("admin/neuerMitarbeiter", $data);
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}

	}

	public function speichereNeuenMitarbeiter() {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$this -> user_model -> erstelleBenutzer($this -> input -> post());
			$this -> mitarbeiter();
		} else {
			redirect("/");
		}
	}

	public function mitarbeiterBearbeiten($id) {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {

			$data["title"] = "Administration";

			$data["sidenavigation"] = $this -> sidenavigation;
			$data["sidenavigationtitle"] = "Neuer Mitarbeiter";

			$data["benutzerdaten"] = $this -> user_model -> gibBenutzerdatenID($id);
			$data["abteilungen"] = $this -> user_model -> gibAbteilungen();

			$this -> load -> view("templates/header", $data);
			$this -> load -> view("admin/bearbeiteMitarbeiter", $data);
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}
	}

	public function speicherebearbeitetenMitarbeiter($id) {
		$postData = $this -> input -> post();
		if ($this -> user_model -> aendereBenutzer($postData, $id)) {
			$this -> mitarbeiter();
		}
	}

	public function abteilungen() {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$data["title"] = "Administration";

			$data["sidenavigation"] = $this -> sidenavigation;
			$data["sidenavigationtitle"] = "Abteilungen";

			$data["abteilungen"] = $this -> user_model -> gibAbteilungen();

			$this -> load -> view("templates/header", $data);
			$this -> load -> view("admin/abteilungen", $data);
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}
	}

	public function neueAbteilung() {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$data["title"] = "Administration";

			$data["sidenavigation"] = $this -> sidenavigation;
			$data["sidenavigationtitle"] = "Erstelle Abteilung";

			$data["bereiche"] = $this -> user_model -> gibBereiche();

			$this -> load -> view("templates/header", $data);
			$this -> load -> view("admin/neueAbteilung", $data);
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}
	}

	public function erstelleAbteilung() {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$postData = $this -> input -> post();
			$this -> user_model -> erstelleAbteilung($postData["Abteilungsname"], $postData["Bereich"]);
			$this -> abteilungen();
		} else {
			redirect("/");
		}

	}

	public function abteilungBearbeiten($id) {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$data["title"] = "Administration";

			$data["sidenavigation"] = $this -> sidenavigation;
			$data["sidenavigationtitle"] = "Abteilung bearbeiten";

			$data["id"] = $id;
			$data["abteilung"] = $this -> user_model -> gibAbteilung($id);
			$data["bereiche"] = $this -> user_model -> gibBereiche();
			$data["abteilungsmitarbeiter"] = $this -> user_model -> gibAbteilungsmitarbeiter($id);

			$this -> load -> view("templates/header", $data);
			$this -> load -> view("admin/abteilungBearbeiten", $data);
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}
	}

	public function sendeGeaenderteAbteilung($id) {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$postData = $this -> input -> post();
			$this -> user_model -> aendereAbteilung($id, $postData);
			$this -> abteilungen();
		} else {
			redirect("/");
		}
	}

	public function abteilungLoeschen($id) {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$this -> user_model -> loescheAbteilung($id);
			$this -> abteilungen();
		} else {
			redirect("/");
		}
	}

	public function bereiche() {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$data["title"] = "Administration";

			$data["sidenavigation"] = $this -> sidenavigation;
			$data["sidenavigationtitle"] = "Abteilungen";

			$data["bereiche"] = $this -> user_model -> gibBereiche();

			$this -> load -> view("templates/header", $data);
			$this -> load -> view("admin/bereiche", $data);
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}
	}

	public function neuerBereich() {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$data["title"] = "Administration";

			$data["sidenavigation"] = $this -> sidenavigation;
			$data["sidenavigationtitle"] = "Neuer Bereich";

			$data["bereichsleiter"] = $this -> user_model -> gibAbteilungsmitarbeiter(0);

			$this -> load -> view("templates/header", $data);
			$this -> load -> view("admin/neuerBereich", $data);
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}
	}

	public function erstelleBereich() {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$postData = $this -> input -> post();

			$this -> user_model -> erstelleBereich($postData);
			$this -> bereiche();
		} else {
			redirect("/");
		}
	}

	public function bereichBearbeiten($id) {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$data["title"] = "Administration";

			$data["sidenavigation"] = $this -> sidenavigation;
			$data["sidenavigationtitle"] = "Neuer Bereich";

			$data["bereichsleiter"] = $this -> user_model -> gibAbteilungsmitarbeiter(0);
			$data["bereich"] = $this -> user_model -> gibBereich($id);

			$this -> load -> view("templates/header", $data);
			$this -> load -> view("admin/bereichBearbeiten", $data);
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}
	}

	public function speichereBereich($id) {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$postData = $this -> input -> post();
			$postData["ID"] = $id;
			$this -> user_model -> aenderBereich($postData);
			$this -> bereiche();
		} else {
			redirect("/");
		}
	}

	public function bereichLoeschen($id) {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$this -> user_model -> loescheBereich($id);
			$this -> bereiche();
		} else {
			redirect("/");
		}
	}
	
	public function saveKonfig(){
		$postData = $this->input->post();
		$strategien = array();
		$i = 0;
		foreach ($postData as $key => $value) {
			if(strpos($key ,'strategie-') !== FALSE){
				$strategien[$i]["ID"] = $i;
				$strategien[$i]["Bezeichnung"] = $value;
				unset($postData[$key]);
				$i++;
			}
		}
		$this->konfig_model->aendereKonfig($postData);
		$this->konfig_model->speichereStrategien($strategien);
		$this->index();
	}
	

}
