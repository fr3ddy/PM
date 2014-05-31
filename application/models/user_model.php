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
	
	function existiertBenutzer($benutzername){
		$query = $this->db->simple_query('SELECT * FROM Benutzer WHERE Benutzername = "' + $benutzername + '"');
		return $query;
	}
	
	function loginKorrekt($benutzername , $passwort){
		$query = $this->db->simple_query('SELECT * FROM Benutzer WHERE Benutzername = "' + $benutzername + '" 
									AND Passwort = "' + $passwort + '"');
		return $query;
	}
	
	function gibBenutzerdaten($benutzername){
		$query = $this->db->query('SELECT * FROM Benutzer WHERE Benutzername = "' + $benutzername + '"');
		$row = $query->first_row();
		return array("Benutzername" =>  $row['Benutzername'], "Rolle" => $row['Rolle'] , "Abteilung" => $row['Abteilung']);
	}
	
	function istAngemeldet(){
		if($this->session->userdata("Benutzername") == ""){
			return false;
		}else{
			return true;
		}
	}
}
