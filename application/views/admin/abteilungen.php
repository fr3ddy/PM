<table class="table table-striped table-hover">
	<tr>
		<th>Abteilung</th><th>Abteilungsleiter</th><th></th><th></th></th>
	</tr>
	<?php
	foreach ($abteilungen as $abteilung) {
		echo '<tr>
				<td>' . $abteilung["abteilungsname"] . '</td>
				<td>' . $abteilung["abteilungsleiter"]["Benutzername"] . '</td>
				<td><a style="color: rgb(81, 81, 81);" href="' . base_url() . 'admin/abteilungBearbeiten/' . $abteilung["id"] . '"><span class="glyphicon glyphicon-pencil"></span></a></td>
				<td><a style="color: rgb(81, 81, 81);" href="' . base_url() . 'admin/abteilungLoeschen/' . $abteilung["id"] . '"><span class="glyphicon glyphicon-trash"></span></a></td></tr>';
	}
?>
</table>