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

    //-------------------------------------------------------------------------------------------------------------------------------
    //Funktionen für die Tabelle Abteilungen
    //-------------------------------------------------------------------------------------------------------------------------------
    function gibAbteilungen() {
        $query = $this -> db -> query("SELECT * FROM Abteilungen");
        $i = 0;
        foreach ($query->result() as $row) {
            $data[$i]["abteilungsname"] = $row -> Abteilungsname;
            $data[$i]["id"] = $row -> ID;
            $i++;
        }
		return $data;
    }

    function gibAbteilung($ID) {
        $query = $this -> db -> query("SELECT * FROM Abteilungen WHERE ID = " . $ID);
        $row = $query -> first_row();
        return array("AbteilungsID" => $row -> ID, "Abteilungsname" => $row -> Abteilungsname, "Abteilungsleiter" => $row -> Abteilungsleiter, "Bereich" => $row -> Bereich);
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
        $query = $this -> db -> query("UPDATE Abteilungen SET Abteilungsname = " . $Abteilungsname . " WHERE ID = " . $AbteilungsID);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function erstelleAbteilung($Abteilungsname, $Abteilungsleiter, $Bereich) {
        $query = $this -> db -> query("INSERT INTO Abteilungen (Abteilungsname, Abteilungsleiter, Bereich) VALUES (" . $Abteilungsname . ", " . $Abteilungsleiter . ", " . $Bereich . ")");
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
//Funktionen für die Tabelle Abteilungen
//-------------------------------------------------------------------------------------------------------------------------------    

    function gibBereich() {
        $query = $this -> db -> query("SELECT * FROM Bereiche");
        foreach ($query->result() as $row) {
            $data[$i]["abteilungsname"] = $row -> Bereichsname;
            $data[$i]["id"] = $row -> ID;
            $i++;
        }
    }

    function neuerMitarbeiter() {

    }

}
