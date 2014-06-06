<?php

class Projekte_model extends CI_Model {
    function gibProjekte() {
        $this -> db -> where("Bearbeiter", $this -> session -> userdata("BenutzerID"));
		$this->db->or_where("Owner" , $this->session->userdata("BenutzerID"));
		$this->db->join('Benutzer' , 'Benutzer.ID = ProjektAllgemein.Bearbeiter');
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
			$data[$i]["Bearbeiter"] = $row->Benutzername;

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

}
