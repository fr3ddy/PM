<?php

class Konfig_Model extends CI_Model {
    function gibKonfig() {
        $query = $this -> db -> get('Konfiguration');
        $row = $query -> first_row();
        return $row;
    }

    function aendereKonfig($data) {
        $query = $this -> db -> update('Konfiguration', $data, "id = 1");
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gibStrategien() {
        $query = $this -> db -> get('Strategien');
        $i = 0;
		$data = array();
        foreach ($query->result() as $row) {
            $data[$i]["ID"] = $row -> ID;
            $data[$i]["Bezeichnung"] = $row -> Bezeichnung;
            $i++;
        }
        return $data;
    }

    function speichereStrategien($data) {
        $this -> db -> query("DELETE FROM Strategien");
        $query = $this -> db -> insert_batch('Strategien', $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
	function gibAnzahlMitarbeiter(){
		$this->db->select("AnzMitarbeiter");
		$query = $this->db->get("Konfiguration");
		return $query->first_row();
	}

}
