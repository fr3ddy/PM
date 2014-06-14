<table class="table table-hover">
	<tr>
		<th></th>
		<?php
			foreach ($bereiche as $bereich) {
				echo "<th>".$bereich['Bereichsname']."</th>";
			}
		?>
	</tr>
	<tr>
		<td></td>
		<?php
			foreach ($bereiche as $bereich) {
				echo "<td>";
				foreach ($bereiche["Projekte"] as $projekt) {
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
				echo "<td>".$bereich["Kosten"]."€ / ".$bereich["Gewinn"]."€</td>";
			}
		?>
	</tr>
</table>
