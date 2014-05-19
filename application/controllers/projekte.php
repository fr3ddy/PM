<?php

class Projekte extends CI_Controller {
	public function index() {
		if ($this -> user_model -> istAngemeldet()) {
			$data["title"] = "Projekte - PM";
			$this -> load -> view("templates/header", $data);
			$this -> load -> view("projekte/index");
			$this -> load -> view("templates/footer");
		} else {
			redirect("/");
		}
	}

}
