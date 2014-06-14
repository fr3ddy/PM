<?php

class Projekte extends CI_Controller {

	public function index() {
		if ($this -> user_model -> istAngemeldet()) {
			$data["title"] = "Projekte";

			$this -> load -> view("templates/header", $data);

			if ($this -> session -> userdata("Rolle") == "PMO") {
				$data["projekte"] = $this -> projekte_model -> gibProjektUebersicht();
				$this -> load -> view("projekte/indexpmo", $data);
			} elseif ($this -> session -> userdata("Rolle") == "Geschäftsleiter") {
				$data["projekte"] = $this -> projekte_model -> gibProjektUebersicht();
				$this -> load -> view("projekte/indexgl", $data);
			} else {
				$data["projekte"] = $this -> projekte_model -> gibProjekte();
				$this -> load -> view("projekte/index", $data);
			}
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}
	}

	public function neu() {
		$data["title"] = "Projekte";

		$data["hauptstrategien"] = $this -> konfig_model -> gibStrategien();
		$data["kategorien"] = $this -> projekte_model -> gibKategorien();

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("projekte/neu", $data);
		$this -> load -> view("templates/footer");
	}

	public function einreichen() {
		$postData = $this -> input -> post();
		$this -> projekte_model -> erstelleProjekt($postData);
		$this -> index();
	}

	public function loescheProjekt($id) {
		$this -> projekte_model -> loescheProjekt($id);
		$this -> index();
	}

	public function details($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			$sidenavigation["<span class='glyphicon glyphicon-send'></span> Weitergeben"] = "projekte/weitergeben/" . $id;
		}

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$data["strategien"] = $this -> konfig_model -> gibStrategien();
		$data["kategorien"] = $this -> projekte_model -> gibKategorien();

