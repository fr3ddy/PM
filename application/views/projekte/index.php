<table class="table table-striped">
	<tr><th width="15%">Titel</th><th width="5%" title="in Tagen">Dauer</th><th width="10%">Kategorie</th><th width="55%">Beschreibung</th><th width="10%">Bearbeiter</th></tr>
<?php
foreach ($projekte as $projekt) {
	echo '<tr><td>'.$projekt["Titel"].'</td><td>'.$projekt["Dauer"].'</td><td>'.$projekt["Kategorie"].'</td><td>'.$projekt["Beschreibung"].'</td><td>'.$projekt["Bearbeiter"].'</td></tr>';
}
?>
</table>