<?php

class User_Model extends CI_Model{
	function gibBenutzer(){
		$query = $this->db->get("Benutzer");
		$i = 0;
		foreach ($query->result() as $row) {
			$data[$i]["benutzername"] = $row->Benutzername;
			$data[$i]["passwort"] = $row->Passwort;
			$data[$i]["abteilung"] = $row->Abteilung;
			$i++;
		}
		
		return $data;
	}
}
