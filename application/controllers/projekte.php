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

        $this -> load -> view("templates/header", $data);
        $this -> load -> view("projekte/neu", $data);
        $this -> load -> view("templates/footer");
    }

    public function einreichen() {
        $postData = $this -> input -> post();
        $this->projekte_model->erstelleProjekt($postData);
		$this->index();
    }

}
