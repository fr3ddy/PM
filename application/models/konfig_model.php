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
        $id = 0;
		$data = array();
        foreach ($query->result() as $row) {
            $data[$i]["ID"] = $row -> ID;
            $data[$i]["Bezeichnung"] = $row -> Bezeichnung;
            $i++;
        }
        return $data;
    }

    function erstelleStrategie($bezeichnung) {
        $data = array('ID' => null, 'Bezeichnung' => $bezeichnung);
        $query = $this -> db -> insert('Strategien', $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function aendereStrategie($ID, $data) {
        $this -> db -> where("ID", $ID);
        $query = $this -> update('Strategien', $data);
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function loescheStrategie($data) {
        $this -> db -> where('ID', $data['ID']);
        $query = $this -> db -> delete('Strategien');
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
