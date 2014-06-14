<table class="table table-hover">
	<tr>
		<th></th>
		<?php
			foreach ($bereiche as $bereich) {
				echo "<th>".$bereich['Bereichsinformationen']['Bereichsname']."</th>";
			}
		?>
	</tr>
	<tr>
		<td></td>
		<?php
			foreach ($bereiche as $bereich) {
				echo "<td>";
				foreach ($bereich["Projekte"] as $projekt) {
					echo $projekt["Titel"]."<br/>";
				}
				echo "</td>";
			}
		?>
	</tr>
	<tr>
		<td>
			Kosten / Gewinn
		</td>
		<?php
			foreach ($bereiche as $bereich) {
				echo "<td>".$bereich['Bereichsinformationen']["Gewinn"]."€ / ".$bereich['Bereichsinformationen']["Gewinn"]."€</td>";
			}
		?>
	</tr>
</table>