		$this -> load -> view("templates/header", $data);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			//Wenn nicht PMO oder Geschäftsleiter
			$this -> load -> view("projekte/detailsAllgemein", $data);
		} else {
			$this -> load -> view("projekte/detailsAllgemeingl", $data);
		}
		$this -> load -> view("templates/footer");
	}

	public function speichereAllgemein($id) {
		$this -> projekte_model -> aendereProjektAllgemein($id, $this -> input -> post());
		$this -> details($id);
	}

	public function detailsKosten($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			$sidenavigation["<span class='glyphicon glyphicon-send'></span> Weitergeben"] = "projekte/weitergeben/" . $id;
		}

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["ProjektKosten"] = $this -> projekte_model -> gibProjektKosten($id);

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$this -> load -> view("templates/header", $data);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			//Wenn nicht PMO oder Geschäftsleiter
			$this -> load -> view("projekte/detailsKosten", $data);
		} else {
			$this -> load -> view("projekte/detailsKostengl", $data);
		}
		$this -> load -> view("templates/footer");
	}

	public function speichereKosten($id) {
		$this -> projekte_model -> aendereProjektKosten($id, $this -> input -> post());
		$this -> detailsKosten($id);
	}

	public function detailsAmort($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			$sidenavigation["<span class='glyphicon glyphicon-send'></span> Weitergeben"] = "projekte/weitergeben/" . $id;
		}

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["ProjektAmort"] = $this -> projekte_model -> gibProjektAmort($id);

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$this -> load -> view("templates/header", $data);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			//Wenn nicht PMO oder Geschäftsleiter
			$this -> load -> view("projekte/detailsAmort", $data);
		} else {
			$this -> load -> view("projekte/detailsAmortgl", $data);
		}
		$this -> load -> view("templates/footer");
	}

	public function speichereAmort($id) {
		$this -> projekte_model -> aendereProjektAmort($id, $this -> input -> post());
		$this -> detailsAmort($id);
	}

	public function detailsQualNutzen($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			$sidenavigation["<span class='glyphicon glyphicon-send'></span> Weitergeben"] = "projekte/weitergeben/" . $id;
		}

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["NutzenQualitativ"] = $this -> projekte_model -> gibNutzenQualitativ($id);

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$this -> load -> view("templates/header", $data);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			//Wenn nicht PMO oder Geschäftsleiter
			$this -> load -> view("projekte/detailsQualNutzen", $data);
		} else {
			$this -> load -> view("projekte/detailsQualNutzengl", $data);
		}
		$this -> load -> view("templates/footer");
	}

	public function speichereQualNutzen($id) {
		$this -> projekte_model -> aendereNutzenQualitativ($id, $this -> input -> post());
		$this -> detailsQualNutzen($id);
	}

	public function detailsRisiken($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			$sidenavigation["<span class='glyphicon glyphicon-send'></span> Weitergeben"] = "projekte/weitergeben/" . $id;
		}

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["ProjektRisiken"] = $this -> projekte_model -> gibProjektRisiken($id);

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$this -> load -> view("templates/header", $data);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			//Wenn nicht PMO oder Geschäftsleiter
			$this -> load -> view("projekte/detailsRisiken", $data);
		} else {
			$this -> load -> view("projekte/detailsRisikengl", $data);
		}
		$this -> load -> view("templates/footer");
	}

	public function speichereRisiken($id) {
		$this -> projekte_model -> aendereProjektRisiken($id, $this -> input -> post());
		$this -> detailsRisiken($id);
	}

	public function detailsStrategie($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			$sidenavigation["<span class='glyphicon glyphicon-send'></span> Weitergeben"] = "projekte/weitergeben/" . $id;
		}

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["ProjektStrategien"] = $this -> projekte_model -> gibProjektStrategien($id);
		$data["strategien"] = $this -> konfig_model -> gibStrategien();

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$this -> load -> view("templates/header", $data);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			//Wenn nicht PMO oder Geschäftsleiter
			$this -> load -> view("projekte/detailsStrategie", $data);
		} else {
			$this -> load -> view("projekte/detailsStrategiegl", $data);
		}
		$this -> load -> view("templates/footer");
	}

	public function speichereStrategie($id) {
		$this -> projekte_model -> aendereProjektStrategien($id, $this -> input -> post());
		$this -> detailsStrategie($id);
	}

	public function detailsKomplexitaet($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			$sidenavigation["<span class='glyphicon glyphicon-send'></span> Weitergeben"] = "projekte/weitergeben/" . $id;
		}

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["ProjektKomplex"] = $this -> projekte_model -> gibProjektKomplex($id);
		$data["anzMitarbeiter"] = $this -> konfig_model -> gibAnzahlMitarbeiter();

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$this -> load -> view("templates/header", $data);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			//Wenn nicht PMO oder Geschäftsleiter
			$this -> load -> view("projekte/detailsKomplexitaet", $data);
		} else {
			$this -> load -> view("projekte/detailsKomplexitaetgl", $data);
		}
		$this -> load -> view("templates/footer");
	}

	public function speichereKomplexitaet($id) {
		$this -> projekte_model -> aendereProjektKomplex($id, $this -> input -> post());
		$this -> detailsKomplexitaet($id);
	}

	public function detailsSonstiges($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			$sidenavigation["<span class='glyphicon glyphicon-send'></span> Weitergeben"] = "projekte/weitergeben/" . $id;
		}

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["ProjektSonstig"] = $this -> projekte_model -> gibProjektSonstig($id);
		$data["projekte"] = $this -> projekte_model -> gibAlleProjektTitel();

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$this -> load -> view("templates/header", $data);
		if ($this -> session -> userdata("Rolle") != "Geschäftsleiter" && $this -> session -> userdata("Rolle") != "PMO") {
			//Wenn nicht PMO oder Geschäftsleiter
			$this -> load -> view("projekte/detailsSonstiges", $data);
		} else {
			$this -> load -> view("projekte/detailsSonstigesgl", $data);
		}
		$this -> load -> view("templates/footer");
	}

	public function speichereSonstiges($id) {
		$data = $this -> input -> post();
		if (!isset($data["NutzKosten"])) {
			$data["NutzKosten"] = 0;
		}
		if (!isset($data["NutzUmsatz"])) {
			$data["NutzUmsatz"] = 0;
		}
		$this -> projekte_model -> aendereProjektSonstig($id, $data);
		$this -> detailsSonstiges($id);
	}

	public function weitergeben($id) {
		$this -> projekte_model -> reicheProjektWeiter($id);
		$this -> index();
	}

	public function speicherePMOListe() {
		$data = $this -> input -> post();
		$projekte = explode("-", substr($data["projekte"] , 1));
		$this -> projekte_model -> loeschePMOListe();
		foreach ($projekte as $projekt) {
			$this -> projekte_model -> reicheProjektWeiter($projekt[0]);
		}
	}
	
	public function speichereGLListe() {
		$data = $this -> input -> post();
		$projekte = explode("-", substr($data["projekte"] , 1));
		$this -> projekte_model -> loeschePlan();
		foreach ($projekte as $projekt) {
			$this -> projekte_model -> reicheProjektWeiter($projekt[0]);
		}
	}
	
	public function bereich(){
		$data["title"] = "Projekte pro Bereich";
		
		$data["bereiche"] = $this->projekte_model->bereichsProjekte();

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("projekte/bereiche", $data);
		$this -> load -> view("templates/footer");
	}
	
	public function kategorie(){
		$data["title"] = "Projekte pro Kategorie";

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("projekte/kategorien", $data);
		$this -> load -> view("templates/footer");
	}
	
	public function strategie(){
		$data["title"] = "Projekte pro Strategie";

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("projekte/strategien", $data);
		$this -> load -> view("templates/footer");
	}

}
