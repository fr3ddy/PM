<?php

class Projekte_model extends CI_Model {

	function gibProjekteVonAnderenProjekten() {
		if ($this -> session -> userdata("Rolle") == "Mitarbeiter") {
			$projekte = array();
		} elseif ($this -> session -> userdata("Rolle") == "Abteilungsleiter") {
			$projekte = array();
		} elseif ($this -> session -> userdata("Rolle") == "Bereichsleiter") {
			$projekte = array();
		} elseif ($this -> session -> userdata("Rolle") == "PMO") {
			$projekte = array();
		} elseif ($this -> session -> userdata("Rolle") == "Geschäftsführer") {
			$projekte = array();
		} else {
			$projekte = array();
		}
		return $projekte;
	}

}
