<table class="table table-striped table-hover">
	<tr>
		<th>Bereich</th><th>Bereichsleiter</th><th></th><th></th></th>
	</tr>
	<?php
	foreach ($bereiche as $bereich) {
		echo '<tr>
				<td>' . $bereich["Bereichsname"] . '</td>
				<td>' . $bereich["Bereichsleiter"]["Benutzername"] . '</td>
				<td><a style="color: rgb(81, 81, 81);" href="' . base_url() . 'admin/bereichBearbeiten/' . $bereich["ID"] . '"><span class="glyphicon glyphicon-pencil"></span></a></td>
				<td><a style="color: rgb(81, 81, 81);" href="' . base_url() . 'admin/bereichLoeschen/' . $bereich["ID"] . '"><span class="glyphicon glyphicon-trash"></span></a></td></tr>';
	}
?>
</table>