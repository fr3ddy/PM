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
					echo "<a style='color: #333;' href='projekte/details/".$projekt["ID"]."'>".$projekt["Titel"]."</a> <a style='color: #333;' href='projekte/loescheProjektAusPlan/bereiche/".$projekt["ID"]."'><span class='glyphicon glyphicon-remove'></span><br/>";
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
				echo "<td>".$bereich['Bereichsinformationen']["Kosten"]."€ / ".$bereich['Bereichsinformationen']["Gewinn"]."€</td>";
			}
		?>
	</tr>
</table>