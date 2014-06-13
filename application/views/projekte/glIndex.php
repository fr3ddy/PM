<table class="table table-striped">
	<tr>
		<th>Titel</th><th>Kategorie</th><th>Abteilung</th><th>Score</th><th></th>
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
			<?php echo $projekt["KostenDauer"] . " - ". $projekt["Kapitalwertrate"]; ?>
		</td>
		<td>
			<a style='margin-left: 15px;' href='<?php echo base_url()."projekte/loescheProjekt/".$projekt["ID"]; ?>'><span class='glyphicon glyphicon-trash'></span></a>
		</td>
	</tr>
	<?php
	}
	?>
</table>

