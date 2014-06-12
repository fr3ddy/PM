<?php

class Projekte extends CI_Controller {

	public function index() {
		if ($this -> user_model -> istAngemeldet()) {
			$data["title"] = "Projekte";

			$data["projekte"] = $this -> projekte_model -> gibProjekte();

			$this -> load -> view("templates/header", $data);
			$this -> load -> view("projekte/index", $data);
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

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$data["strategien"] = $this -> konfig_model -> gibStrategien();
		$data["kategorien"] = $this -> projekte_model -> gibKategorien();

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("projekte/detailsAllgemein", $data);
		$this -> load -> view("templates/footer");
	}

	public function speichereAllgemein($id) {
		$this -> projekte_model -> aendereProjektAllgemein($id, $this -> input -> post());
		$this -> details($id);
	}

	public function detailsKosten($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["ProjektKosten"] = $this -> projekte_model -> gibProjektKosten($id);

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("projekte/detailsKosten", $data);
		$this -> load -> view("templates/footer");
	}

	public function speichereKosten($id) {
		$this -> projekte_model -> aendereProjektKosten($id, $this -> input -> post());
		$this -> detailsKosten($id);
	}

	public function detailsAmort($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["ProjektAmort"] = $this -> projekte_model -> gibProjektAmort($id);

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("projekte/detailsAmort", $data);
		$this -> load -> view("templates/footer");
	}

	public function speichereAmort($id) {
		$this -> projekte_model -> aendereProjektAmort($id, $this -> input -> post());
		$this -> detailsAmort($id);
	}

	public function detailsQualNutzen($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["NutzenQualitativ"] = $this -> projekte_model -> gibNutzenQualitativ($id);

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("projekte/detailsQualNutzen", $data);
		$this -> load -> view("templates/footer");
	}

	public function speichereQualNutzen($id) {
		$this -> projekte_model -> aendereNutzenQualitativ($id, $this -> input -> post());
		$this -> detailsQualNutzen($id);
	}

	public function detailsRisiken($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["ProjektRisiken"] = $this -> projekte_model -> gibProjektRisiken($id);

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("projekte/detailsRisiken", $data);
		$this -> load -> view("templates/footer");
	}

	public function speichereRisiken($id) {
		$this -> projekte_model -> aendereProjektRisiken($id, $this -> input -> post());
		$this -> detailsRisiken($id);
	}

	public function detailsStrategie($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["ProjektStrategien"] = $this -> projekte_model -> gibProjektStrategien($id);
		$data["strategien"] = $this -> konfig_model -> gibStrategien();

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("projekte/detailsStrategie", $data);
		$this -> load -> view("templates/footer");
	}

	public function speichereStrategie($id) {
		$this -> projekte_model -> aendereProjektStrategien($id, $this -> input -> post());
		$this -> detailsStrategie($id);
	}

	public function detailsKomplexitaet($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["ProjektKomplex"] = $this -> projekte_model -> gibProjektKomplex($id);
		$data["anzMitarbeiter"] = $this -> konfig_model -> gibAnzahlMitarbeiter();

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("projekte/detailsKomplexitaet", $data);
		$this -> load -> view("templates/footer");
	}

	public function speichereKomplexitaet($id) {
		$this -> projekte_model -> aendereProjektKomplex($id, $this -> input -> post());
		$this -> detailsKomplexitaet($id);
	}

	public function detailsSonstiges($id) {
		$data["title"] = "Projekte";

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges/" . $id);

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["ProjektSonstig"] = $this->projekte_model->gibProjektSonstig($id);

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("projekte/detailsSonstiges", $data);
		$this -> load -> view("templates/footer");
	}

	public function speichereSonstiges($id) {
		$this -> projekte_model -> aendereProjektSonstig($id, $this -> input -> post());
		$this -> detailsSonstiges($id);
	}
}
