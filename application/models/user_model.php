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
		return true;
	}
	
	function loginKorrekt($benutzername , $passwort){
		return true;
	}
	
	function gibBenutzerdaten($benutzername){
		return array("Benutzername" => "Test" , "Rolle" => "Mitarbeiter" , "Abteilung" => "2");
	}
	
	function istAngemeldet(){
		if($this->session->userdata("Benutzername") == ""){
			return false;
		}else{
			return true;
		}
	}
}
