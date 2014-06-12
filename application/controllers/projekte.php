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

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges" . $id);

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

		$sidenavigation = array("Allgemeines" => "projekte/details/" . $id, "geplante Kosten" => "projekte/detailsKosten/" . $id, "Amortisationsdauer" => "projekte/detailsAmort/" . $id, "Faktoren zur Steigerung des qualitativen Nutzens" => "projekte/detailsQualNutzen/" . $id, "Risiken" => "projekte/detailsRisiken/" . $id, "Strategiebeitrag" => "projekte/detailsStrategie/" . $id, "Komplexitätsberechnung" => "projekte/detailsKomplexitaet/" . $id, "Sonstiges" => "projekte/detailsSonstiges" . $id);

		$data["ProjektAllgemein"] = $this -> projekte_model -> gibProjektAllgemein($id);
		$data["ProjektKosten"] = $this->projekte_model->gibProjektKosten($id);

		$data["sidenavigation"] = $sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"] -> Titel;

		$data["strategien"] = $this -> konfig_model -> gibStrategien();
		$data["kategorien"] = $this -> projekte_model -> gibKategorien();

		$this -> load -> view("templates/header", $data);
		$this -> load -> view("projekte/detailsKosten", $data);
		$this -> load -> view("templates/footer");
	}

	/*
	 $data["ProjektAmort"] = $this->projekte_model->gibProjektAmort($id);
	 $data["ProjektKomplex"] = $this->projekte_model->gibProjektKomplex($id);
	 $data["ProjektRisiken"] = $this->projekte_model->gibProjektRisiken($id);
	 $data["ProjektSonstig"] = $this->projekte_model->gibProjektSonstig($id);
	 $data["ProjektStrategien"] = $this->projekte_model->gibProjektStrategien($id);
	 $data["NutzenQualitativ"] = $this->projekte_model->gibNutzenQualitativ($id);
	 *
	 */

}
