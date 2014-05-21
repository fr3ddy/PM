<?php

class Admin_Model extends CI_Model{
	
	function gibAlleMitarbeiter(){
		
	}
	
	function speichereNeuenMitarbeiter($post){
		$benutzername = $post["benutzername"];
		$passwort = md5($post["passwort"]);
		
	}
	
}
