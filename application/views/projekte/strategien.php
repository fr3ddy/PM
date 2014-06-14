<table class="table table-hover">
	<tr>
		<th>Bereich</th>
		<?php
		foreach ($strategien as $strategie) {
			echo "<th>" . $strategie['Strategiesinformationen']['Strategiename'] . "</th>";
		}
		?>
	</tr>
	<tr>
		<td></td>
		<?php
		foreach ($strategien as $strategie) {
			echo "<td>";
			foreach ($strategie["Projekte"] as $projekt) {
				echo "<a style='color: #333;' href='" . base_url() . "projekte/details/" . $projekt["ID"] . "'>" . $projekt["Titel"] . "</a> <a style='color: #333;' href='" . base_url() . "projekte/loescheProjektAusPlan/bereiche/" . $projekt["ID"] . "'><span class='glyphicon glyphicon-remove'></span><br/>";
			}
			echo "</td>";
		}
		?>
	</tr>
	<tr>
		<td> Kosten / Gewinn </td>
		<?php
		foreach ($strategien as $strategie) {
			echo "<td>" . $strategie['Strategiesinformationen']["Kosten"] . "€ / " . $strategie['Strategiesinformationen']["Gewinn"] . "€</td>";
		}
		?>
	</tr>
</table>