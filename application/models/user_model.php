<?php

class User_Model extends CI_Model {
	function gibBenutzer() {
		$query = $this -> db -> get("Benutzer");
		$i = 0;
		foreach ($query->result() as $row) {
			$data[$i]["benutzername"] = $row -> Benutzername;
			$data[$i]["passwort"] = $row -> Passwort;
			$data[$i]["abteilung"] = $row -> Abteilung;
			$i++;
		}

		return $data;
	}

	function existiertBenutzer($benutzername) {
		$query = $this -> db -> simple_query('SELECT * FROM Benutzer WHERE Benutzername = "' . $benutzername . '"');
		return $query;
	}

	function loginKorrekt($benutzername, $passwort) {
		$query = $this -> db -> query('SELECT * FROM Benutzer WHERE Benutzername = "' . $benutzername . '" 
									AND Passwort = "' . $passwort . '"');
		if ($query -> num_rows() == 1) {
			return TRUE;
		} else {
			return false;
		}
	}

	function gibBenutzerdaten($benutzername) {
		$query = $this -> db -> query('SELECT * FROM Benutzer WHERE Benutzername = "' . $benutzername . '"');
		$row = $query -> first_row();
		return array("Benutzername" => $row -> Benutzername, "Rolle" => $this -> gibRolle($row -> ID), "Abteilung" => $row -> Abteilung, "BenutzerID" => $row -> ID);
	}

	function gibRolle($benutzerID) {
		$query = $this -> db -> query('SELECT * FROM Abteilungen WHERE Abteilungsleiter = ' . $benutzerID);
		if ($query -> num_rows() == 1) {
			return "Abteilungsleiter";
		} else {
			$query = $this -> db -> query('SELECT * FROM Bereiche WHERE Bereichsleiter = ' . $benutzerID);
		}
		if ($query -> num_rows() == 1) {
			return "Bereichsleiter";
		} else {
			return "Mitarbeiter";
		}
	}

	function istAngemeldet() {
		if ($this -> session -> userdata("Benutzername") == "") {
			return false;
		} else {
			return true;
		}
	}

}
