<table class="table table-striped table-hover">
	<tr>
		<th>Benutzername</th><th>Abteilung</th><th></th><th></th></th>
	</tr>
	<?php
	foreach ($mitarbeiter as $benutzer) {
		echo '<tr>
				<td>' . $benutzer["Benutzername"] . '</td>
				<td>' . $benutzer["Abteilung"]["Abteilungsname"] . '</td>
				<td><a style="color: rgb(81, 81, 81);" href="' . base_url() . 'admin/mitarbeiterBearbeiten/' . $benutzer["ID"] . '"><span class="glyphicon glyphicon-pencil"></span></a></td>
				<td><a style="color: rgb(81, 81, 81);" href="' . base_url() . 'admin/mitarbeiterLoeschen/' . $benutzer["ID"] . '"><span class="glyphicon glyphicon-trash"></span></a></td></tr>';
	}
?>
</table>