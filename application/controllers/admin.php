<?php

class Admin extends CI_Controller {

	private $sidenavigation = array("Konfiguration" => "admin", "Bereiche" => "admin/bereiche", "Neuer Bereich" => "admin/neuerBereich", "Abteilungen" => "admin/abteilungen", "Neue Abteilung" => "admin/neueAbteilung", "Mitarbeiter" => "admin/mitarbeiter", "Neuer Mitarbeiter" => "admin/neuerMitarbeiter");

	public function index() {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$data["title"] = "Administration";

			$data["sidenavigation"] = $this -> sidenavigation;
			$data["sidenavigationtitle"] = "Konfiguration";

			$this -> load -> view("templates/header", $data);
			$this -> load -> view("admin/index");
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

	public function bereiche() {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$data["title"] = "Administration";

			$data["sidenavigation"] = $this -> sidenavigation;
			$data["sidenavigationtitle"] = "Konfiguration";

			$this -> load -> view("templates/header", $data);
			$this -> load -> view("admin/bereiche");
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}
	}

	public function neuerBereich() {
		if ($this -> session -> userdata("Rolle") == "Abteilungsleiter" && $this -> session -> userdata("Abteilung") == 0) {
			$data["title"] = "Administration";

			$data["sidenavigation"] = $this -> sidenavigation;
			$data["sidenavigationtitle"] = "Konfiguration";

			$this -> load -> view("templates/header", $data);
			$this -> load -> view("admin/index");
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
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
			$this -> user_model -> aendereAbteilungsLeiter($id, $postData["Abteilungsleiter"]);
			$this -> user_model -> aendereAbteilungsname($id, $postData["Abteilungsname"]);
			$this -> abteilungen();
		} else {
			redirect("/");
		}
	}

}
