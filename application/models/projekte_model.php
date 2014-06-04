<?php

class Projekte_model extends CI_Model {
    function gibProjekte() {
        $this -> db -> where("Bearbeiter", $this -> session -> userdata("ID"));
        $query = $this -> db -> get("ProjektAllgemein");
        $i = 0;
        $data = array();
        foreach ($query->result() as $row) {
            $data[$i]["ID"] = $row -> ID;
            $data[$i]["Titel"] = $row -> Titel;
            $data[$i]["Dauer"] = $row -> Dauer;
            $data[$i]["Prio"] = $row -> Prio;
            $data[$i]["Kategorie"] = $row -> Kategorie;
            $data[$i]["Strategie"] = $row -> Strategie;
            $data[$i]["Beschreibung"] = $row -> Beschreibung;

            $i++;
        }
        return $data;
    }

    function erstelleProjekt($data) {
        $this -> db -> insert('ProjektAllgemein', $data);

        //Suche Abteilungsleiter
        $einheit = $this -> session -> userdata("Abteilung");
        $this -> db -> where('ID', $einheit["AbteilungsID"]);
        $query = $this -> db -> get('Abteilungen');
        $row = $query -> first_row();

        //Trage neuen Bearbeiter ein
        $data = array('Bearbeiter' => $row -> Abteilungsleiter, 'Owner' => $this -> session -> userdata('ID'));
        $this -> db -> where('ID', $this -> db -> insert_id());
        $this -> db -> update('ProjektAllgemein', $data);

        //Erstelle die neuen Einträge in den anderen Tabellen !ID muss gleich sein wie in der Tab ProjektAllgemein
        $data = array('ID' => $this -> db -> insert_id());
        $this -> db -> insert('ProjektAmort', $data);
        $this -> db -> insert('ProjektKomplex', $data);
        $this -> db -> insert('ProjektKosten', $data);
        $this -> db -> insert('ProjektRisiken', $data);
        $this -> db -> insert('ProjektSonstig', $data);
        $this -> db -> insert('ProjektStrategien', $data);
        $this -> db -> insert('NutzenQualitativ', $data);
    }

}
