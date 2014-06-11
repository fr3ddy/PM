<?php

class Projekte extends CI_Controller {
	
	private $sidenavigation = array("");
	
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

        $this -> load -> view("templates/header", $data);
        $this -> load -> view("projekte/neu", $data);
        $this -> load -> view("templates/footer");
    }

    public function einreichen() {
        $postData = $this -> input -> post();
        $this->projekte_model->erstelleProjekt($postData);
		$this->index();
    }
	
	public function loescheProjekt($id){
		$this->projekte_model->loescheProjekt($id);
		$this->index();
	}
	
	public function details($id){
		$data["ProjektAllgemein"] = $this->projekte_model->gibProjektAllgemein($id);
		$data["ProjektAmort"] = $this->projekte_model->gibProjektAmort($id);
		$data["ProjektKomplex"] = $this->projekte_model->gibProjektKomplex($id);
		$data["ProjektKosten"] = $this->projekte_model->gibProjektKosten($id);
		$data["ProjektRisiken"] = $this->projekte_model->gibProjektRisiken($id);
		$data["ProjektSonstig"] = $this->projekte_model->gibProjektSonstig($id);
		$data["ProjektStrategien"] = $this->projekte_model->gibProjektStrategien($id);
		$data["NutzenQualitativ"] = $this->projekte_model->gibNutzenQualitativ($id);
		
		$data["sidenavigation"] = $this -> sidenavigation;
		$data["sidenavigationtitle"] = $data["ProjektAllgemein"]->Titel;
		$data["title"] = $data["ProjektAllgemein"]->Titel;
		
		$this -> load -> view("templates/header", $data);
        $this -> load -> view("projekte/neu", $data);
        $this -> load -> view("templates/footer");
	}

}
