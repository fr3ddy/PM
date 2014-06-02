<?php

class Projekte_model extends CI_Model {

	function gibProjekteVonAktuellemMitarbeiter() {
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
	
	function gibHauptstrategien(){
		$strategien = array("Kategorie 1" , "Kategorie 2" , "Kategorie 3");
		
		return $strategien;
	}

}
