<table class="table table-striped">
	<tr>
		<th>Titel</th><th>Kategorie</th><th>Abteilung</th><th>Score</th>
	</tr>
	<?php
	foreach ($projekte as $projekt) {
	?>
	<tr>
		<td>
			<?php echo $projekt["Titel"]; ?>
		</td>
		<td>
			<?php echo $projekt["Kategorie"]; ?>
		</td>
		<td>
			<?php echo $projekt["Abteilung"]; ?>
		</td>
		<td>
			<?php echo $projekt["KostenDauer"]; ?>
		</td>
	</tr>
	<?php
	}
	?>
</table>

