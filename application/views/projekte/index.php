<table class="table table-striped">
	<tr><th width="20%">Titel</th><th width="5%" title="in Tagen">Dauer</th><th width="10%">Kategorie</th><th width="40%">Beschreibung</th><th width="10%">Bearbeiter</th></tr>
<?php
foreach ($projekte as $projekt) {
	echo '<tr><td>';
	if($this->session->userdata["Benutzername"] == $projekt["Bearbeiter"]){
		echo "<a style='margin-right: 5px;' href='".base_url()."projekte/details/".$projekt["ID"]."'><span class='glyphicon glyphicon-search'></span></a>";
	}
	echo $projekt["Titel"].'</td><td>'.$projekt["Dauer"].'</td><td>'.$projekt["Kategorie"].'</td><td>'.$projekt["Beschreibung"].'</td><td>'.$projekt["Bearbeiter"];
	if($this->session->userdata["Benutzername"] == $projekt["Bearbeiter"]){
		echo "<a style='margin-left: 15px;' href='".base_url()."projekte/loescheProjekt/".$projekt["ID"]."'><span class='glyphicon glyphicon-trash'></span></a>";
	}
	echo '</td></tr>';
}
?>
</table>

