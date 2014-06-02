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
		$query = $this -> db -> query('SELECT * FROM Benutzer WHERE Benutzername = "' . $benutzername . '"');
		$row = $query -> first_row();
		return array("Benutzername" => $row -> Benutzername, "Rolle" => $this -> gibRolle($row -> ID), "Abteilung" => $row -> Abteilung, "BenutzerID" => $row -> ID);
	}

	function gibBenutzerdatenID($ID) {
		if($ID != ""){
		$query = $this -> db -> query('SELECT * FROM Benutzer WHERE ID = "' . $ID . '"');
		$row = $query -> first_row();
		return array("Benutzername" => $row -> Benutzername, "Rolle" => $this -> gibRolle($ID), "Abteilung" => $row -> Abteilung, "BenutzerID" => $ID);
		}else{
			return array("Benutzername" => "", "Rolle" => "", "Abteilung" => "", "BenutzerID" => "");
		}
	}

	function gibRolle($benutzerID) {
		if ($benutzerID != "") {
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
		} else {
			return "Mitarbeiter";
		}
	}

	function erstelleBenutzer($data) {
		$query = $this -> db -> query("SELECT * FROM Benutzer WHERE Benutzername = '" . $data["Benutzername"]."'");

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

	function aendereBenutzer($data) {
		$this -> db -> where("Benutzername", $data["Benutzername"]);
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

	function aendereAbteilungsLeiter($AbteilungsID, $MitarbeiterID) {
		$query = $this -> db -> query("UPDATE Abteilungen SET Abteilungsleiter = " . $MitarbeiterID . " WHERE ID = " . $AbteilungsID);
		if ($query == 1) {
			return array("Erfolgreich" => true, "Nachricht" => "Abteilungsleiter erfolgreich geändert");
		} elseif ($query < 1) {
			return array("Erfolgreich" => false, "Nachricht" => "AbteilungsID nicht gefunden");
		} else {
			return array("Erfolgreich" => false, "Nachricht" => "Schwerwiegender Fehler! Mehrer Abteilungen geändert!");
		}
	}

	function aendereAbteilungsname($AbteilungsID, $Abteilungsname) {
		$query = $this -> db -> query("UPDATE Abteilungen SET Abteilungsname = '" . $Abteilungsname . "' WHERE ID = " . $AbteilungsID);
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
			$data[$i]["bereichsname"] = $row -> Bereichsname;
			$data[$i]["id"] = $row -> ID;
			$data[$i]["bereichsleiter"] = $this -> gibBenutzerdatenID($row -> Bereichsleiter);
			$i++;
		}
		return $data;
	}

	// function gibBereich($ID){
	// $this->db->where("ID", $ID);
	// $query = $this->db->select()
	// }

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

	function loescheBereich($data) {
		$query = $this -> db -> delete('Bereiche', $data["ID"]);
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

    function gibAlleBenutzer() {
        $query = $this -> db -> get('Benutzer');
        $i = 0;
        foreach ($query->result() as $row) {
            $data[$i]["Benutzername"] = $row -> Benutzername;
            $data[$i]["ID"] = $row -> ID;
            $data[$i]["Abteilung"] = $this -> gibAbteilung($row -> Abteilung);
            $data[$i]["AbteilungsID"] = $row -> Abteilung;
        }
        return $data;
    }

    function gibBenutzerdaten($benutzername) {
        $query = $this -> db -> query('SELECT * FROM Benutzer WHERE Benutzername = "' . $benutzername . '"');
        $row = $query -> first_row();
        return array("Benutzername" => $row -> Benutzername, "Rolle" => $this -> gibRolle($row -> ID), "Abteilung" => $row -> Abteilung, "BenutzerID" => $row -> ID);
    }

    function gibBenutzerdatenID($ID) {
        $query = $this -> db -> query('SELECT * FROM Benutzer WHERE ID = "' . $ID . '"');
        $row = $query -> first_row();
        return array("Benutzername" => $row -> Benutzername, "Rolle" => $this -> gibRolle($row -> ID), "Abteilung" => $row -> Abteilung, "BenutzerID" => $row -> ID);
    }

    function gibRolle($benutzerID) {
        if ($benutzerID != NULL) {
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
    }

    function erstelleBenutzer($data) {
        $query = $this -> db -> query("SELECT * FROM Benutzer WHERE Benutzername = " . $Benutzername);

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

    function aendereBenutzer($data) {
        $this -> db -> where("Benutzername", $data["Benutzername"]);
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
        foreach ($query->result() as $row) {
            $data[$i]["benutzername"] = $row -> Benutzername;
            $data[$i]["id"] = $row -> ID;
            $i++;
        }

        return $data;
    }

    function aendereAbteilungsLeiter($AbteilungsID, $MitarbeiterID) {
        $query = $this -> db -> query("UPDATE Abteilungen SET Abteilungsleiter = " . $MitarbeiterID . " WHERE ID = " . $AbteilungsID);
        if ($query == 1) {
            return array("Erfolgreich" => true, "Nachricht" => "Abteilungsleiter erfolgreich geändert");
        } elseif ($query < 1) {
            return array("Erfolgreich" => false, "Nachricht" => "AbteilungsID nicht gefunden");
        } else {
            return array("Erfolgreich" => false, "Nachricht" => "Schwerwiegender Fehler! Mehrer Abteilungen geändert!");
        }
    }

    function aendereAbteilungsname($AbteilungsID, $Abteilungsname) {
        $query = $this -> db -> query("UPDATE Abteilungen SET Abteilungsname = '" . $Abteilungsname . "' WHERE ID = " . $AbteilungsID);
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
            $data[$i]["bereichsname"] = $row -> Bereichsname;
            $data[$i]["id"] = $row -> ID;
            $data[$i]["bereichsleiter"] = $this -> gibBenutzerdatenID($row -> Bereichsleiter);
            $i++;
        }
        return $data;
    }

    // function gibBereich($ID){
    // $this->db->where("ID", $ID);
    // $query = $this->db->select()
    // }

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

    function loescheBereich($data) {
        $query = $this -> db -> delete('Bereiche', $data["ID"]);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
