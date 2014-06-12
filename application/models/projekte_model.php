<?php

class Projekte_model extends CI_Model {
    function gibProjekte() {

        $this -> db -> select("* , ProjektAllgemein.ID as projektID , Kategorien.Titel as kat , ProjektAllgemein.Titel as projektTitel");
        $this -> db -> where("Bearbeiter", $this -> session -> userdata("BenutzerID"));
        $this -> db -> or_where("Owner", $this -> session -> userdata("BenutzerID"));
        $this -> db -> join('Benutzer', 'Benutzer.ID = ProjektAllgemein.Bearbeiter');
        $this -> db -> join("Kategorien", "Kategorien.ID = ProjektAllgemein.Kategorie");
        $query = $this -> db -> get("ProjektAllgemein");

        $i = 0;
        $data = array();

        foreach ($query->result() as $row) {
            $data[$i]["ID"] = $row -> projektID;
            $data[$i]["Titel"] = $row -> projektTitel;
            $data[$i]["Dauer"] = $row -> Dauer;
            $data[$i]["Prio"] = $row -> Prio;
            $data[$i]["Kategorie"] = $row -> kat;
            $data[$i]["Strategie"] = $row -> Strategie;
            $data[$i]["Beschreibung"] = $row -> Beschreibung;
            $data[$i]["Bearbeiter"] = $row -> Benutzername;

            $i++;
        }
        return $data;
    }

    function erstelleProjekt($data) {
        $this -> db -> insert('ProjektAllgemein', $data);
        $projektid = $this -> db -> insert_id();
        //Suche Abteilungsleiter
        $this -> db -> where('ID', $this -> session -> userdata("Abteilung"));
        $query = $this -> db -> get('Abteilungen');
        $row = $query -> first_row();

        //Trage neuen Bearbeiter ein
        $data = array('Bearbeiter' => $row -> Abteilungsleiter, 'Owner' => $this -> session -> userdata('BenutzerID'));
        $this -> db -> where('ID', $projektid);
        $this -> db -> update('ProjektAllgemein', $data);

        //Erstelle die neuen Einträge in den anderen Tabellen !ID muss gleich sein wie in der Tab ProjektAllgemein
        echo $this -> db -> insert_id();
        $data = array('ID' => $projektid);
        $this -> db -> insert('ProjektAmort', $data);
        $this -> db -> insert('ProjektKomplex', $data);
        $this -> db -> insert('ProjektKosten', $data);
        $this -> db -> insert('ProjektRisiken', $data);
        $this -> db -> insert('ProjektSonstig', $data);
        $this -> db -> insert('ProjektStrategien', $data);
        $this -> db -> insert('NutzenQualitativ', $data);
    }

    function loescheProjekt($ID) {
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('ProjektAllgemein');
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('ProjektAmort');
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('ProjektKomplex');
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('ProjektKosten');
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('ProjektRisiken');
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('ProjektSonstig');
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('ProjektStrategien');
        $this -> db -> where('ID', $ID);
        $this -> db -> delete('NutzenQualitativ');
    }

    function reicheProjektWeiter($ProjektID) {
        //Vorgesetzen des Users suchen
        if ($this -> session -> userdata['Rolle'] == "Abteilungsleiter") {
            $this -> db -> select('Bereiche.Bereichsleiter');
            $this -> db -> join('Abteilungen', 'Abteilungen.ID = Benutzer.Abteilung');
            $this -> db -> join('Bereiche', 'Bereiche.ID = Abteilungen.Bereich');
            $this -> db -> where('Benutzer.ID', $this -> session -> userdata['BenutzerID']);
            $query = $this -> db -> get('Benutzer');

            $row = $query -> first_row();

            $query = $this -> db -> query("UPDATE ProjketAllgemein SET Bearbeiter = " . $row -> Bereichsleiter . "WHERE ID = " . $ProjektID);

            if ($query == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else if ($this -> session -> userdata['Rolle'] == "Bereichsleiter") {
            $data = array();
            $i = 0;
            $query = $this -> db -> query("SELECT Benutzer.ID as BenutzerID FROM Benutzer, Abteilungen WHERE Benutzer.Abteilung = 0 AND Benutzer.Abteilung = Abteilungen.ID AND Benutzer.ID != Abteilungen.Abteilungsleiter");
            foreach ($query->result() as $row) {
                $this -> db -> where("Bereichsleiter", $row -> BenutzerID);
                $abfrage = $this -> db -> get("Bereiche");
                if ($abfrage -> num_rows() == 0) {
                    $data[$i] = $row -> BenutzerID;
                    $i++;
                }
            }

            foreach ($data as $ID) {
                $query = $this -> db -> query("UPDATE ProjketAllgemein SET Bearbeiter = " . $ID . "WHERE ID = " . $ProjektID);
            }
        } else if ($this -> session -> userdata['Rolle'] == "PMO") {
            $data = array("ProjektID" => $ProjektID);
            $this -> db -> insert('ProjektePMO', $data);
        }
    }

    function gibProjektAllgemein($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('ProjektAllgemein');

        $row = $query -> first_row();
        return $row;
    }

    function aendereProjektAllgemein($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("ProjektAllgemein", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibProjektAmort($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('ProjektAmort');

        $row = $query -> first_row();
        return $row;
    }

    function aendereProjektAmort($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("ProjektAmort", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibProjektKomplex($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('ProjektKomplex');

        $row = $query -> first_row();
        return $row;
    }

    function aendereProjektKomplex($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("ProjektKomplex", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibProjektKosten($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('ProjektKosten');

        $row = $query -> first_row();
        return $row;
    }

    function aendereProjektKosten($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("ProjektKosten", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibProjektRisiken($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('ProjektRisiken');

        $row = $query -> first_row();
        return $row;
    }

    function aendereProjektRisiken($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("ProjektRisiken", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibProjektSonstig($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('ProjektSonstig');

        $row = $query -> first_row();
        return $row;
    }

    function aendereProjektSonstig($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("ProjektSonstig", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibProjektStrategien($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('ProjektStrategien');

        $row = $query -> first_row();
        return $row;
    }

    function aendereProjektStrategien($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("ProjektStrategien", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibNutzenQualitativ($ID) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> get('NutzenQualitativ');

        $row = $query -> first_row();
        return $row;
    }

    function aendereNutzenQualitativ($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> db -> update("NutzenQualitativ", $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibKategorien() {
        $query = $this -> db -> get("Kategorien");
        $i = 0;
        foreach ($query->result() as $row) {
            $data[$i]["ID"] = $row -> ID;
            $data[$i]["Titel"] = $row -> Titel;
            $i++;
        }
        return $data;
    }

}
