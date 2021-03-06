<?php

class User_Model extends CI_Model {
	function gibBenutzer() {
		$query = $this -> db -> get("Benutzer");
		$i = 0;
		foreach ($query->result() as $row) {
			$data[$i]["ID"] = $row -> ID;
			$data[$i]["Benutzername"] = $row -> Benutzername;
			$data[$i]["Abteilung"] = $this -> gibAbteilung($row -> Abteilung);
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

	function istAngemeldet() {
		if ($this -> session -> userdata("Benutzername") == "") {
			return false;
		} else {
			return true;
		}
	}

	//-------------------------------------------------------------------------------------------------------------------------------
	//Funktionen für die Tabelle Benutzer
	//-------------------------------------------------------------------------------------------------------------------------------

	function gibBenutzerdaten($benutzername) {
		if ($benutzername != "") {
			$query = $this -> db -> query('SELECT * FROM Benutzer WHERE Benutzername = "' . $benutzername . '"');
			$row = $query -> first_row();
			return array("Benutzername" => $row -> Benutzername, "Rolle" => $this -> gibRolle($row -> ID, $row -> Abteilung), "Abteilung" => $row -> Abteilung, "BenutzerID" => $row -> ID);
		}else{
			return array("Benutzername" => "", "Rolle" => "", "Abteilung" => "", "BenutzerID" => "");
		}
	}

	function gibBenutzerdatenID($ID) {
		if ($ID != "") {
			$query = $this -> db -> query('SELECT * FROM Benutzer WHERE ID = "' . $ID . '"');
			$row = $query -> first_row();
			return array("Benutzername" => $row -> Benutzername, "Abteilung" => $row -> Abteilung, "Rolle" => $this -> gibRolle($ID, $row -> Abteilung), "BenutzerID" => $ID);
		} else {
			return array("Benutzername" => "", "Rolle" => "", "Abteilung" => "", "BenutzerID" => "");
		}
	}

	function gibPasswortVonBenutzerid($id) {
		$query = $this -> db -> query("SELECT Passwort FROM Benutzer WHERE ID = " . $id);
		$row = $query -> first_row();
		return $row -> Passwort;
	}

	function gibRolle($benutzerID, $Abteilung) {
		if ($benutzerID != "") {
			$this -> db -> where('Abteilungsleiter', $benutzerID);
			$this -> db -> where('ID', 0);
			$query = $this -> db -> get('Abteilungen');
			if ($query -> num_rows > 0) {
				return "Geschäftsleiter";
			}

			if ($Abteilung == 0) {
				$this -> db -> where("Bereichsleiter", $benutzerID);
				$query = $this -> db -> get("Bereiche");
				if ($query -> num_rows() > 0) {
					return "Bereichsleiter";
				} else {
					return "PMO";
				}
			}

			$this -> db -> where("Abteilungsleiter", $benutzerID);
			$query = $this -> db -> get("Abteilungen");
			if ($query -> num_rows() > 0) {
				return "Abteilungsleiter";
			} else {
				return "Mitarbeiter";
			}

		}
	}

	function erstelleBenutzer($data) {
		$query = $this -> db -> query("SELECT * FROM Benutzer WHERE Benutzername = '" . $data["Benutzername"] . "'");

		if ($query -> num_rows() > 0) {
			return "Benutzername exsitiert schon";
		} else {
			$query = $this -> db -> insert("Benutzer", $data);
			if ($query == 1) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	function aendereBenutzer($data, $id) {
		if ($data["Passwort"] == "") {
			$data["Passwort"] = $this -> gibPasswortVonBenutzerid($id);
		}
		$this -> db -> where("ID", $id);
		$query = $this -> db -> update("Benutzer", $data);
		if ($query == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function loescheBenutzer($Benutzername) {
		$query = $this -> db -> query("DELETE FROM Benutzer WHERE Benutzername = " . $Benutzername . '"');
		if ($query == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	//-------------------------------------------------------------------------------------------------------------------------------
	//Funktionen für die Tabelle Abteilungen
	//-------------------------------------------------------------------------------------------------------------------------------
	function gibAbteilungen() {
		$query = $this -> db -> query("SELECT * FROM Abteilungen");
		$i = 0;
		foreach ($query->result() as $row) {
			$data[$i]["abteilungsname"] = $row -> Abteilungsname;
			$data[$i]["id"] = $row -> ID;
			$data[$i]["abteilungsleiter"] = $this -> gibBenutzerdatenID($row -> Abteilungsleiter);
			$i++;
		}
		return $data;
	}

	function gibAbteilung($ID) {
		$query = $this -> db -> query("SELECT * FROM Abteilungen WHERE ID = " . $ID);
		$row = $query -> first_row();
		return array("AbteilungsID" => $row -> ID, "Abteilungsname" => $row -> Abteilungsname, "Abteilungsleiter" => $this -> gibBenutzerdatenID($row -> Abteilungsleiter), "Bereich" => $row -> Bereich);
	}

	function gibAbteilungsmitarbeiter($ID) {
		$query = $this -> db -> query("SELECT * FROM Benutzer WHERE Abteilung = " . $ID);
		$i = 0;
		$data = array();
		foreach ($query->result() as $row) {
			$data[$i]["benutzername"] = $row -> Benutzername;
			$data[$i]["id"] = $row -> ID;
			$i++;
		}

		return $data;
	}

	// function aendereAbteilungsLeiter($AbteilungsID, $MitarbeiterID) {
	// $query = $this -> db -> query("UPDATE Abteilungen SET Abteilungsleiter = " . $MitarbeiterID . " WHERE ID = " . $AbteilungsID);
	// if ($query == 1) {
	// return array("Erfolgreich" => true, "Nachricht" => "Abteilungsleiter erfolgreich geändert");
	// } elseif ($query < 1) {
	// return array("Erfolgreich" => false, "Nachricht" => "AbteilungsID nicht gefunden");
	// } else {
	// return array("Erfolgreich" => false, "Nachricht" => "Schwerwiegender Fehler! Mehrer Abteilungen geändert!");
	// }
	// }

	function aendereAbteilung($ID, $data) {
		$this -> db -> where("ID", $ID);
		$query = $this -> db -> update("Abteilungen", $data);
		if ($query == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function erstelleAbteilung($Abteilungsname, $Bereich) {
		$query = $this -> db -> query("INSERT INTO Abteilungen (Abteilungsname, Bereich) VALUES ('" . $Abteilungsname . "', " . $Bereich . ")");
		if ($query == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function loescheAbteilung($ID) {
		$query = $this -> db -> query("DELETE FROM Abteilungen WHERE ID = " . $ID);
		if ($query == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	//-------------------------------------------------------------------------------------------------------------------------------
	//Funktionen für die Tabelle Bereiche
	//-------------------------------------------------------------------------------------------------------------------------------

	function gibBereiche() {
		$query = $this -> db -> query("SELECT * FROM Bereiche");
		$i = 0;
		foreach ($query->result() as $row) {
			$data[$i]["Bereichsname"] = $row -> Bereichsname;
			$data[$i]["ID"] = $row -> ID;
			$data[$i]["Bereichsleiter"] = $this -> gibBenutzerdatenID($row -> Bereichsleiter);
			$i++;
		}
		return $data;
	}

	function gibBereich($ID) {
		$this -> db -> where("ID", $ID);
		$query = $this -> db -> get("Bereiche");

		$row = $query -> first_row();

		$data["Bereichsname"] = $row -> Bereichsname;
		$data["Bereichsleiter"] = $this -> gibBenutzerdatenID($row -> Bereichsleiter);
		$data["ID"] = $ID;

		return $data;
	}

	function erstelleBereich($data) {
		$query = $this -> db -> insert("Bereiche", $data);
		if ($query == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function aenderBereich($data) {
		$this -> db -> where("ID", $data['ID']);
		$query = $this -> db -> update('Bereiche', $data);
		if ($query == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function loescheBereich($id) {
		$query = $this -> db -> query("DELETE FROM Bereiche WHERE ID = " . $id);
		if ($query == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}
